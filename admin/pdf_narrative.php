<?php

require_once('../TCPDF-main/tcpdf.php'); 



class MYPDF extends TCPDF {
    
   
    public function Header() {
        // Ipakita lang ang image sa unang page
        if ($this->getPage() == 1) {
            $image_file = '../images/ippheader.jpg';
            $this->Image($image_file, 0, 3, 210, '', 'JPG', '', 'T', true, 200, '', false, false, 0, false, false, false);
        }

        

   
    
    }

    
    

    public function TitlePage($title) {   
        include('../admin/config/dbcon.php');
    
        
        
        $this->SetFont('times', 'B', 10);        
        $this->SetX(20); 
        $this->SetY(40);      
        $this->Cell(0, 10, $title, 0, 1, 'C'); 
       
       
    }

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
    $narrative = "SELECT * FROM narrative_report WHERE learnerID = '$learnerID'";
    $narrative_query = ($con->query($narrative));
    while ( $row = $narrative_query->fetch_assoc()) {
       
        $pr_date = $row['pr_date'];
        $formatted_pr_date = date('F j Y', strtotime($pr_date));
        $l_overview = $row['l_overview'];
        $a_behavior = $row['a_behavior'];
        $b_gross = $row['b_gross'];
        $c_fine = $row['c_fine'];
        $d_cog = $row['d_cog'];
        $e_act = $row['e_act'];
        $client_program = $row['client_program'];
        $recom = $row['recom'];
        


    }
    
    
   
    
        $this->Ln(-2); 
        $this->SetFont('times', '', 10);
        $this->Cell(0, 0, "$formatted_pr_date", 0, 1, 'C');

        $this->SetX(20);
        $this->SetY(50);
        $this->Ln(10); 
        $this->SetFont('Times', '', 10);
        $this->Cell(30, 6, "Name:", 0, 0, 'L');
        
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 6, $name, 0, 1, 'L');
        
        $this->SetFont('Times', '', 10);
        $this->Cell(30, 6, "Age:", 0, 0, 'L');
        
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 6, "$age years old", 0, 1, 'L');
        
        $this->SetFont('Times', '', 10);
        $this->Cell(30, 6, "Birthdate:", 0, 0, 'L');
        
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 6, $formatted_date_of_birth, 0, 1, 'L');
        
        $this->SetFont('Times', '', 10);
        $this->Cell(30, 6, "Sex:", 0, 0, 'L');
        
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 6, $gender, 0, 1, 'L');
        
        $this->SetFont('Times', '', 10);
        $this->Cell(30, 6, "Diagnosis:", 0, 0, 'L');
        
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 6, $diagnosis, 0, 1, 'L');
        
        $this->SetFont('Times', '', 10);
        $this->Cell(30, 6, "Teacher in-charge:", 0, 0, 'L');
        
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 6, $teacher_incharge, 0, 1, 'L');




        //l_overview

        
       
      




        // $this->SetFont('Times', 'B', 10);
        // $this->Cell(30, 30, "LEARNER OVERVIEW:", 0, 0, 'L');
        // $this->SetFont('Times', '', 10);
        // $this->Cell(0, 30, $l_overview, 0, 1, 'L');
        $this->Ln(3);
        $this->SetFont('times', '', 10);
        $this->Ln();
        $this->MultiCell(0, 5, '      '. $l_overview, 0, 'J');
        


        $this->Ln(10);
        $this->SetFont('times', 'B', 10);
        $this->Write(2, 'A. WORK BEHAVIOR/PLAY SKILLS ');
        $this->SetFont('times', '', 10, 'J');
       $this->Ln();

       $this->MultiCell(0, 5, '      '. $a_behavior, 0, 'J');


        $this->Ln(10);
        $this->SetFont('times', 'B', 10);
        $this->Write(2, 'B. GROSS MOTOR SKILLS ');
        $this->SetFont('times', '', 10, 'J');
       $this->Ln();

       $this->MultiCell(0, 5, '      '. $b_gross, 0, 'J');

        $this->Ln(10);
        $this->SetFont('times', 'B', 10);
        $this->Write(2, 'C. FINE MOTOR SKILLS ');
        $this->SetFont('times', '', 10, 'J');
      
        $this->Ln();

        $this->MultiCell(0, 5, '      '. $c_fine, 0, 'J');
       
        $this->Ln(10);
        $this->SetFont('times', 'B', 10);
        $this->Write(2, 'D. COGNITIVE AND COMMUNICATION SKILLS');
        $this->SetFont('times', '', 10, 'J');
       
        $this->Ln();

        $this->MultiCell(0, 5, '      '. $d_cog, 0, 'J');


       
        $this->Ln(10);
        $this->SetFont('times', 'B', 10);
        $this->Write(2, 'E. ACTIVITIES OF DAILY LIVING SKILLS');
        $this->SetFont('times', '', 10, 'J');
      
        $this->Ln();

        $this->MultiCell(0, 5, '      '. $e_act, 0, 'J');

        $this->Ln(10);
        $this->SetFont('times', 'B', 10);
        $this->Write(2, 'CLIENT PROGRAM: ');
        $this->SetFont('times', '', 10, '');
        $this->Ln(5);
        $this->Ln();
        $this->Write(2, $client_program);
       

        $this->Ln(10);
        $this->SetFont('times', 'B', 10);
        $this->Write(2, 'RECOMMENDATION: ');
        $this->SetFont('times', '', 10, '');
        $this->Ln(5);
        $this->Ln();
        $this->Write(2, $recom);
       
        $this->Ln(25);

$this->SetX(27);
$this->SetFont('times', 'BU', 10); 
$this->Cell(90, 5, 'MARIELLA CHARISSE C. YANGO, LPT, MAEd', 0, 0, 'L'); 
// Mariella Charisse C. Yango, LPT, MAEd



$this->SetX(126); 
$this->Cell(90, 5, 'ARNEL D. YAMBAO, RN ', 0, 1, 'L'); 


$this->SetX(40);
$this->SetFont('times', '', 10); 
$this->Cell(90, 5, 'Biñan City Development Center', 0, 0, 'L'); 


$this->SetX(120);
$this->SetFont('times', '', 10); 
$this->Cell(90, 5, 'Persons With Disability Affairs Office', 0, 0, 'L'); 


$this->Ln();
$this->SetFont('times', '', 10);

$this->SetX(53); 
$this->Cell(90, 5, 'Head Teacher', 0, 0, 'L');

$this->SetX(143); 
$this->Cell(90, 5, 'Officer', 0, 1, 'L');



        
    }
    
    }

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(25, PDF_MARGIN_TOP, 15);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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
$pdf->SetFont('times', 'BI', 8);

// add a page
$pdf->AddPage();

$pdf->TitlePage('Progress Report'); 

// print colored table
$pdf->ColoredTable($header);


// print a block of text using Write()
$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('Progress_Report '. '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+