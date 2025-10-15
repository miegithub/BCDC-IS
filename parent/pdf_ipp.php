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
        $this->SetFont('times', 'B', 10);        
        $this->SetX(20); 
        $this->SetY(40);      
        $this->Cell(0, 10, $title, 0, 1, 'C'); 
        $this->Ln(20); 
    }

    public function ColoredTable($header) {
        
        $learnerID = $_GET['id'];

        include('../admin/config/dbcon.php');

        $sql = "SELECT b. *, a.name, a.age, a.teacher_incharge, a.ipp_date, a.long_term_target FROM learner a JOIN learner_program b ON b.learnerID = a.learnerID WHERE a.learnerID = '$learnerID'";
       
        $query = ($con->query($sql));
        while ( $row = $query->fetch_assoc()) {
    
                    $name = $row['name'];
                    $age= $row['age'];
                    $teacher_incharge= $row['teacher_incharge'];
                    $long_term_target= $row['long_term_target'];
                    $program = $row['program']; 
                    $ipp_date = $row['ipp_date'];
                    $formatted_ipp_date = date('F j Y', strtotime($ipp_date));

                                   
    }

        

        $this->SetX(20);
        $this->SetY(50);
        $this->SetFont('Times', '', 10);
        $this->Cell(0, 6, "Name of Learner:  $name", 0, 1, 'L');
        $this->SetY($this->GetY());
        $this->Cell(0, 6, "Age: $age years old", 0, 1, 'L');
        $this->SetY($this->GetY());
        $this->Cell(0, 6, "Therapist: Teacher $teacher_incharge", 0, 1, 'L');
        $this->SetY($this->GetY());
        $this->Cell(0, 6, "Date:  $formatted_ipp_date", 0, 1, 'L');
        $this->SetY($this->GetY() + 3);

        //long term target
        $this->SetFont('times', 10);
        $this->Ln(2);
        $this->Cell(90, 2, 'Long-term Target:', 0, 1, 'L'); 
        $this->Ln(2);

        $this->SetFont('times', '', 10);

        // Calculate center position
        $pageWidth = $this->GetPageWidth();
        $margin = $this->GetMargins();
        $usableWidth = $pageWidth - $margin['left'] - $margin['right'];

        $columnWidth = 180;
        $tableWidth = $columnWidth; 
        $this->SetLineWidth(0.5);
        $centerX = ($usableWidth - $tableWidth) / 2 + $margin['left'];
        $this->SetX($centerX);

       
        $this->MultiCell($columnWidth, 10, $long_term_target, 1, 'L');

        

       
//end longtermtarget


//target program table 
        $this->Ln(2);
        $pageWidth = $this->GetPageWidth();
        $margin = $this->GetMargins();
        $usableWidth = $pageWidth - $margin['left'] - $margin['right'];

        $columnWidth = 45;
        $tableWidth = $columnWidth * 4;
        $this->SetLineWidth(0.2);

        $centerX = ($usableWidth - $tableWidth) / 2 + $margin['left'];
        $this->SetX($centerX);

       
        $this->SetFont('times', 9);
        $this->Cell($tableWidth, 6, 'Months', 1, 1, 'C');
      

        $this->SetX($centerX);
        $this->SetFont('times', 8);
        $this->Cell($columnWidth, 6, 'program', 1, 0, 'C');
        $this->Cell($columnWidth, 6, '1st Month', 1, 0, 'C');
        $this->Cell($columnWidth, 6, '2nd Month', 1, 0, 'C');
        $this->Cell($columnWidth, 6, '3rd Month', 1, 1, 'C');

        $sql1 = "SELECT b. *, a.name, a.age, a.teacher_incharge FROM learner a JOIN learner_program b ON b.learnerID = a.learnerID WHERE a.learnerID = '$learnerID'";
       
        $query1 = ($con->query($sql1));

        while ( $row1 = $query1->fetch_assoc()) {
           
                    $name = $row1['name'];
                    $age= $row1['age'];
                    $teacher_incharge= $row1['teacher_incharge'];
                    $program = $row1['program']; 
                    $month_1 = $row1['month_1'];
                    $month_2 = $row1['month_2'];
                    $month_3 = $row1['month_3'];
                    $this->SetFont('times', '', 10);
    
                    $this->SetFont('times', 8);
                    $this->SetX($centerX);

                   
                    $x = $this->GetX();
                    $y = $this->GetY();
                    $this->SetFillColor(255, 255, 255); // White

                    //gawing multicell para hindi magoverlap yung text sa border nandun lang yung text sa border box
                    $this->MultiCell($columnWidth, 30, $program, 1, 'L');

                    $newY = $this->GetY();
                    $cellHeight = $newY - $y;

                    
                    $this->SetXY($x + $columnWidth, $y);
                    $this->MultiCell($columnWidth, $cellHeight, $month_1, 1, 0, 'C');

                    $this->SetXY($x + 2 * $columnWidth, $y);
                    $this->MultiCell($columnWidth, $cellHeight, $month_2, 1, 0, 'C');

                    $this->SetXY($x + 3 * $columnWidth, $y);
                    $this->MultiCell($columnWidth, $cellHeight, $month_3, 1, 1, 'C');

    }

    $sql = "SELECT * FROM learner_targetprogram WHERE learnerID = '$learnerID'";
       
        $query = ($con->query($sql));
        while ( $row = $query->fetch_assoc()) {
    
            $month1_targetprogram =  $row['month1_targetprogram'];
            $month2_targetprogram =  $row['month2_targetprogram'];
            $month3_targetprogram =  $row['month3_targetprogram'];
            $month1_week1  = $row['month1_week1'];
            $month1_week2  = $row['month1_week2'];
            $month1_week3  = $row['month1_week3'];
            $month1_week4  = $row['month1_week4'];
            $month2_week1 = $row['month2_week1'];
            $month2_week2 = $row['month2_week2'];
            $month2_week3 = $row['month2_week3'];
            $month2_week4 = $row['month2_week4'];
            $month3_week1 = $row['month3_week1'];
            $month3_week2 = $row['month3_week2'];
            $month3_week3 = $row['month3_week3'];
            $month3_week4 = $row['month3_week4'];

            $month1_date_from = $row['month1_date_from'];
            $formatted_month1_date_from = date('F j', strtotime($month1_date_from)); // magiging "April 1"
            $month1_date_to = $row['month1_date_to'];
            $formatted_month1_date_to = date('F j Y', strtotime($month1_date_to)); // magiging "April 1, 2025"

            $month2_date_from = $row['month2_date_from'];
            $formatted_month2_date_from = date('F j', strtotime($month2_date_from)); // magiging "April 1"
            $month2_date_to = $row['month2_date_to'];
            $formatted_month2_date_to = date('F j Y', strtotime($month2_date_to)); // magiging "April 1, 2025"

            $month3_date_from = $row['month3_date_from'];
            $formatted_month3_date_from = date('F j', strtotime($month3_date_from)); // magiging "April 1"
            $month3_date_to = $row['month3_date_to'];
            $formatted_month3_date_to = date('F j Y', strtotime($month3_date_to)); // magiging "April 1, 2025"

    }


        $this->Ln(2); 
        $this->SetFont('times', 10); 
        $this->Cell(0, 6, 'Detailed Activities (Weekly Targets):', 0, 1, 'L');
          
        
          $this->Ln(-1);
          $pageWidth = $this->GetPageWidth();
          $margin = $this->GetMargins();
          $usableWidth = $pageWidth - $margin['left'] - $margin['right'];
  
          $columnWidth = 36;
          $tableWidth = $columnWidth * 5;
          $this->SetLineWidth(0.2);
  

          $centerX = ($usableWidth - $tableWidth) / 2 + $margin['left'];
          $this->SetX($centerX);
  

          
          $this->SetFont('times','', 10);
          $this->Cell($tableWidth, 6, 'Months Duration: 3 months', 1, 1, 'C');

          $this->SetFont('Times','B', 10);
          $this->Cell($tableWidth, 6, '1st Month: (Date: ' .  $formatted_month1_date_from . ' to ' . $formatted_month1_date_to. ')', 1, 1, 'C');

          

         
          $this->SetX($centerX);
          $this->SetFont('times','B', 10);
          $this->Cell($columnWidth, 6, 'Target Program', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 1', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 2', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 3', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 4', 1, 1, 'C');


          $this->SetFont('times', 10);
          $this->SetX($centerX);
          
          $x = $this->GetX();
          $y = $this->GetY();
          $this->SetFillColor(255, 255, 255); // White
          
          $fixedHeight = 65; 
         
          $this->SetXY($x, $y);
          $this->MultiCell($columnWidth, $fixedHeight, $month1_targetprogram, 1, 'L', 0, 0);
          
        
          $this->SetXY($x + $columnWidth, $y);
          $this->MultiCell($columnWidth, $fixedHeight, $month1_week1, 1, 'L', 0, 0);
          
          
          $this->SetXY($x + 2 * $columnWidth, $y);
          $this->MultiCell($columnWidth, $fixedHeight, $month1_week2, 1, 'L', 0, 0);
          
          
          $this->SetXY($x + 3 * $columnWidth, $y);
          $this->MultiCell($columnWidth, $fixedHeight, $month1_week3, 1, 'L', 0, 0);
          
          
          $this->SetXY($x + 4 * $columnWidth, $y);
          $this->MultiCell($columnWidth, $fixedHeight, $month1_week4, 1, 'L', 0, 1); // Line break after last column
          
          

          

          //dito po yung month1 date ay nag kakaroon ng error kapag nilalagay ko yung date variable ng month1 
          //$this->Cell($tableWidth, 6, '1st Month: '.$month1_date_to,'-'.$month1_date_to 1, 1, 'C');
          $this->SetFont('Times', 'B', 10);
          $this->Cell($tableWidth, 6, '2nd Month: (Date: ' . $formatted_month2_date_from . ' to ' . $formatted_month2_date_to . ')', 1, 1, 'C');


          

         
          $this->SetX($centerX);
          $this->SetFont('times','B', 10);
          $this->Cell($columnWidth, 6, 'Target Program', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 1', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 2', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 3', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 4', 1, 1, 'C');

         
          

        $this->SetX($centerX);
        $this->SetFont('times', '', 10);

       
        $columnWidth = 36; 

        
        $x = $this->GetX();
        $y = $this->GetY();

        
        $this->SetXY($x, $y);
        $this->MultiCell($columnWidth, 70, $month2_targetprogram, 1, 'L', 0, 0);

        
        $this->SetXY($x + $columnWidth, $y);
        $this->MultiCell($columnWidth, 70, $month2_week1, 1, 'L', 0, 0);

      
        $this->SetXY($x + 2 * $columnWidth, $y);
        $this->MultiCell($columnWidth, 70, $month2_week2, 1, 'L', 0, 0);

       
        $this->SetXY($x + 3 * $columnWidth, $y);
        $this->MultiCell($columnWidth, 70, $month2_week3, 1, 'L', 0, 0);

        
        $this->SetXY($x + 4 * $columnWidth, $y);
        $this->MultiCell($columnWidth, 70, $month2_week4, 1, 'L', 0, 1);



        
            //3RD MONTH TABLE
         
        $this->SetFont('Times','B', 10);
        $this->Cell($tableWidth, 6, '3rd Month: (Date: ' .  $formatted_month3_date_from . ' to ' . $formatted_month3_date_to. ')', 1, 1, 'C');
  
          

          $this->SetX($centerX);
          $this->SetFont('times','B', 10);
          $this->Cell($columnWidth, 6, 'Target Program', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 1', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 2', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 3', 1, 0, 'C');
          $this->Cell($columnWidth, 6, 'Week 4', 1, 1, 'C');

         
          

        $this->SetX($centerX);
        $this->SetFont('times', '', 10);

        
        $columnWidth = 36; 

        
        $x = $this->GetX();
        $y = $this->GetY();

        $this->SetXY($x, $y);
        $this->MultiCell($columnWidth, 65, $month3_targetprogram, 1, 'L', 0, 0);

        
        $this->SetXY($x + $columnWidth, $y);
        $this->MultiCell($columnWidth, 65, $month3_week1, 1, 'L', 0, 0);

        $this->SetXY($x + 2 * $columnWidth, $y);
        $this->MultiCell($columnWidth, 65, $month3_week2, 1, 'L', 0, 0);

    
        $this->SetXY($x + 3 * $columnWidth, $y);
        $this->MultiCell($columnWidth, 65, $month3_week3, 1, 'L', 0, 0);


        $this->SetXY($x + 4 * $columnWidth, $y);
        $this->MultiCell($columnWidth, 65, $month3_week4, 1, 'L', 0, 1);

         


          //end of table month2_week1-4


          
         // Table for Detailed Activities (Weekly Targets):
            // $this->Ln(2);
            // $pageWidth = $this->GetPageWidth();
            // $margin = $this->GetMargins();
            // $usableWidth = $pageWidth - $margin['left'] - $margin['right'];
        
            // $columnWidth = 36;
            // $tableWidth = $columnWidth * 5;
            // $this->SetLineWidth(0.2);
        
      
            // $centerX = ($usableWidth - $tableWidth) / 2 + $margin['left'];
            // $this->SetX($centerX);

            //table for month2_week1-4

           
            

            //end of table for month2_week1-4
        
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

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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

$pdf->TitlePage("Learner's Program Plan");

// print colored table
$pdf->ColoredTable($header);


// print a block of text using Write()
$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('Learner_Program Plan '. '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+