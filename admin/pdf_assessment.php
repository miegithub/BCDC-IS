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
        // Logo
        $image_file = '../images/bcdc_step3.jpg';
        $this->Image($image_file, 45, 5, 110, '', 'JPG', '', 'T', true, 200, '', false, false, 0, false, false, false);

        $this->Line("10", "26", "200","26");
        $this->SetLineWidth(1.5); // 0.5 mm
        
    }

    // Colored table
    public function ColoredTable($header) {
        $learnerID = $_GET['id'];
        include('../admin/config/dbcon.php');
        $query = "SELECT * FROM learner a join learner_ass b on b.learnerID=a.learnerID WHERE a.learnerID='$learnerID'";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            if(mysqli_num_rows($query_run) > 0){
                foreach($query_run as $row){
                    $name = $row['name'];
                    //$date = $row['date_enrolled'];
                    $age = $row['age'];
                    $date_of_birth = $row['date_of_birth'];
                    $date = new DateTime($date_of_birth);
                    $f_date_of_birth = $date->format('F j, Y'); // Outputs 'December 3, 2023'
                    $ass_date = $row['ass_date'];
                    $ass_date = $row['ass_date']; // Assume this is '2023-12-03'
                    $date = new DateTime($ass_date);
                    $f_ass_date = $date->format('F j, Y'); // Outputs 'December 3, 2023'
                    $dev_diagnosis = $row['dev_diagnosis'];
                    $current_concern = $row['current_concern'];
                    $fine_motor = $row['fine_motor'];
                    $language = $row['language'];
                    $personal = $row['personal'];
                    $cognitive = $row['cognitive'];
                    $behavior = $row['behavior'];
                    $social = $row['social'];
                    $adaptive = $row['adaptive'];
                    $conceptual = $row['conceptual'];
                    $practical = $row['practical'];
                    $recommendation = $row['recommendation'];
                    $lang_com = $row['lang_com'];
                }
            }
        }
        
        
        $this->SetFont('times', 'B', 8);
        // Column 1 content
        $this->Cell('120', 2, 'Name of Patient: '.$name, 0, 0, 'L'); 
        $this->Cell('60', 2, 'Date: '.$f_ass_date, 0, 1, 'L'); 
        
        $this->Cell('120', 2, 'Age: '.$age, 0, 0, 'L'); 
        $this->Cell('60', 2, 'Birthdate: '.$f_date_of_birth, 0, 1, 'L'); 

        //Developmental Diagnosis
        $this->Ln(2);
        $this->Cell('90', 2, 'Developmental Diagnosis:', 0, 1, 'L'); 
        $this->SetFont('times', '', 8);
        //$paragraph = "            Autism Spectrum Disorder, require VERY SUBSTANTIAL support on social interaction and restricted, repetitive behaviors. With language (non-verbal) and intellectual impairment, probably severe to profound.";
        $this->MultiCell(0, 5, $dev_diagnosis, 0, 'L', false, 1);

        // CURRENT CONCERNS
        $this->SetFont('times', 'B', 8);
        $this->Ln(2);
        $this->Cell('90', 2, 'Current Concerns:', 0, 1, 'L'); 
        $this->SetFont('times', '', 8);
        //$paragraph = "            Red was diagnosed Autism Spectrum Disorder, require  support on social interaction and restricted, repetitive behaviors. With language (non-verbal) and intellectual impairment, probably severe to profound he still needs assistance while toileting, dressing, and eating.";
        $this->MultiCell(0, 5, $current_concern, 0, 'L', false, 1);
        
        // PRESENT DEVELOPMENT PROFLE
        $this->SetFont('times', 'B', 8);
        $this->Ln(2);
        $this->Cell('90', 2, 'Present Development Profile:', 0, 1, 'L'); 

        $this->SetFont('times', 'B', 8);

        // Calculate center position
        $pageWidth = $this->GetPageWidth();   // Get the width of the page
        $margin = $this->GetMargins();        // Get page margins
        $usableWidth = $pageWidth - $margin['left'] - $margin['right']; // Width without margins

        // Define the column widths
        $columnWidth = 40;  // Width of each column (adjust as needed)
        $tableWidth = $columnWidth * 2; // Total width of the table

        // Calculate the X position to center the table
        $centerX = ($usableWidth - $tableWidth) / 2 + $margin['left'];

        // Move to the center X position
        $this->SetX($centerX);

        // Define table headers
        $this->Cell($columnWidth, 4, 'Domain', 1, 0, 'C');
        $this->Cell($columnWidth, 4, 'Functional Age', 1, 1, 'C');

        // Move to the center X position for rows
        $this->SetX($centerX);
        $this->Cell($columnWidth, 4, 'Fine Motor', 1, 0, 'C');
        $this->SetFont('times', '', 8);
        $this->Cell($columnWidth, 4, $fine_motor, 1, 1, 'C');

        // Another row (optional)
        $this->SetX($centerX);
        $this->SetFont('times', 'B', 8);
        $this->Cell($columnWidth, 4, 'Language', 1, 0, 'C');
        $this->SetFont('times', '', 8);
        $this->Cell($columnWidth, 4, $language, 1, 1, 'C');
        
        $this->SetX($centerX);
        $this->SetFont('times', 'B', 8);
        $this->Cell($columnWidth, 4, 'Personal/Social', 1, 0, 'C');
        $this->SetFont('times', '', 8);
        $this->Cell($columnWidth, 4, $personal, 1, 1, 'C');
        
        $this->SetX($centerX);
        $this->SetFont('times', 'B', 8);
        $this->Cell($columnWidth, 4, 'Cognitive', 1, 0, 'C');
        $this->SetFont('times', '', 8);
        $this->Cell($columnWidth, 4, $cognitive, 1, 1, 'C');

        
        // PRESENT DEVELOPMENT PROFLE
        $this->SetFont('times', 'B', 8);
        $this->Ln(2);
        $this->Cell('90', 2, 'Clinical Observations:', 0, 1, 'L'); 

        $this->SetFont('times', 'B', 8);
        $this->Write(2, 'Behavior: ');
        $this->SetFont('times', '', 8);
        //$paragraph = "Red has difficulty with self-regulation and required moderate assistance to physically prompt him to sit and comply. He gets easily distracted and exhibits noticeable self-stimulatory behaviors.";
        $this->Write(2, $behavior);
        $this->Ln(5);
        
        $this->SetFont('times', 'B', 8);
        $this->Write(2, 'Language/Communication: ');
        $this->SetFont('times', '', 8);
        $paragraph = "He was non-verbal, primarily using unusual and repetitive vocalizations to express himself and attract attention. He uses a few gestures to indicate his wants.";
        $this->Write(2, $lang_com);
        $this->Ln(5);

        $this->SetFont('times', 'B', 8);
        $this->Write(2, 'Social Skills: ');
        $this->SetFont('times', '', 8);
        $paragraph = "Red shows fair eye contact, limited interaction, and inconsistent responses to being called or to social bids from others, with notable atypical and repetitive behaviors. He has severe deficits in both verbal and nonverbal social communication skills, causing significant impairments in his functioning.";
        $this->Write(2, $social);
        $this->Ln(5);

        //$this->SetFont('times', 'B', 8);
        //$this->Write(2, 'Cognitive: ');
        //$this->SetFont('times', '', 8);
        //$paragraph = "Red 's cognitive  skills could not  be  screened  using  the  Kaufmann  Brief  Intelligence Test (KBIT-2)  because  the test requires  a  level of  verbal communication and comprehension that he does not possess.";
        //$this->Write(2, $paragraph);
        //$this->Ln(3);

        $this->SetFont('times', 'B', 8);
        $this->Write(2, 'Adaptive: ');
        $this->SetFont('times', '', 8);
        $paragraph = "Red faces significant challenges that prevent him from achieving the level of independence and social responsibility typically expected for his age.";
        $this->Write(2, $adaptive);
        $this->Ln(5);

        $this->SetFont('times', 'B', 8);
        $this->Write(2, 'Conceptual: ');
        $this->SetFont('times', '', 8);
        $paragraph = "His understanding of written language, numbers, quantities, time, and money is extremely limited. He would rely heavily on caregivers for support in problem-solving throughout life. ";
        $this->Write(2, $conceptual);
        $this->Ln(5);

        //$this->SetFont('times', 'B', 8);
        //$this->Write(2, 'Social: ');
        //$this->SetFont('times', '', 8);
        //$paragraph = "Red  has  an  extremely limited  understanding  of symbolic communication,  such  as  speech  or gestures, though  he may  understand some simple instructions or gestures. He also exhibits sensory impairments that prevent full participation in social activities.";
        //$this->Write(2, $paragraph);
        //$this->Ln(3);

        $this->SetFont('times', 'B', 8);
        $this->Write(2, 'Practical: ');
        $this->SetFont('times', '', 8);
        $paragraph = "Red requires support for all aspects of daily living, including meals, dressing, bathing, and toileting. He needs constant supervision. As he grows older, Red can participate in tasks at home, in recreation, and at work but will require ongoing support and assistance. Long-term teaching and support will be necessary, and maladaptive behaviors, such as self-injury, may be evident.";
        $this->Write(2, $practical);
        $this->Ln(5);

        
        $this->SetFont('times', 'B', 8);
        $this->Write(2, 'Recommendation: ');
        $this->SetFont('times', '', 8);
        $paragraph = "Red shows fair eye contact, limited interaction, and inconsistent responses to being called or to social bids from others, with notable atypical and repetitive behaviors. He has severe deficits in both verbal and nonverbal social communication skills, causing significant impairments in his functioning.";
        $this->Write(2, $recommendation);
        $this->Ln(7);

        $bullet = '     1.  ';
        $instruction = "";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);

/*        
        $this->SetFont('times', 'B', 8);
        $this->Cell('90', 2, 'Recommendation:', 0, 1, 'L'); 
        
        $this->SetFont('times', '', 8);

        $bullet = '     1.  ';
        $instruction = "Medication: Begin taking Risperidone, 1 mg per tablet; 1 tablet twice daily for 6 months. Report progress to BCDC every two weeks initially, then monthly after that. Do not stop the medication within the 6-month period without consultation with the prescribing doctor.";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);

        $bullet = '     2.  ';
        $instruction = "Schedule ABA therapy sessions at least twice a week to address behavior and life skills, and provide a parent/caregiver training program. Contact TEAMWORKS ABA THERAPY, INC. at Unit 210 RJ Titus Building 2, Halang Road, San Francisco, (0995)7615601 or teamworkslaguna@gmail.com for home-based services and parent training.";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        
        $bullet = '     3.  ';
        $instruction = "School Placement: Continue SPED program with a focus on transitioning to life skills education. This program should help Red learn self-care, develop practical skills for daily living, and adapt to adult life.";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        
        $bullet = '     4.  ';
        $instruction = "Home Management: Focus on developing essential life skills to enhance his independence and participation in household activities. This includes: ";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);

        $bullet = '             a.  ';
        $instruction = "Establishing consistent routines for daily activities like waking up, meals, and bedtime to provide structure and security.";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        
        $bullet = '             b.  ';
        $instruction = "Teaching self-care skills such as dressing, grooming, and bathing, starting with simple tasks and gradually increasing complexity.";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        
        $bullet = '             c.  ';
        $instruction = "Introducing basic household chores like tidying his room, sorting laundry, setting the table, or assisting with simple cooking tasks to foster a sense of responsibility. ";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        
        $bullet = '             d.  ';
        $instruction = "Educating Red on home safety, including avoiding hot surfaces, safely using appliances, and understanding emergency procedures. ";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        
        $bullet = '             e.  ';
        $instruction = "Encouraging the use of simple communication methods, such as verbal expressions, gestures, or visual aids, to communicate his needs and preferences.";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        
        
        $bullet = '             f.  ';
        $instruction = "Using visual schedules or charts to help Red understand and anticipate daily activities and routines.  ";
        $this->Cell(15, 2, $bullet, 0, 0);
        $this->MultiCell(0, 2, $instruction, 0, 'L', false, 1);
        $this->Ln(5);

 */       
        $this->SetFont('times', 'B', 8);
        $this->Cell('90', 2, 'Dr. Hazel Gertrude Manabal-Reyes', 0, 1, 'L'); 
        $this->Cell('90', 2, 'Developmental and Behavioral Pediatrics', 0, 1, 'L'); 
        $this->SetFont('times', '', 8);
        $this->Cell('90', 2, 'Lic. No. 107177 ', 0, 1, 'L'); 
        $this->Cell('90', 2, 'Disclaimer: No signature affixed. Sent via electronic mail. ', 0, 1, 'L'); 
        $this->Cell('90', 2, '            This report is not valid for medico-legal purposes.', 0, 1, 'L'); 
        

        
        

    }
    // Page footer
    public function Footer() {
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
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
$pdf->SetFont('times', 'BI', 8);

// add a page
$pdf->AddPage();

// column titles
$header = array('Courses', 'Date Created', 'Access By');


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