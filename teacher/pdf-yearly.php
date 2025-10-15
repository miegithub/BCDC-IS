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
        $this->Cell(10, 10, 'Monthly Progress Report Running Notes');
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
    public function YearlyReport($con) {
        $year = $_GET['year']; // Expecting YYYY format
        $learnerID = $_GET['id'];
        $start_date = $_GET['start']; // Expecting YYYY-MM-DD format
        $end_date = $_GET['end'];
        $fyear = date('Y', strtotime($end_date)); // Output: 2025
        
    
        // Fetch learner information
        $learner = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM learner WHERE learnerID = '$learnerID'"));
    
        // Initialize monthly data structure
        $monthly_data = [];
        $months_with_data = []; // To track which months have data
        for ($m = 1; $m <= 12; $m++) {
            $month_start = date('Y-m-01', strtotime("$year-$m-01"));
            $month_end = date('Y-m-t', strtotime($month_start));
            $monthly_data[$m] = [
                'start' => $month_start,
                'end' => $month_end,
                'data' => []
            ];
        }
    
        // Fetch all data for the given learner and date range
        $query = "SELECT * FROM learner_progress 
                  WHERE learnerID='$learnerID' 
                  AND date_ BETWEEN '$start_date' AND '$end_date'"; // Adjusted query to use start and end dates
        $result = mysqli_query($con, $query);
    
        while ($row = mysqli_fetch_assoc($result)) {
            $month = date('n', strtotime($row['date_']));
            $monthly_data[$month]['data'][] = $row;
            $months_with_data[$month] = true; // Mark this month as having data
        }
    
        // Header Information
        $this->Ln(13);
        $this->SetFont('Times', '', 8);
        // $this->Cell(0, 6, ' Date: ' . $year, 0, 1);
        $month_names_full = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
                     7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'];
                     if (!empty($months_with_data)) {
                        $first_month = min(array_keys($months_with_data));
                        $last_month = max(array_keys($months_with_data));
                    
                        if ($first_month === $last_month) {
                            $month_range = $month_names_full[$first_month];
                        } else {
                            $month_range = $month_names_full[$first_month] . ' - ' . $month_names_full[$last_month];
                        }
                    } else {
                        $month_range = 'No data';
                    }
                    
                    $this->Cell(0, 6, 'Date: ' . $month_range . ', ' . $fyear, 0, 1);
                    


        $this->Cell(0, 6, "Name: {$learner['name']}", 0, 1);
        $this->Cell(0, 6, "Age: {$learner['age']}", 0, 1);
        $this->Cell(0, 6, "Diagnosis: {$learner['diagnosis']}", 0, 1);
        $this->Cell(0, 6, "Teacher in-charge: {$learner['teacher_incharge']}", 0, 1);
        $this->Ln(5);
    
        // Table Header
        $this->SetY(70);
        $this->SetFont('Times', '', 8);
        $this->Cell(60, 7, 'Intervention Process', 1, 0, 'C');
    
        // Month headers (abbreviated) - only for months with data
        $month_names = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        foreach ($month_names as $index => $month) {
            $month_num = $index + 1;
            if (isset($months_with_data[$month_num])) {
                $this->Cell(15, 7, $month, 1, 0, 'C'); // Narrower cells for months
            }
        }
        $this->Ln();
    
        // Same intervention structure as original
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
    
        foreach ($interventions as $label => $fields) {
            $this->SetFont('Times', 'B', 8);
            $this->Cell(60, 8, $label, 1, 0, 'L');
    
            // Calculate monthly averages for category - only for months with data
            foreach (range(1, 12) as $month) {
                if (!isset($months_with_data[$month])) continue;
                
                $category_values = [];
                foreach ($monthly_data[$month]['data'] as $row) {
                    foreach ($fields as $field_key => $field_label) {
                        if (isset($row[$field_key]) && is_numeric($row[$field_key])) {
                            $category_values[] = $row[$field_key];
                        }
                    }
                }
                $average = (count($category_values) > 0)
                    ? round(array_sum($category_values) / count($category_values), 2)
                    : '-';
                $this->Cell(15, 8, $average, 1, 0, 'C');
            }
            $this->Ln(8);
    
            // Sub-items
            foreach ($fields as $field_key => $field_label) {
                $this->SetFont('Times', '', 8);
                $this->Cell(60, 8, '   ' . $field_label, 1);
    
                foreach (range(1, 12) as $month) {
                    if (!isset($months_with_data[$month])) continue;
                    
                    $values = [];
                    foreach ($monthly_data[$month]['data'] as $row) {
                        if (isset($row[$field_key]) && is_numeric($row[$field_key])) {
                            $values[] = $row[$field_key];
                        }
                    }
                    $average = (count($values) > 0)
                        ? round(array_sum($values) / count($values), 2)
                        : '-';
                    $this->Cell(15, 8, $average, 1, 0, 'C');
                }
                $this->Ln(8);

               
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


$pdf->YearlyReport($con);






$pdf->ColoredTable($header);




$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('weekly_report'. date('Y-m-d') .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+