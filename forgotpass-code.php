<?php
    $currentPage = "login";
    session_start();
    include('admin/config/dbcon.php');
    include('admin/includes/header.php'); 
    include('admin/includes/navbar.php'); 
    

    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i a");
    $date_today = date("Y-m-d");
    $otp=null;

    
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
        $otp = mysqli_real_escape_string($con, $_POST['otp']);
        $email = $_SESSION['email'];
        $query = "SELECT email,otp FROM user WHERE email='$email' AND archive='0' LIMIT 1";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) >0){
            $data = mysqli_fetch_assoc($query_run);
            if ($data) {
                // Now you can access the columns from the fetched row
                $otp_from_db = $data['otp'];

                if($otp != $otp_from_db){
                    echo '
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-danger" style="">
                            <div class="modal-body text-center">
                                <h5 class="text-white">Invalid OTP!</h5>
                            </div>
                            <div class="modal-footer">
                                <button data-bs-dismiss="modal" type="button" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                            </div>
                            </div>
                        </div>
                        </div>';
                }
                else{
                    $user_query = "UPDATE `user` SET `otp`='$otp' WHERE email='$email'";
                    $user_query_run = mysqli_query($con, $user_query);
                    
                    header("Location: forgotpass-new.php");
                    exit(0); 
                }
            }
            else {
                echo '
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger" style="">
                        <div class="modal-body text-center">
                            <h5 class="text-white">No matching records found!</h5>
                        </div>
                        <div class="modal-footer">
                            <button data-bs-dismiss="modal" type="button" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                        </div>
                        </div>
                    </div>
                    </div>';
            }
        }
        else{
            echo '
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger" style="">
                        <div class="modal-body text-center">
                            <h5 class="text-white">No users found!</h5>
                        </div>
                        <div class="modal-footer">
                            <button data-bs-dismiss="modal" type="button" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                        </div>
                    </div>
                </div>
                </div>';
        }
    }
?>
            <!--------------- Main Container ----------- -->
<div class="container d-flex justify-content-center align-items-center"  style="padding-top:57px;">
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
            <form action="" method="post" class="d-flex justify-content-center align-items-center" style="height: 80vh;" >
                <div class="container border rounded-5 p-3 bg-white shadow box-area align-items-center">
                    <!--------------- Login Container ----------- -->
                    <div class="row ">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                            
                        </div>
                        
                    </div>
                    <div class="row text-center mt-2">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5 class="mb-0 pb-0 text_nut fw-bold fs-5 mb-3 ">OTP Verfication</h5>
                        </div>
                    </div>
                    <div class="row text-center mt-0 pt-0">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <p class="text_nut1" style="font-size: 0.9rem;">Enter the verification code we just <br>sent on your email address. </p>
                            <img src="images/sendingimages.png" class="img-fluid me-4" alt="" style="width: 150px; height: auto;"> 
                        </div>


                    </div>
                    <div class="row text-center">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8">
                            <input type="text" name="otp" class="form-control border border-dark ms-5" placeholder="Enter the OTP code" value="<?= $otp; ?>"  style="font-size: 0.8rem; width: 250px; background-color: #F5F5F5;" required>
                       
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                    </div>
                    <div class="row mt-3 mb-4">
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8 text-center">
                        <button type="submit" name="submit_otp" class="btn text-white w-100 ms-2" style="background-color:rgba(4, 3, 70); font-size: 0.8rem; padding: 0.5rem 1rem;">Verify</button>
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center mt-3">
                            <a href="#">Resend OTP</a>
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
