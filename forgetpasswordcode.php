<?php
    session_start();
    include('admin/config/dbcon.php');
    
    use PHPMailer\PHPMailer\PHPMailer; //PHPMailer Object 
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['forgetpassword'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);

        if(empty($email)){
            $_SESSION['message'] = "Sorry, kindly re-enter your address or mobile number as we cannot locate your account.";
            header("Location: forgetpassword.php");
            exit(0);
        }
        else{
            $query = "SELECT email FROM tblusers WHERE email='$email'";
            $checkemail_run = mysqli_query($con,$query);
            if(mysqli_num_rows($checkemail_run) > 0 ){
                //ALREADY EMAIL EXISTS
                

                require 'phpmailer/src/Exception.php';
                require 'phpmailer/src/PHPMailer.php';
                require 'phpmailer/src/SMTP.php';

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mayell@gmail.com';
                $mail->Password = 'mayell';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('mayell@gmail.com');

                $mail->addAddress($email);

                $mail->isHTML(true);

                $mail->Subject = "OTP CODE";
                $randomNumber = rand(100000, 999999);
                $mail->Body = "Your verify OTP code is ".$randomNumber;

                if(!$mail->Send()) {
                    $_SESSION['message'] = "Something Wrong!";
                    header("Location: forgetpassword.php");
                    exit(0);
                }
                else {
                    $user_query = "UPDATE `tblusers` SET `otp`='$randomNumber' WHERE email='$email'";
                    $user_query_run = mysqli_query($con, $user_query);
                    if($user_query_run){
                        $_SESSION['getemail'] = "$email";
                        echo "<scrip>
                        alert('Sent Successfully)';
                        </script>";
                        header("Location: inputOTP.php");
                        exit(0);
                    }
                    else{

                    }
                }
                
            }
            else{
                $_SESSION['message'] = "Sorry, kindly re-enter your address or mobile number as we cannot locate your account.";
                header("Location: forgetpassword.php");
                exit(0);
            }
        }
        
    }
    
    if(isset($_POST['inputOTP'])){
        $otp = mysqli_real_escape_string($con, $_POST['otp']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        
        $query = "SELECT otp FROM tblusers WHERE email='$email'";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) >0){
            foreach($query_run as $row){
                $getotp = $row['otp'];
                if($getotp == $otp){
                    $_SESSION['getemail'] = "$email";
                    header("Location: newpassword.php");
                    exit(0);
                }
                else{
                    $_SESSION['message'] = "Invalid OTP code!";
                        header("Location: inputOTP.php");
                        exit(0);
                }

            }
        }
        
    }
?>