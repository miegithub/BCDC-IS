<?php
    $currentPage = "";
    session_start();
    include('includes/header.php'); 
    include('includes/navbar.php'); 
?>
<div class="container-fluid full-height h-100" style="">
    <?php include('message.php');?>  
    <div class="row" style="height: 100%;">
        <div class="col-md-6 " style="background-color: white;">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-md-3">
                        <img src="images/logo3.png" alt="" style="width:100%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10" style="text-align:center;margin-top: 15px;color:#004aab;">
                        <h3 style="font-size: 51px;">Reset Password?</h3>
                        <label style="font-size: 23px;"><i>Kindly enter a new password associated on your account</i></label>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="row">
                <form action="changepasswordcode.php" method="POST" style="margin: 0 5%;">
                <input type="hidden" name="email" value="<?=$_SESSION['getemail']; ?>">
                    <div class="row">
                        <div class="col-md-10 mb-1"><label style="font-size: 27px;">New Password:</label>
                        </div>
                        <div class="col-md-12 mb-3"><input type="password" class="form-control border-black" name="new_password" style="width:70%"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mb-1"><label style="font-size: 27px;">Verify Password:</label>
                        </div>
                        <div class="col-md-12 mb-3"><input type="password" class="form-control border-black" name="verify_password" style="width:70%"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" style="">
                            <button type="submit" name="newpassword" class="btn btn_login" style="width: 70%;border-radius: 50px;background:#004aab;color:#ffffff;font-size:28px;padding:0"><strong>SAVE</strong></button>
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
            <div class="image-container">
                <img src="images/extension_logo.png" style="margin-left:3%;margin-top:110px;width:410px;height:70%;margin-right:3%">
            </div>
        </div>
    </div>
    
</div>
<?php
    include('includes/footer.php'); 
?>