<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="learner";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
function get_size($size){
  $kb_size = $size / 1024;
  $formal_size = number_format($kb_size,2);
  return $formal_size;
}
?>
<style>
  .body{
    background-color: rgba(190, 190, 190);
  }
</style>
<div class="container mw-100 p-3 m-0" style="width:100%;height:100vh;background-color: rgba(190, 190, 190);">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <?php
        
        $fname = null;
        $lname = null;
        $date_of_birth = null;
        $age = null;
        $gender = null;
        $address = null;
        $registration_no = null;
        $date_enrolled = null;
        $diagnosis = null;
        $mother_name = null;
        $mother_occ = null;
        $mother_contact = null;
        $mother_email = null;
        $father_name = null;
        $father_occ = null;
        $father_contact = null;
        $father_email = null;
        $guardian_name = null;
        $guardian_relationship = null;
        $guardian_email = null;
        $guardian_contact = null;
        $parent_address = null;
        if(isset($_POST['add_student'])){
          
          $error="false";
          $fname = mysqli_real_escape_string($con, $_POST['fname']);
          $lname = mysqli_real_escape_string($con, $_POST['lname']);
          $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
          $age = mysqli_real_escape_string($con, $_POST['age']);
          $gender = mysqli_real_escape_string($con, $_POST['gender']);
          $address = mysqli_real_escape_string($con, $_POST['address']);
          $registration_no = mysqli_real_escape_string($con, $_POST['registration_no']);
          $date_enrolled = mysqli_real_escape_string($con, $_POST['date_enrolled']);
          $diagnosis = mysqli_real_escape_string($con, $_POST['diagnosis']);
          $mother_name = mysqli_real_escape_string($con, $_POST['mother_name']);
          $mother_occ = mysqli_real_escape_string($con, $_POST['mother_occ']);
          $mother_contact = mysqli_real_escape_string($con, $_POST['mother_contact']);
          $mother_email = mysqli_real_escape_string($con, $_POST['mother_email']);
          $father_name = mysqli_real_escape_string($con, $_POST['father_name']);
          $father_occ = mysqli_real_escape_string($con, $_POST['father_occ']);
          $father_contact = mysqli_real_escape_string($con, $_POST['father_contact']);
          $father_email = mysqli_real_escape_string($con, $_POST['father_email']);
          $guardian_name = mysqli_real_escape_string($con, $_POST['guardian_name']);
          $guardian_relationship = mysqli_real_escape_string($con, $_POST['guardian_relationship']);
          $guardian_contact = mysqli_real_escape_string($con, $_POST['guardian_contact']);
          $guardian_email = mysqli_real_escape_string($con, $_POST['guardian_email']);
          $parent_address = mysqli_real_escape_string($con, $_POST['parent_address']);

          $name = $fname . " " . $lname;
          
          $file_size =  get_size($_FILES['student_photo']['size']);
          $file_extension = pathinfo($_FILES['student_photo']['name'], PATHINFO_EXTENSION);
          $file_name = $_FILES['student_photo']['name'];
          $allowed_extension = ['png','jpeg', 'jpg'];
          $file_path = 'images';
          $file_temp = $_FILES['student_photo']['tmp_name'];
          if (!in_array(strtolower($file_extension), $allowed_extension)) {
            // ERROR
              echo '
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger" style="">
                    <div class="modal-body text-center">
                      <h5 class="text-white">File is not image!</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
                    </div>
                  </div>
                </div>
              </div>';
            
              $error="true";
          }
          else if($file_temp == ""){
            // ERROR
              echo '
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger" style="">
                    <div class="modal-body text-center">
                      <h5 class="text-white">Something Went Wrong!</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
                    </div>
                  </div>
                </div>
              </div>';
              
              $error="true";
          }
          else{
            if(!file_exists($file_path)){
              mkdir($file_path, 0777, true);
            }
            
            $newprofilepath= $file_path . "/" . $file_name;
    
            if(move_uploaded_file($file_temp, $newprofilepath)){

              $query = "INSERT INTO `learner`(`name`, `fname`, `lname`, `date_enrolled`, `date_of_birth`, `age`, `gender`, `address`, `diagnosis`,`registration_no`, `guardian_name`, `guardian_contact`, `photo_name`, `photo_location`, `mother_name`, `mother_occ`, `mother_contact`, `mother_email`, `father_name`, `father_occ`, `father_contact`, `father_email`, `guardian_relationship`, `guardian_email`, `parent_address`) VALUES ('$name','$fname','$lname','$date_enrolled','$date_of_birth','$age','$gender','$address','$diagnosis','$registration_no','$guardian_name,','$guardian_contact','$file_name','$newprofilepath','$mother_name','$mother_occ','$mother_contact','$mother_email','$father_name','$father_occ','$father_contact','$father_email','$guardian_relationship','$guardian_email','$parent_address')";
              $query_run = mysqli_query($con, $query);
              if($query_run){
                  echo '
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" style="background-color:rgba(56, 174, 89);">
                        <div class="modal-body text-center">
                          <h5 class="text-white">Learner Added Successfully!</h5>
                        </div>
                        <div class="modal-footer">
                          <a href="learner.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
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
                        <a href="learner-add.php" class="btn btn-danger text-white border border-white" >Done</a>
                      </div>
                    </div>
                  </div>
                </div>';
              }



            }
            else{
                $_SESSION['message'] = "Something Went Wrong!";
                $error="true";
            }
          }
        }
      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="container card b mw-100 m-0" style="width:99%;">
          <div class="row bg-primary pt-2">
            <div class="col-md-6 text-white">
              <h2>Learner List</h2>
            </div>
            <div class="col-md-6 text-end pt-1">
              <a href="learner.php" class="text-white">Back</a>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h5 class="text-danger mb-0">Learner Details</h5>
              <hr class="hr m-0">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">First Name</label>
              <input type="text" name="fname" class="form-control black-border" value="<?= $fname; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Last Name</label>
              <input type="text" name="lname" class="form-control black-border" value="<?= $lname; ?>" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Date of Birth</label>
              <input type="date" name="date_of_birth" class="form-control black-border" value="<?= $date_of_birth; ?>" required>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-light">Address</label>
              <input type="text" name="address" class="form-control black-border" value="<?= $address; ?>" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">Registration No.</label>
              <input type="text" name="registration_no" class="form-control black-border" value="<?= $registration_no; ?>" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Date Enrolled</label>
              <input type="date" name="date_enrolled" class="form-control black-border" value="<?= $date_enrolled; ?>" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Diagnosis</label>
                <select class="form-select" name="diagnosis" aria-label="example" required>
                  <option selected hidden><?= $diagnosis; ?></option>
                  <option value="autism">Autism Spectrum Disorder (ASD)</option>
                  <option value="down_syndrome">Down Syndrome</option>
                  <option value="comm_disorder">Communication Disorder</option>
                  <option value="development">Development and Behavioral Disorder</option>
                  <option value="others">(Others --- for another option)</option>
                </select>
            </div>
            <div class="col-md-1">
                <label class="form-label fw-light">Age</label>
                <input type="number" name="age" class="form-control black-border" value="<?= $age; ?>" required>
              </div>
              <div class="col-md-2">
                <label class="form-label fw-light">Sex</label>
                  <select class="form-select" name="gender" aria-label="example" required>
                    <option selected hidden><?= $gender; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <label class="form-label fw-light">Learner Photo</label>
              <input type="file" name="student_photo" class="form-control black-border" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <hr class="hr m-0">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h5 class="text-danger mb-0">Parent Information</h5>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">Mother's Name</label>
              <input type="text" name="mother_name" class="form-control black-border" value="<?= $mother_name; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Occupation</label>
              <input type="text" name="mother_occ" class="form-control black-border" value="<?= $mother_occ; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Contact No.</label>
              <input type="text" name="mother_contact" class="form-control black-border" value="<?= $mother_contact; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Email</label>
              <input type="email" name="mother_email" class="form-control black-border" value="<?= $mother_email; ?>" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">Father's Name</label>
              <input type="text" name="father_name" class="form-control black-border" value="<?= $father_name; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Occupation</label>
              <input type="text" name="father_occ" class="form-control black-border" value="<?= $father_occ; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Contact No.</label>
              <input type="text" name="father_contact" class="form-control black-border" value="<?= $father_occ; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Email</label>
              <input type="email" name="father_email" class="form-control black-border" value="<?= $father_email; ?>" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">Guardian's Name</label>
              <input type="text" name="guardian_name" class="form-control black-border" value="<?= $guardian_name; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Relationship</label>
              <input type="text" name="guardian_relationship" class="form-control black-border" value="<?= $guardian_relationship; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Contact No.</label>
              <input type="text" name="guardian_contact" class="form-control black-border" value="<?= $guardian_contact; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Email</label>
              <input type="email" name="guardian_email" class="form-control black-border" value="<?= $guardian_email; ?>" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-5">
              <label class="form-label fw-light">Address</label>
              <input type="text" name="parent_address" class="form-control black-border" value="<?= $parent_address; ?>" required>
            </div>
          </div>
          <div class="row mt-2 pb-2">
            <div class="col-md-12">
              <button type="submit" name="add_student" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Submit</button>
            </div>
          </div>
        </div>
      </form>
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
  include('../admin/includes/footer.php');
?>
