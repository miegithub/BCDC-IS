<?php
    $currentPage = "";
    session_start();
    
    include('includes/header.php'); 
    include('includes/navbar.php');

?>
<div class="container full-height h-100" style="">
    <div class="row" style="height: 100%;">
        <div class="col-md-6 " style="background-color: white;">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-md-3">
                        <img src="images/extension_logo.png" alt="" style="width:100%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10" style="text-align:center;margin-top: 15px;color:#004aab;">
                        <h3 style="font-size: 51px;">Forgot your password?</h3>
                        <label style="font-size: 23px;"><i>Kindly input your registered email address and we will send you the OTP code</i></label>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="row">
                <form action="forgetpasswordcode.php" method="POST" style="margin: 0 5%;">
                    <div class="row">
                    
                        <div class="col-md-10 mb-1">
                            <?php 
                                if (isset($_SESSION['message'])) {
                                    echo '<label style="font-size: 27px;color:#Ff0000">',$_SESSION['message'].'</label>';
                                    unset($_SESSION['message']);
                                } else {
                                    // Code to handle the case when 'message' is not set
                                    echo '<label style="font-size: 27px;">Enter your email address</label>';
                                }
                            ?>
                        </div>
                        <div class="col-md-12 mb-3"><input type="text" class="form-control border border-black" name="email" style="width:70%"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" style="">
                        
                            <button type="submit" name="forgetpassword" class="btn btn_login" style="width: 70%;border-radius: 50px;background:#004aab;color:#ffffff;font-size:28px;padding:0"><strong>Send OTP</strong></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" style="">
                        
                            <a href="index.php" class="btn btn-secondary" style="width: 70%;border-radius: 50px;color:#ffffff;font-size:28px;padding:0"><strong>BACK</strong></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6" style="display: flex;justify-content: center;">
            <!--<div class="image-container">
                <img src="images/extension_logo.png" style="margin-left:3%;margin-top:5em;width:36em;height:70%;margin-right:3%">
            </div>-->
        </div>
    </div>
    
</div>
<?php
    include('includes/footer.php'); 
?>