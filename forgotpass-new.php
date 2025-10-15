<?php
    $currentPage = "login";
    session_start();
    include('admin/config/dbcon.php');
    include('admin/includes/header.php'); 
    include('admin/includes/navbar.php'); 
    

    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i a");
    $date_today = date("Y-m-d");
    $password=null;
    $retype_password=null;
?>
<style>
    .login_logo{
        width:450px;height:150px;
        
    }
    
    .text_nut{
            font-size: 2rem;
        }
    .text_nut1{
            font-size: 1.3rem;
        }
    @media screen and (max-width: 992px) {
        .login_logo{
            width:450px;
            height: 120px;
        }
        .text_nut{
            font-size: 1rem;
        }
        .text_nut1{
            font-size: 0.7rem;
        }
        .line-with-dots{
            margin:2px;
        }
    }
</style>
<?php          
    if(isset($_POST['submit_otp'])){
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $retype_password = mysqli_real_escape_string($con, $_POST['retype_password']);
        $email = $_SESSION['email'];
        
        if($password!=$retype_password){
            echo '
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger" style="">
                    <div class="modal-body text-center">
                        <h5 class="text-white">Password does not match!</h5>
                    </div>
                    <div class="modal-footer">
                        <button data-bs-dismiss="modal" type="button" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                    </div>
                    </div>
                </div>
                </div>';
        }
        else{
            
            $user_query = "UPDATE `user` SET `password`='$password' WHERE email='$email'";
            $user_query_run = mysqli_query($con, $user_query);
            
            header("Location: login.php");
            exit(0); 
        }
    }
?>
            <!--------------- Main Container ----------- -->
<div class="container d-flex justify-content-center align-items-center"  style="padding-top:57px;">
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
            
            <form action="" method="post" class="d-flex justify-content-center align-items-center" style="height: 80vh;">
                <div class="container border rounded-5 p-3 bg-white shadow box-area align-items-center">
                    <!--------------- Login Container ----------- -->
                    <div class="row ">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                            
                            
                        </div>
                        
                    </div>
                    <div class="row mb-3 mt-3">
                       
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8">

                            <label class="form-label fw-light fw-bold ms-5">New Password</label>
                            <input type="password" name="password" class="form-control border border-dark ms-5" placeholder="Enter New Password" value="<?= $password; ?>" style="font-size: 0.8rem; width: 250px; background-color: #F5F5F5;" required>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8">
                            <label class="form-label fw-light fw-bold ms-5">Re-type Password</label>
                            <input type="password" name="retype_password" class="form-control border border-dark ms-5" placeholder="Enter Re-type Password" value="<?= $retype_password; ?>"style=" font-size: 0.8rem; width: 250px; background-color: #F5F5F5;"  required>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8 text-center">
                       
                        
                        <button type="submit" name="submit_otp" class="btn text-white w-100 ms-2" style="background-color:rgba(4, 3, 70); font-size: 0.8rem; padding: 0.5rem 1rem;">Verify</button>
                        </div>
                    </div>
                    <div class="row mt-3 text-center mb-3">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <a href="forgotpass-code.php" class="link-underline-light">Resend OTP</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">

        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  myModal.show();
});
</script>

<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>  
<?php
    include('includes/footer.php'); 
?>
