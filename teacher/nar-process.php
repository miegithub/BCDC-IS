<?php
session_start();
include('../admin/config/dbcon.php');

if (isset($_POST['submit_narrative'])) {
    $learnerID = $_POST['learnerID'];
    $pr_date = $_POST['pr_date'] ?? '';
    $l_overview = $_POST['l_overview'] ?? '';
    $a_behavior = $_POST['a_behavior'] ?? '';
    $b_gross = $_POST['b_gross'] ?? '';
    $c_fine = $_POST['c_fine'] ?? '';
    $d_cog = $_POST['d_cog'] ?? '';
    $e_act = $_POST['e_act'] ?? '';
    $client_program = $_POST['client_program'] ?? '';
    $recom = $_POST['recom'] ?? '';

    
    $check_query = "SELECT * FROM narrative_report WHERE learnerID = '$learnerID'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {
        
        $sql = "UPDATE narrative_report SET
                    pr_date = '$pr_date',
                    l_overview = '$l_overview',
                    a_behavior = '$a_behavior',
                    b_gross = '$b_gross',
                    c_fine = '$c_fine',
                    d_cog = '$d_cog',
                    e_act = '$e_act',
                    client_program = '$client_program',
                    recom = '$recom'
                WHERE learnerID = '$learnerID'";

        if (mysqli_query($con, $sql)) {
            $_SESSION['message'] = "Narrative report updated successfully!";
        } else {
            $_SESSION['error'] = "Error updating narrative report.";
        }

    } else {
      
        $insert = "INSERT INTO narrative_report 
                    (learnerID, pr_date, l_overview, a_behavior, b_gross, c_fine, d_cog, e_act, client_program, recom)
                   VALUES 
                    ('$learnerID', '$pr_date', '$l_overview', '$a_behavior', '$b_gross', '$c_fine', '$d_cog', '$e_act', '$client_program', '$recom')";

        if (mysqli_query($con, $insert)) {
            $_SESSION['message'] = "Narrative report created successfully!";
        } else {
            $_SESSION['error'] = "Error saving narrative report.";
        }
    }

    
    header("Location: narrative-report.php?id=$learnerID");
    exit();
}
?>
