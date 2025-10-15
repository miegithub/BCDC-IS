<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../TCPDF-main/tcpdf.php');


// extend TCPF with custom functions
class MYPDF extends TCPDF {

    //Page header
    public function Header() {

            // Ipakita lang ang image sa unang page
            if ($this->getPage() == 1) {
                $image_file = '../images/ippheader.jpg';
                $this->Image($image_file, 0, 3, 150, '', 'JPG', '', 'T', true, 200, '', false, false, 0, false, false, false);
            }
            $this->Ln(25);

        // Logo
        $this->setX(45);
        $this->SetFont('times', 'B', 8);
        $this->Cell(10, 10, 'Daily Progress Report Running Notes');
        $this->Ln(5);

      
        
    }

    // Colored table


    public function ColoredTable($header) {
        if (!isset($_GET['id'], $_GET['start'], $_GET['end'])) {
            die('Missing required parameters');
        }
    
        $learnerID = $_GET['id'];
        $start_date = $_GET['start'];
        $end_date = $_GET['end'];
    
        if (!DateTime::createFromFormat('Y-m-d', $start_date) || 
            !DateTime::createFromFormat('Y-m-d', $end_date)) {
            die('Invalid date format. Use YYYY-MM-DD');
        }
    
        include('../admin/config/dbcon.php');
    
       
    }
    public function WeeklyReport($con) {
        // Validate inputs
        if (!isset($_GET['id'], $_GET['start'], $_GET['end'])) {
            die('Missing required parameters');
        }
    
        $learnerID = $_GET['id'];
        $start_date = $_GET['start'];
        $end_date = $_GET['end'];
    
        if (!DateTime::createFromFormat('Y-m-d', $start_date) || 
            !DateTime::createFromFormat('Y-m-d', $end_date)) {
            die('Invalid date format. Use YYYY-MM-DD');
        }
    
        $learner = mysqli_fetch_assoc(mysqli_query($con, 
            "SELECT * FROM learner WHERE learnerID = '$learnerID'"));
    
        $daily_data = [];
        $result = mysqli_query($con, 
            "SELECT * FROM learner_progress 
             WHERE learnerID='$learnerID' 
             AND date_ BETWEEN '$start_date' AND '$end_date'
             ORDER BY date_");
    
        while ($row = mysqli_fetch_assoc($result)) {
            $daily_data[$row['date_']] = $row;
        }
    
        // Determine which days have data
        $valid_days = [];
        $current_date = new DateTime($start_date);
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    
        foreach ($days as $day) {
            $date_str = $current_date->format('Y-m-d');
            if (isset($daily_data[$date_str])) {
                $valid_days[] = [
                    'label' => $day . "\n" . $current_date->format('m/d'),
                    'date' => $date_str
                ];
            }
            $current_date->modify('+1 day');
        }
    
        if (empty($valid_days)) {
            $this->SetFont('Times', 'I', 10);
            $this->Cell(0, 10, 'No data available for this week.', 0, 1, 'C');
            return;
        }
    
        // Header
        // $this->Ln(10);
        // $this->SetFont('Times', 'B', 10);
        // $this->Cell(0, 6, 'WEEKLY PROGRESS REPORT', 0, 1, 'C');
        $this->Ln(15);
        
        $this->SetFont('Times', '', 8);
        $this->Cell(0, 6, 'Week: ' . date('M j', strtotime($start_date)) . ' - ' . date('M j', strtotime($end_date)), 0, 1);
        $this->Cell(0, 6, "Name: {$learner['name']}", 0, 1);
        $this->Cell(0, 6, "Age: {$learner['age']}", 0, 1);
        $this->Cell(0, 6, "Diagnosis: {$learner['diagnosis']}", 0, 1);
        $this->Cell(0, 6, "Teacher: {$learner['teacher_incharge']}", 0, 1);
       
       
    $this->SetY(66);
        $this->Ln();
    
        // Table Header
        $this->SetFont('Times', 'B', 8);
        $this->Cell(60, 7, 'INTERVENTION', 1, 0, 'C');
        foreach ($valid_days as $day) {
            $this->Cell(25, 7, $day['label'], 1, 0, 'C');
        }
        $this->Ln();
    
        // Intervention structure with labels
        $interventions = [
            'A. MASSAGE' => [
                'emotion' => '      Emotion',
                'sensitivity' => '      Sensitivity'
            ],
            'B. ACTION SONG' => [
                'body' => '      Body Movement',
                'confidence' => '      Confidence',
                'sound' => '      Sound Recognition'
            ],
            'C. SENSORY INTEGRATION' => [
                'gross' => '      I. Gross Motor Skills',
                'walking' => '        I.I. walking',
                'jumping' => '        I.II. jumping',
                'crawling' => '        I.III. crawling',
                'hopping' => '        I.IV. hopping',
                'muscle_strength' => '      II. Muscle Strength',
                'muscle' => '      III. Muscle Endurance',
                'balance' => '      IV. Balance',
                'bilateral' => '      V. Bilateral Coordination'
            ]
        ];
    
        foreach ($interventions as $category => $fields) {
            // Check if at least one subfield has data
            $hasData = false;
            foreach ($fields as $field => $label) {
                foreach ($valid_days as $day) {
                    $date_str = $day['date'];
                    if (!empty($daily_data[$date_str][$field]) && is_numeric($daily_data[$date_str][$field])) {
                        $hasData = true;
                        break 2;
                    }
                }
            }
    
            if (!$hasData) continue;
    
            // Category average row
            $this->SetFont('Times', 'B', 8);
            $this->Cell(60, 8, $category, 1, 0, 'L');
    
            foreach ($valid_days as $day) {
                $date_str = $day['date'];
                $sum = 0;
                $count = 0;
                foreach ($fields as $field => $label) {
                    if (isset($daily_data[$date_str][$field]) && is_numeric($daily_data[$date_str][$field])) {
                        $sum += $daily_data[$date_str][$field];
                        $count++;
                    }
                }
                $avg = $count > 0 ? round($sum / $count, 1) : '-';
                $this->Cell(25, 8, $avg, 1, 0, 'C');
            }
            $this->Ln();
    
            // Subfields
            foreach ($fields as $field => $label) {
                $show_row = false;
                foreach ($valid_days as $day) {
                    $date_str = $day['date'];
                    if (!empty($daily_data[$date_str][$field]) && is_numeric($daily_data[$date_str][$field])) {
                        $show_row = true;
                        break;
                    }
                }
    
                if (!$show_row) continue;
    
                $this->SetFont('Times', '', 8);
                $this->Cell(60, 8, $label, 1);
                foreach ($valid_days as $day) {
                    $date_str = $day['date'];
                    $score = isset($daily_data[$date_str][$field]) ? $daily_data[$date_str][$field] : '-';
                    $this->Cell(25, 8, $score, 1, 0, 'C');
                }
                $this->Ln();
            }
        }
    }
    

    // Page footer
    public function Footer() {
    }
}



include('../admin/config/dbcon.php');




$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(150, 250), true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(2, PDF_MARGIN_TOP, 2);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}






$pdf->AddPage();


$pdf->WeeklyReport($con);






$pdf->ColoredTable($header);




$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('weekly_report'. date('Y-m-d') .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+