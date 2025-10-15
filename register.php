<?php
    $currentPage = "login";
    session_start();

    include('admin/config/dbcon.php');
    include('admin/includes/header.php'); 
    include('admin/includes/navbar.php'); 
    
    $username=null;
    $password=null;

    
    if(isset($_POST['register'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
        $sex = mysqli_real_escape_string($con, $_POST['sex']);
        $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
        $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        
        if($middlename == null){
            $name = $firstname. ' ' .$lastname;
        }
        else{
            $name = $firstname. ' ' .$middlename. ' '.$lastname;
        }
        // CHECK EMAIL
        $checkemail = "SELECT email FROM inquirer WHERE email='$email'";
        $checkemail_run = mysqli_query($con,$checkemail);
        if(mysqli_num_rows($checkemail_run) > 0 ){
            //ALREADY EMAIL EXISTS
                    echo '
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger" style="">
                          <div class="modal-body text-center">
                            <h5 class="text-white">Email already exist!</h5>
                          </div>
                          <div class="modal-footer">
                            <a href="register.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                          </div>
                        </div>
                      </div>
                    </div>';
        }
        else{
            // CHECK USERNAME
            $query_username = "SELECT username FROM inquirer WHERE username='$username'";
            $query_username_run = mysqli_query($con,$query_username);
            if(mysqli_num_rows($query_username_run) > 0 ){
                //ALREADY USERNAME EXISTS
                    echo '
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger" style="">
                          <div class="modal-body text-center">
                            <h5 class="text-white">Username already exist!</h5>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                          </div>
                        </div>
                      </div>
                    </div>';
            }
            else{
                $user_query = "INSERT INTO `inquirer`(`NAME`, `USERNAME`, fname, mname, lname,`PASSWORD`, `EMAIL`,address,contact_no,gender, date_of_birth) VALUES ('$name','$username','$firstname','$middlename','$lastname','$password','$email','$address','$contact_no','$sex', '$date_of_birth')";
                $user_query_run = mysqli_query($con, $user_query);
                
                if($user_query_run){
                    echo '
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background-color:rgba(56, 174, 89);">
                              <div class="modal-body text-center">
                                <h5 class="text-white">Registered Successfully!</h5>
                              </div>
                              <div class="modal-footer">
                                <a href="login.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
                else{
                    echo '
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content bg-danger" style="">
                              <div class="modal-body text-center">
                                <h5 class="text-white">Something Went Wrong!</h5>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</button>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
            }    
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
                            <h2>Registration Form</h2>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Full Name</label>
                            <input type="text" name="lastname" class="form-control border border-dark" placeholder="Last Name" required>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light text-white">_</label>
                            <input type="text" name="firstname" class="form-control border border-dark" placeholder="First Name" required>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light text-white">_</label>
                            <input type="text" name="middlename" class="form-control border border-dark" placeholder="Middle Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Sex</label>
                            <select class="form-select border border-dark" name="sex" aria-label="example" required>
                            <option selected hidden></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control border border-dark" required>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Contact No.</label>
                            <input type="text" name="contact_no" class="form-control border border-dark" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Email</label>
                            <input type="email" name="email" class="form-control border border-dark" required>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Address</label>
                            <input type="text" name="address" class="form-control border border-dark" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Username</label>
                            <input type="text" name="username" placeholder="Enter your preffered username" class="form-control border border-dark" required>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label fw-light">Password</label>
                            <input type="password" name="password" placeholder="Enter your preffered password" class="form-control border border-dark" required>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12"></div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12 text-center">
                            <button type="submit" name="register" class="w-100 btn text-white" style="background-color:rgba(4, 3, 70);">Register</button>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12 text-center">
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
<?php
    include('includes/footer.php'); 
?>