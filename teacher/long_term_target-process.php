<?php

session_start();
include('../admin/config/dbcon.php');

if (isset($_POST['submit_ipp'])) {

    $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
    $ipp_date = mysqli_real_escape_string($con, $_POST['ipp_date']);
    $long_term_target = mysqli_real_escape_string($con, $_POST['long_term_target']);

    // Define SQL update query
    $sql = "UPDATE learner 
            SET ipp_date = '$ipp_date', long_term_target = '$long_term_target' 
            WHERE learnerID = '$learnerID'";

    // Execute query
    $query_run = mysqli_query($con, $sql);

    // Check if query was successful
    if ($query_run) {
        $_SESSION['message'] = "IPP updated successfully!";
        echo "<script>toastr.success('IPP updated successfully!');</script>";
    } else {
        $_SESSION['error'] = "Failed to update IPP.";
        echo "<script>toastr.error('Failed to update IPP.');</script>";
    }
}
?>

                                   
                                    
                               

