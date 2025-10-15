<?php
    $currentPage = "login";
    session_start();
    include('admin/config/dbcon.php');
    include('admin/includes/header.php'); 
    include('admin/includes/navbar.php'); 
    

    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i a");
    $date_today = date("Y-m-d");
    $username=null;
    $password=null;
?>
<?php          
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        
        $query = "SELECT status,id,name,email,type,SESSION_COUNT,position FROM user WHERE username='$username' AND password='$password' LIMIT 1";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) >0){
            $data = mysqli_fetch_assoc($query_run);
            if ($data) {
                // Now you can access the columns from the fetched row
                $status = $data['status'];
                $userID = $data['id'];
                $name = $data['name'];
                $email = $data['email'];
                $type = $data['position'];
                $session_count = $data['SESSION_COUNT'];

                if($status != "Verified"){
                    echo '
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-danger" style="">
                            <div class="modal-body text-center">
                                <h5 class="text-white">Your account is not verified yet!</h5>
                            </div>
                            <div class="modal-footer">
                                <button data-bs-dismiss="modal" type="button" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                            </div>
                            </div>
                        </div>
                        </div>';
                }
                else{
                    $_SESSION['auth'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['auth_type'] = "$type"; //admin or normal user
                    $_SESSION['auth_user'] = [  
                        'userID'=>$userID,
                        'name'=>$name,
                        'user_email'=>$email,
                    ];
                    $name= $_SESSION["auth_user"]['name'];
                    $query1 = "INSERT INTO `log_monitoring`(`name`, `date`, `time_in`) VALUES ('$name','$date_today','$current_time')";
                    $query_run1 = mysqli_query($con, $query1);

                    if($query_run1){
                        
                        $new_session_count = $session_count+1;
                        $user_query = "UPDATE `user` SET `SESSION_COUNT`='$new_session_count' WHERE id='$userID'";
                        $user_query_run = mysqli_query($con, $user_query);
                        
                        $_SESSION['message'] = "Success";
                        $_SESSION['title'] = "Success";
                        $_SESSION['message2'] = "Login Successfully!";
                        if($_SESSION['auth_type'] == "Administrator"){ //admin user
                            header("Location: admin/index.php");
                            exit(0); 
                        }
                        elseif($_SESSION['auth_type'] == "Head Teacher"){ //normal user
                            header("Location: head-teacher/index.php");
                            exit(0); 
                        }
                        elseif($_SESSION['auth_type'] == "Teacher"){ //normal user
                            header("Location: teacher/index.php");
                            exit(0); 
                        }
                        elseif($_SESSION['auth_type'] == "Parent"){ //normal user
                            header("Location: parent/index.php");
                            exit(0); 
                        }
                        elseif($_SESSION['auth_type'] == "Developmental Pediatrician"){ //normal user
                            header("Location: pedia/index.php");
                            exit(0); 
                        }
                    }
                    else{
                        echo '
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-danger" style="">
                                <div class="modal-body text-center">
                                    <h5 class="text-white">Your account is not verified yet!</h5>
                                </div>
                                <div class="modal-footer">
                                    <button data-bs-dismiss="modal" type="button" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                                </div>
                                </div>
                            </div>
                            </div>';
                    }
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
                        <h5 class="text-white">Invalid email or password!</h5>
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
            
            <form action="" method="post">
                <div class="container border rounded-5 p-3 bg-white shadow box-area align-items-center">
                    <!--------------- Login Container ----------- -->
                    <div class="row ">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <img src="images/login_logo.jpg" alt="" style="width:450px;height:150px">
                            
                        </div>
                        
                    </div>
                    <div class="row text-center mt-2">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <h5 class=" mb-0 pb-0">BIÑAN CITY DEVELOPMENT CENTER</h5>
                        </div>
                    </div>
                    <div class="row text-center mt-0 pt-0">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <p class="fst-italic">Nurturing Childen, Empowering Families</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="line-with-dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <h2>Login</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8">
                            <label class="form-label fw-light">Username</label>
                            <input type="text" name="username" class="form-control border border-dark" placeholder="Enter your username" value="<?= $username; ?>" required>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8">
                            <label class="form-label fw-light">Password</label>
                            <input type="password" name="password" class="form-control border border-dark" placeholder="Enter your password" value="<?= $password; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1" style="color:rgba(131, 131, 131)">Remember Me</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-2"></div>
                        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8 col-8 text-center">
                        <a href="signup.php" class="btn border border-dark" style="background-color:rgba(163, 163, 163);">Sign Up</a>
                        <button type="submit" name="login" class="btn text-white" style="background-color:rgba(4, 3, 70);">Login </button>
                        </div>
                    </div>
                    <div class="row mt-3 text-center mb-3">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <a href="forgotpass.php" class="link-underline-light">I forgot my password</a>
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
