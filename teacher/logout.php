<?php
    session_start();

    include('../admin/config/dbcon.php');
    if(isset($_POST['logout_btn'])){
        $name= $_SESSION['auth_user']['name'];
        unset( $_SESSION['auth']);
        unset( $_SESSION['auth_type']);
        unset( $_SESSION['auth_user']);
        unset( $_SESSION['username']);
        unset( $_SESSION['learnerID']);

        date_default_timezone_set('Asia/Manila');
        $current_time = date("h:i a");
        $date_today = date("Y-m-d");
        $activity = "LOGOUT SUCCESSFULLY";
        $query1 = "INSERT INTO `log_monitoring`(`name`, position, activity,`date`, action_time, `time_in`) VALUES ('$name','$position','$activity','$date_today','$current_time','$current_time')";
        $query_run1 = mysqli_query($con, $query1);
        $name= $_SESSION['auth_user']['name'];
        unset( $_SESSION['auth']);
        unset( $_SESSION['auth_type']);
        unset( $_SESSION['auth_user']);
        unset( $_SESSION['username']);
        unset( $_SESSION['learnerID']);

        date_default_timezone_set('Asia/Manila');
        $current_time = date("h:i a");

        
        $query1 = "UPDATE `log_monitoring` SET `time_out`='$current_time' WHERE ID = (SELECT MAX(id) FROM `log_monitoring` WHERE name = '$name')";
        $query_run1 = mysqli_query($con, $query1);
        header("Location: ../login.php");
        exit(0);
    }
?>