<?php
    session_start();
    ob_start();
    include('admin/config/dbcon.php');
    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i a");
    $date_today = date("Y-m-d");

?>

<?php

    if(isset($_POST['update_btn'])){
        $userid = mysqli_real_escape_string($con, $_POST['userid']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $temp_username = mysqli_real_escape_string($con, $_POST['temp_username']);
        $lastname = mysqli_real_escape_string($con, $_POST['lname']);
        $firstname = mysqli_real_escape_string($con, $_POST['fname']);
        $middlename = mysqli_real_escape_string($con, $_POST['mname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        #$department = mysqli_real_escape_string($con, $_POST['department']);

        
        if($middlename == null){
            $name = $firstname. ' ' .$lastname;
        }
        else{
            $name = $firstname. ' ' .$middlename. ' '.$lastname;
        }
        if($temp_username == $username){
            $user_query = "UPDATE `tblusers` SET `NAME`='$name',`fname`='$firstname',`mname`='$middlename',`lname`='$lastname',`USERNAME`='$username',`EMAIL`='$email' WHERE id='$userid'";
            $user_query_run = mysqli_query($con, $user_query);

            if($user_query_run){
                $_SESSION['auth_user'] = [  
                    'user_id'=>$userid,
                    'name'=>$name,
                    'user_email'=>$email,
                ];
                $_SESSION['message'] = "Updated Successfully!";
                header(header: "Location: profile.php");
                exit(0); 
            }
            else{
                $_SESSION['message'] = "Something Went Wrong!";
            header("Location: profile.php");
            exit(0);
            }
        }
        else{
            $checkusername = "SELECT username FROM tblusers WHERE username='$username'";
            $checkusername_run = mysqli_query($con,$checkusername);
            if(mysqli_num_rows($checkusername_run) > 0 ){
                $_SESSION['message'] = "Username already exist!";
                header("Location: profile.php");
                exit(0); 
            }
            else{
                $user_query = "UPDATE `tblusers` SET `NAME`='$name',`fname`='$firstname',`mname`='$middlename',`lname`='$lastname',`USERNAME`='$username',`EMAIL`='$email' WHERE id='$userid'";
                $user_query_run = mysqli_query($con, $user_query);

                if($user_query_run){
                    $_SESSION['auth_user'] = [  
                        'user_id'=>$userid,
                        'name'=>$name,
                        'user_email'=>$email,
                    ];
                    $_SESSION['message'] = "Updated Successfully!";
                    header("Location: profile.php");
                    exit(0); 
                }
                else{
                    $_SESSION['message'] = "Something Went Wrong!";
                header("Location: profile.php");
                exit(0);
                }
            }
        }
    }
    if(isset($_POST['update_password'])){
        $userid = mysqli_real_escape_string($con, $_POST['userid']);
        $current_password = mysqli_real_escape_string($con, $_POST['current_password']);
        $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

        $checkpassword = "SELECT password FROM tblusers WHERE id='$userid'";
        $checkpassword_run = mysqli_query($con,$checkpassword);
        if(mysqli_num_rows($checkpassword_run) > 0 ){
            foreach($checkpassword_run as $row){ // GET DATA
                if($row['password'] == $current_password){
                    if($new_password == $confirm_password){
                        $query = "UPDATE `tblusers` SET `PASSWORD`='$new_password' WHERE id='$userid'";
                        $query_run = mysqli_query($con, $query);
                        if($query_run){
                            $_SESSION['message'] = "Password Updated Successfully!";
                            header("Location: changepassword.php");
                            exit(0); 
                        }
                        else{
                            $_SESSION['message'] = "Something Went Wrong!";
                            header("Location: changepassword.php");
                            exit(0);
                        }
                        
                    }
                    else{
                        #echo "<script>alert('New Password and Confirm Password does not match!')</script>";
                        $_SESSION['message'] = "New Password and Confirm Password does not match!";
                        header("Location: changepassword.php");
                        exit(0); 
                    }
                }
                else{
                    #echo "<script>alert('Current Password does not match!')</script>";
                    $_SESSION['message'] = "Current Password does not match!";
                    header("Location: changepassword.php");
                    exit(0); 
                }
            }
        }
    }
    ob_end_flush();
?>