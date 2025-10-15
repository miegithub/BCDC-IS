<?php
    session_start();
    
    include('admin/config/dbcon.php');

    if(isset($_POST['newpassword'])){
        $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
        $verify_password = mysqli_real_escape_string($con, $_POST['verify_password']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $query = "SELECT * FROM tblusers WHERE email='$email'";
        $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run) > 0 ){
            foreach($query_run as $row){
                if($new_password ==$verify_password){
                    $query1 = "UPDATE tblusers SET password = ? WHERE id = ?";
                    $stmt = mysqli_prepare($con, $query1);
                    
                    // Bind parameters and set their values
                    mysqli_stmt_bind_param($stmt, "si", $new_password, $row['ID']);
                    echo $email;
                    // Execute the statement
                    $query_run1 = mysqli_stmt_execute($stmt);

                    // Check if the query was successful
                    if ($query_run1) {
                        $_SESSION['message'] = $row['ID']."Change Password Successfully!";
                        header("Location: login.php");
                        exit(0);
                    } else {
                        // Handle the case when the query fails
                        $_SESSION['message'] = "Failed to update password. Please try again.";
                        header("Location: newpassword.php");
                        exit(0);
                    }

                    // Close the statement
                    mysqli_stmt_close($stmt);
                }
                else{
                    $_SESSION['message'] = "Password does not match!";
                    header("Location: newpassword.php");
                    exit(0);
                }
                
            }
        }
    }
?>