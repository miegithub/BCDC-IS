<?php
    $currentPage = "login";
    session_start();

    include('admin/config/dbcon.php');
    include('admin/includes/header.php'); 
    include('admin/includes/navbar.php'); 
    
    $username=null;
    $password=null;

    
if(isset($_POST['create_account'])){
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    // $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
  

    $name = $firstname. " ". $lastname ;

    $query = "INSERT INTO `user`(`NAME`, `fname`, `lname`, `address`, `contact_no`, `gender`, `date_of_birth`, `EMAIL`, `USERNAME`, `PASSWORD`, `STATUS`, position, TYPE) VALUES ('$name','$firstname','$lastname','$address','$contact_no','$sex','$date_of_birth','$email','$username','$password','Verified', '$position', 'Parent')";
    $query_run = mysqli_query($con,$query);

    
    if($query_run){
        echo '
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="background-color:rgba(56, 174, 89);">
                  <div class="modal-body text-center">
                    <h5 class="text-white">Signed-up Successfully!</h5>
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
                    <a href="signup.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                  </div>
                </div>
              </div>
            </div>';
    }
    
}
?>
<style>
    .login_logo{
        width:450px;height:150px;
        
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
             <!-- ------------- Main Container ----------- style="padding-top:57px;" -->
<div class="container d-flex justify-content-center align-items-center  min-vh-100" >
    <!-- <div class="row"></div>
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12"> -->
            
            <form action="" method="post">
                <div class="container border rounded-5 p-3 bg-white shadow box-area align-items-center">
                    <!--------------- signup Container ----------- -->
                    <div class="row">
                        
                    <div class="col-md-12">
                    <div class="row">

                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                            <img src="images/login_logo.JPG" class="login_logo" alt="" style="">
                            
                        </div>
                        
                    </div>
                    <div class="row text-center mt-2">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 ">
                            <h5 class=" mb-0 pb-0 text_nut">BIÑAN CITY DEVELOPMENT CENTER</h5>
                        </div>
                    </div>
                    <div class="row text-center mt-0 pt-0">
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <p class="fst-italic text_nut1">Nurturing Childen, Empowering Families</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <div class="line-with-dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="my-1">
                            <h2>Sign Up</h2>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-6 col-6">
                            
                        <div class="">
                        <input type="text" name="firstname" class="form-control border border-dark " placeholder="First Name" required>
                        </div>
                        <div class="mt-2">
                        <input type="text" name="lastname" class="form-control border border-dark " placeholder="Last Name" required>
                        </div>
                        <div class="mt-2">
                        <select class="form-select border border-dark" name="sex" aria-label="Sex" required>
                            <option selected hidden style="color:gray;">Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div>
                        <div class="mt-2">
                        <input type="text" class="form-control border border-dark" name="date_of_birth" placeholder="Date of Birth"
                            onfocus="(this.type='date')" 
                            onblur="if(!this.value) this.type='text'" 
                            max="2011-12-31" 
                            required>
                    </div>


                    <div class="mt-2"> 
                       <input type="text" name="address" class="form-control border border-dark" placeholder="Address" required>
                    </div>




                        </div>




                        <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-6 col-6">
                            
                            <div class="">
                            
                             <input type="text" name="contact_no" class="form-control border border-dark " placeholder="Contact No." required>
                            </div>
                            <div class="mt-2">
                            <input type="email" name="email" class="form-control border border-dark" required placeholder="Email Address">
                            </div>
                            <div class="mt-2">
                            <input type="text" name="username" placeholder="Enter your username" class="form-control border border-dark " required>
                            </div>
                            <div class="mt-2">
                            <input type="password" name="password" placeholder="Enter your password" class="form-control border border-dark" required>
                            </div>
                            <div class="mt-2">
                            <select class="form-select border border-dark" name="position" aria-label="position" required>
                                <option selected hidden class="text-light">position</option>
                    
                                <option value="Head Teacher">Head Teacher</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Developmental Pediatrician">Developmental Pediatrician</option>
                                <option value="Parent">Parent</option>
                            </select>
                            </div>  
                            </div>
                            </div>


                        <div class="row mt-4">
                        
                        <div class="col-md-12 d-flex">
                        <a href="index.php" class="btn border border-dark w-50 me-2" style="background-color:rgba(163, 163, 163);">Sign In</a>
                        
                        <button type="submit" name="create_account" class="btn text-white w-50 ms-2" style="background-color:rgba(4, 3, 70);">Create Account</button>
                        </div>
                    </div>
                    <div class="row mx-2">
                        
                       
                    <div class="col-md-12 content-center d-flex">
                    <div class="form-check mt-2">
                        <input class="form-check-input me-2" type="checkbox" name="remember_me" id="remember_me" style="width: 20px; height: 20px;">
                        <label class="form-check-label text-wrap" for="remember_me" style="white-space: normal;">
                        I acknowledge that I have read and accept the <span class="text-primary">Terms of Use <br>Agreement</span> and consent to the <span class="text-primary">Privacy Policy.</span>
                        </label>
                    </div>
                </div>
              </div>
            </div>
                      
                   
                    <div class="row mt-3">
                        

                        <!-- <div class="">
                            <label class="form-label fw-light">Password</label>
                            <input type="password" name="password" class="form-control border border-dark" placeholder="Enter your password" value="<?= $password; ?>" required>
                        </div> -->
                    </div>




                    
                    <!-- <div class="row mt-3 text-center mb-3">
                        <div class="">
                            <a href="forgotpass.php" class="link-underline-light">I forgot my password</a>
                        </div>
                    </div> -->




                </div>
                </div>
            </form>
        </div>
      
    
    <!-- <div class="row">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">

        </div>
    </div> -->


<script>
document.addEventListener('DOMContentLoaded', function() {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  myModal.show();
});
</script>
<?php
    include('includes/footer.php'); 
?>