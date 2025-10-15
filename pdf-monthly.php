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
        $this->Cell(10, 10, 'Weekly Progress Report Running Notes');
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
    
    
public function MonthlyReport($con) {
    $start_date = $_GET['start'];
    $end_date = $_GET['end'];
    $learnerID = $_GET['id'];

    $learner = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM learner WHERE learnerID = '$learnerID'"));

    $weekly_data = [];
    $result = mysqli_query($con, "SELECT * FROM learner_progress 
                                WHERE learnerID='$learnerID' 
                                AND date_ BETWEEN '$start_date' AND '$end_date'");

    while ($row = mysqli_fetch_assoc($result)) {
        $week_num = date('W', strtotime($row['date_']));
        $year = date('Y', strtotime($row['date_']));
        $week_key = $year . '-W' . $week_num;

        if (!isset($weekly_data[$week_key])) {
            $weekly_data[$week_key] = [
                'start' => $row['date_'],
                'end' => $row['date_'],
                'data' => []
            ];
        }

        $weekly_data[$week_key]['data'][] = $row;
        if ($row['date_'] < $weekly_data[$week_key]['start']) 
            $weekly_data[$week_key]['start'] = $row['date_'];
        if ($row['date_'] > $weekly_data[$week_key]['end']) 
            $weekly_data[$week_key]['end'] = $row['date_'];
    }

    // $this->SetFont('Times', 'B', 12);
    // $this->Cell(0, 10, '(' . date('F Y', strtotime($start_date)) . ')', 0, 1);
    $this->Ln(13);
    $this->SetFont('Times', '', 8);
    // $this->Cell(0, 6, "Learner: {$learner['name']} | Age: {$learner['age']} | Teacher: {$learner['teacher_incharge']}", 0, 1);
    $this->Cell(0, 6, ' Date: ' . date('F Y', strtotime($start_date)), 0, 1);
    $this->Cell(0, 6, "Name: {$learner['name']}", 0, 1);
    $this->Cell(0, 6, "Age: {$learner['age']}", 0, 1);
    $this->Cell(0, 6, "Diagnosis: {$learner['diagnosis']}", 0, 1);
    $this->Cell(0, 6, "Teacher in-charge: {$learner['teacher_incharge']}", 0, 1);
    $this->Ln(5);

    $this->SetY(65);
    $this->Ln(5);
    $this->SetFont('Times', '', 8);


    
    $this->Cell(60, 7, 'Intervention Process', 1, 0, 'C');
    foreach ($weekly_data as $week) {
        $this->Cell(25, 7, 'Week ' . date('W', strtotime($week['start'])), 1, 0, 'C');
    }
    $this->Ln();

    $this->Cell(60, 7, '', 1);
    // $this->SetFont('Times', '', 8);
    foreach ($weekly_data as $week) {
        $this->Cell(25, 7, date('M j', strtotime($week['start'])) . '-' . date('j', strtotime($week['end'])), 1, 0, 'C');
    }
    $this->Ln();



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
    
    function getStartOfWeek($date) {
        $dateObj = new DateTime($date);
        $dateObj->modify('Monday this week');
        return $dateObj->format('Y-m-d');
    }
    foreach ($interventions as $label => $fields) {
        $valid_dates = [];
        $current_date = new DateTime($start_date);
        $end_date_obj = new DateTime($end_date);
    
        while ($current_date <= $end_date_obj) {
            $valid_dates[] = clone $current_date;
            $current_date->modify('+1 week');
        }
    
        // Fetch and organize data by week
        $weekly_data = [];
        $result = mysqli_query($con, "SELECT * FROM learner_progress WHERE learnerID='$learnerID' AND date_ BETWEEN '$start_date' AND '$end_date'");
        while ($row = mysqli_fetch_assoc($result)) {
            $week_start = getStartOfWeek($row['date_']);
            $weekly_data[$week_start][] = $row;
        }
    
        $has_any_data = false;
        $columns_with_data = []; // Track which columns (weeks) have data
        
        // First pass: Identify which weeks have data for this category
        foreach ($valid_dates as $index => $date) {
            $week_start = getStartOfWeek($date->format('Y-m-d'));
            $week_has_data = false;
            
            if (isset($weekly_data[$week_start])) {
                foreach ($weekly_data[$week_start] as $row) {
                    foreach ($fields as $field_key => $field_label) {
                        if (isset($row[$field_key]) && $row[$field_key] !== '' && is_numeric($row[$field_key])) {
                            $week_has_data = true;
                            $has_any_data = true;
                            break 2; // Exit both loops if data exists
                        }
                    }
                }
            }
            
            if ($week_has_data) {
                $columns_with_data[$index] = $date; // Store the date object
            }
        }
        
        if (!$has_any_data) continue;
        
        // --- Display Category Header (only for weeks with data) ---
        $this->SetFont('Times', 'B', 8);
        $this->Cell(60, 8, $label, 1, 0, 'L');
        
        foreach ($columns_with_data as $index => $date) {
            $week_start = getStartOfWeek($date->format('Y-m-d'));
            $category_values = [];
        
            if (isset($weekly_data[$week_start])) {
                foreach ($weekly_data[$week_start] as $row) {
                    foreach ($fields as $field_key => $field_label) {
                        if (isset($row[$field_key]) && is_numeric($row[$field_key])) {
                            $category_values[] = $row[$field_key];
                        }
                    }
                }
            }
        
            $average = (count($category_values) > 0) ? round(array_sum($category_values) / count($category_values), 2) : 0;
            $this->Cell(25, 8, $average, 1, 0, 'C');
        }
        $this->Ln(8);
    
        foreach ($fields as $field_key => $field_label) {
            $field_has_data = false;
            $field_values = [];
            
            foreach ($columns_with_data as $index => $date) {
                $week_start = getStartOfWeek($date->format('Y-m-d'));
                $values = [];
                $days_with_data = 0;
                
                if (isset($weekly_data[$week_start])) {
                    foreach ($weekly_data[$week_start] as $row) {
                        if (isset($row[$field_key]) && $row[$field_key] !== '') {
                            $values[] = $row[$field_key];
                            $days_with_data++;
                        }
                    }
                }
                
                if (count($values) > 0) {
                    $field_has_data = true;
                    $average = round(array_sum($values) / count($values), 2);
                    $field_values[] = $average;
                } else {
                    $field_values[] = '-';
                }
            }
            
            if ($field_has_data) {
                $this->SetFont('Times', '', 8);
                $this->Cell(60, 8, '   ' . $field_label, 1);
                
                foreach ($field_values as $value) {
                    $this->Cell(25, 8, $value, 1, 0, 'C');
                }
                
                $this->Ln(8);
            }
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


$pdf->MonthlyReport($con);






$pdf->ColoredTable($header);




$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('weekly_report'. date('Y-m-d') .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+