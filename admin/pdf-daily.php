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
        $this->Cell(10, 10, 'Progress Report Running Notes');
        $this->Ln(5);

      
        
    }

    // Colored table
    public function ColoredTable($header) {

        $learnerID = $_GET['id'];

        include('../admin/config/dbcon.php');

        $sql = "SELECT * FROM learner WHERE learnerID = '$learnerID'";
        $query = ($con->query($sql));
        while ( $row = $query->fetch_assoc()) {
    
                    $name = $row['name'];
                    $age= $row['age'];
                    $teacher_incharge= $row['teacher_incharge'];
                    $date_of_birth = $row['date_of_birth'];
                    $formatted_date_of_birth = date('F j Y', strtotime($date_of_birth));
                    $gender= $row['gender'];
                    $diagnosis = $row['diagnosis'];

                    // $long_term_target= $row['long_term_target'];
                    // $program = $row['program']; 

                                   
    }

    
    
    // $this->Ln(-2); 
    // $this->SetFont('times', '', 10);
    // $this->Cell(0, 0, "( $formatted_pr_date )", 0, 1, 'C');

    // $this->SetX(20);




    $date_ = $_GET['d'];
    $learnerID = $_GET['id'];

    // echo "Date from GET: " . $_GET['d'] . "<br>";
    echo "Learner ID from GET: " . $_GET['id'] . "<br>";

    $query = "SELECT * FROM learner_progress WHERE learnerID='$learnerID' and date_='$date_'";
    $query_run = mysqli_query($con,$query);
    if($query_run){
      if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
          $date_ = $row['date_'];
          $formatted_date = date('F j Y', strtotime($date_));
          $formatted_day = date('l', strtotime($date_));





          $learnerID = $row['id'];
          $emotion = $row['emotion'];
          $sensitivity = $row['sensitivity'];
          $body = $row['body'];
          $confidence = $row['confidence'];
          $sound = $row['sound'];
          $gross = $row['gross'];
          $walking = $row['walking'];
          $jumping = $row['jumping'];
          $crawling = $row['crawling'];
          $hopping = $row['hopping'];
          $muscle_strength = $row['muscle_strength'];
          $muscle = $row['muscle'];
          $balance = $row['balance'];
          $bilateral = $row['bilateral'];
        }
      }
    }

    echo "Date from GET: " . $_GET['d'] . "<br>";
echo "Learner ID from GET: " . $_GET['id'] . "<br>";
 



    $this->SetY(30);
    $this->Ln(10); 

    $this->SetFont('Times', 'B', 8);
    $this->Cell(10, 6, "Date:", 0, 0, 'L');

    
    $this->SetFont('Times', '', 8);
    $this->Cell(0, 6, " $formatted_date  ", 0, 1, 'L');


    $this->SetFont('Times', 'B', 8);
    $this->Cell(10, 6, "Name:", 0, 0, 'L');
    
    $this->SetFont('Times', '', 8);
    $this->Cell(0, 6, $name , 0, 1, 'L');
    
    $this->SetFont('Times', 'B', 8);
    $this->Cell(10, 6, "Age:", 0, 0, 'L');
    
    $this->SetFont('Times', '', 8);
    $this->Cell(0, 6, "$age years old", 0, 1, 'L');

    
    $this->SetFont('Times', 'B', 8);
    $this->Cell(25, 6, "Teacher in-charge:", 0, 0, 'L');
    
    
    $this->SetFont('Times', '', 8);
    $this->Cell(0, 6, "$teacher_incharge ", 0, 1, 'L');

    
    
    
    // $this->SetFont('Times', 'B', 8);
    // $this->Cell(30, 6, "Birthdate:", 0, 0, 'L');
    
    // $this->SetFont('Times', '', 8);
    // $this->Cell(0, 6, $formatted_date_of_birth, 0, 1, 'L');
    
    // $this->SetFont('Times', 'B', 8);
    // $this->Cell(30, 6, "Sex:", 0, 0, 'L');
    
    // $this->SetFont('Times', '', 8);
    // $this->Cell(0, 6, $gender, 0, 1, 'L');
    
    $this->SetFont('Times', 'B', 8);
    $this->Cell(15, 6, "Diagnosis:", 0, 0, 'L');
    
    $this->SetFont('Times', '', 8);
    $this->Cell(0, 6, $diagnosis, 0, 1, 'L');
    
    // $this->SetFont('Times', 'B', 8);
    // $this->Cell(30, 6, "Teacher in-charge:", 0, 0, 'L');
    
    // $this->SetFont('Times', '', 8);
    // $this->Cell(0, 6, $teacher_incharge, 0, 1, 'L');

// Get full usable width (excluding margins)
$pageWidth = $this->GetPageWidth();
$margin = $this->GetMargins();
$usableWidth = $pageWidth - $margin['left'] - $margin['right'];

// Define column width for 2 columns
$columnWidth = $usableWidth / 2;

// Set X to left margin so alignment matches other tables
$this->SetX($margin['left']);

$this->SetFont('times', '', 8);

// Set red background
// $this->SetFillColor(230, 230, 230);
$this->SetFillColor(255, 255, 255);

$this->Cell(100, 10, 'Intervention Process', 1, 0, 'C', true);
$this->Cell(44, 5, 'Rating', 1, 1, 'C', true);

$this->SetX(102);
$this->Cell(44, 5, $formatted_day, 1, 1, 'C', true);

$this->SetFillColor(255, 255, 255);
$this->SetFont('times', 'B', 8);
$this->Cell(100, 8, '  A. Massage', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, number_format((($emotion + $sensitivity) / 2), 2), 1, 1, 'C', true);

$this->SetFont('times', '', 8);
$this->Cell(100, 8, '           Emotion Regulation', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $emotion, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '            Sensitivity to touch', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $sensitivity, 1, 1, 'C', true);


$this->SetFont('times', 'B', 8);
$this->Cell(100, 8, '  B. Action Song', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, number_format((($body + $confidence + $sound) / 3), 2), 1, 1, 'C', true);

$this->SetFont('times', '', 8);
$this->Cell(100, 8, '             Body awareness', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $body, 1, 1, 'C', true);

$this->SetFont('times', '', 8);
$this->Cell(100, 8, '             Confidence', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $confidence, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '             Sound Tolerance', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $sound, 1, 1, 'C', true);



$this->SetFont('times', 'B', 8);
$this->Cell(100, 8, '  C. Sensory Integration', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, number_format((($walking + $jumping + $crawling + $hopping + $muscle_strength + $muscle + $balance + $bilateral + $gross) / 9), 2), 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '             I. Gross Motor Skills', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $gross, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '                 I.I. Walking', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $walking, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '                 I.II. Jumping', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $jumping, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '                 I.III. Crawling', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $crawling, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '                 I.IV. Hopping', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $hopping, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '            II. Muscle Strength', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $muscle_strength, 1, 1, 'C', true);

$this->SetFont('times', '', 8);
$this->Cell(100, 8, '            III. Muscle Endurance', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $muscle, 1, 1, 'C', true);

$this->SetFont('times', '', 8);
$this->Cell(100, 8, '            IV. Balance', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $balance, 1, 1, 'C', true);


$this->SetFont('times', '', 8);
$this->Cell(100, 8, '             V. Bilateral Coordination', 1, 0, 'L', true);
$this->SetX(102);
$this->Cell(44, 8, $bilateral, 1, 1, 'C', true);



  
        

    }
    // Page footer
    public function Footer() {
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(148, 250), true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(2, PDF_MARGIN_TOP, 2);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font






// add a page
$pdf->AddPage();





// print colored table
$pdf->ColoredTable($header);




// print a block of text using Write()
$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('total_course_'. date('Y-m-d') .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+