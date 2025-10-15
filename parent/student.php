<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="student";
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
<div class="container mw-100 p-3 m-0" style="width:100%;height:100%;background-color: rgba(190, 190, 190);">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h1>Learner List</h1>
            <?php
              if(isset($_POST['update_learner'])){
                $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
                $teacher_incharge = mysqli_real_escape_string($con, $_POST['teacher_incharge']);
                $fname = mysqli_real_escape_string($con, $_POST['fname']);
                $lname = mysqli_real_escape_string($con, $_POST['lname']);
                $age = mysqli_real_escape_string($con, $_POST['age']);
                $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
                $sex = mysqli_real_escape_string($con, $_POST['sex']);
                $diagnosis = mysqli_real_escape_string($con, $_POST['diagnosis']);
                $address = mysqli_real_escape_string($con, $_POST['address']);
                $registration_no = mysqli_real_escape_string($con, $_POST['registration_no']);
                $registration_date = mysqli_real_escape_string($con, $_POST['registration_date']);
                $guardian_name = mysqli_real_escape_string($con, $_POST['guardian_name']);
                $guardian_relationship = mysqli_real_escape_string($con, $_POST['guardian_relationship']);
                $guardian_contact = mysqli_real_escape_string($con, $_POST['guardian_contact']);
                $guardian_email = mysqli_real_escape_string($con, $_POST['guardian_email']);
                $parent_address = mysqli_real_escape_string($con, $_POST['parent_address']);
                $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
                $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
                $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
              
                $name = $fname . " " . $lname;
                
                $file_size =  get_size($_FILES['learner_photo']['size']);
                $file_extension = pathinfo($_FILES['learner_photo']['name'], PATHINFO_EXTENSION);
                $file_name = $_FILES['learner_photo']['name'];
                $allowed_extension = ['png','jpeg', 'jpg','webp'];
                $file_path = 'images';
                $file_temp = $_FILES['learner_photo']['tmp_name'];
              
                // idagdag ang photo_location
                $query_update_learner = "UPDATE dev.`student` SET `fname`='$fname',`lname`='$lname',`name`='$name',`age`='$age',`address`='$address',`diagnosis`='$diagnosis',`registration_date`='$registration_date',`teacher_incharge`='$teacher_incharge',`sex`='$sex',`date_of_birth`='$date_of_birth',`registration_no`='$registration_no',`photo_name`='$file_name' WHERE studentID='$learnerID'";
                $query_update_learner_run = mysqli_query($con, $query_update_learner);
              
                
                $query_update_parent = "UPDATE dev.`parent` SET `guardian_name`='$guardian_name',`guardian_relationship`='$guardian_relationship',`guardian_contact`='$guardian_contact',`guardian_email`='$guardian_email',`parent_address`='$parent_address' WHERE studentID='$learnerID'";
                $query_update_parent_run = mysqli_query($con, $query_update_parent);
              
                if($query_update_learner_run && $query_update_parent){
                    echo '
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background-color:rgba(56, 174, 89);">
                              <div class="modal-body text-center">
                                <h5 class="text-white">Updated Successfully!</h5>
                              </div>
                              <div class="modal-footer">
                                <a href="student.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
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
                                <a href="student.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
              }
            ?>
          </div>
          <div class="col-md-6 text-end">
            <a href="student-add.php" class="btn btn-primary">Add Learner</a>
            <button class="btn btn-primary">Import Data</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr class="hr fw-bold">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <table id="example" class="table table-striped border" style="width:100%;font-size:12px;">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Learner No.</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Diagnosis</th>
                    <th class="text-center">Date Enrolled</th>
                    <th class="text-center">Teacher In-charge</th>
                    <th class="text-center">Remarks</th>
                    <th class="text-center" style="width:120px;">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $count=1;
                $query = "SELECT * FROM `student` a join parent b on b.studentID=a.studentID WHERE archive='0'";
                $query_run = mysqli_query($con,$query);
                if($query_run){
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                ?>
                      <tr>
                          <td class="text-center"><?= $count++; ?></td>
                          <td class="text-center"><?= $row['student_no']; ?></td>
                          <td class="text-center"><?= $row['fname']; ?></td>
                          <td class="text-center"><?= $row['lname']; ?></td>
                          <td class="text-center"><?= $row['age']; ?></td>
                          <td class="text-center"><?= $row['address']; ?></td>
                          <td class="text-center"><?= $row['diagnosis']; ?></td>
                          <td class="text-center"><?= $row['enrolled_date']; ?></td>
                          <td class="text-center"><?= $row['teacher_incharge']; ?></td>
                          <td class="text-center"><button class="btn btn-success p-2 pt-1 pb-1">View</button></td>
                          <td class="text-center p-0 pt-1" style="width:120px;">
                            <button class="btn btn-success p-1 ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#viewstudent<?= $row['studentID']; ?>"><i class="fa-solid fa-eye"></i></button>
                            <button class="btn btn-primary p-1 ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#editstudent<?= $row['studentID']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-danger p-1 ps-2 pe-2"><i class="fa-solid fa-trash"></i></button>
                            <!-- VIEW REGISTRATION DETAIL VIEWSTUDENT -->
                      <div class="modal fade viewclassname1" id="viewstudent<?= $row['studentID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="width:695px;">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addstudentlabel">Student Details</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="container">
                                <div class="row">
                                  <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
                                    <nav class="navbar navbar-expand-lg navbar-light pb-0">
                                        <div class="container-fluid ps-0 ms-0">
                                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                          </button>
                                          <div class="collapse navbar-collapse" id="navbarScroll">
                                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                              <li class="nav-item">
                                                <button class="me-1 nav-link active active-btn">Registration Details</button>
                                              </li>
                                              <li class="nav-item">
                                                <button type="button" class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#viewstudent1<?= $row['studentID']; ?>" onclick="viewshowParent<?= $row['studentID']; ?>()">Parent Information</button>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </nav>
                                  </div>
                                </div>
                                <div class="row card">
                                  <div class="container pt-2">
                                    <div class="row">
                                      <!-- LEFT HALF -->
                                      <div class="col-md-3 p-0 ps-1">
                                        <div class="container-fluid p-0">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <img src="../images/admin.jpg" alt="" style="height:135px;width: 160px;">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- RIGHT HALF -->
                                      <div class="col-md-9 text-start">
                                        <div class="container-fluid">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">NAME:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['name']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">AGE:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['age']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">DATE OF BIRTH:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['date_of_birth']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">SEX:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['sex']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">ADDRESS:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['address']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">DIAGNOSIS:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['diagnosis']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">TEACHER IN-CHARGE:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['teacher_incharge']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <hr class="hr mb-1">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">DATE ENROLLED:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['enrolled_date']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">REGISTRATION NO.:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['registration_no']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row mb-2">
                                            <div class="col-md-12 text-end">
                                              <a href="#" class="btn btn-primary">Learner Document Records</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- VIEW PARENT INFORMATION VIEWSTUDENT -->
                      <div class="modal fade viewclassname2" id="viewstudent1<?= $row['studentID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="width:695px;">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addstudentlabel">Learner Details</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="container">
                                <div class="row">
                                  <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
                                    <nav class="navbar navbar-expand-lg navbar-light pb-0">
                                        <div class="container-fluid ps-0 ms-0">
                                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                          </button>
                                          <div class="collapse navbar-collapse" id="navbarScroll">
                                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                            <li class="nav-item">
                                                <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#viewstudent<?= $row['studentID']; ?>" onclick="viewshowRegistration<?= $row['studentID']; ?>()">Registration Details</button>
                                              </li>
                                              <li class="nav-item">
                                                <button type="button" class="me-1 nav-link active active-btn ">Parent Information</button>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </nav>
                                  </div>
                                </div>
                                <div class="row card">
                                  <div class="container pt-2">
                                    <div class="row">
                                      <!-- LEFT HALF -->
                                      <div class="col-md-3 p-0 ps-1">
                                        <div class="container-fluid p-0">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <img src="../images/admin.jpg" alt="" style="height:135px;width: 160px;">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- RIGHT HALF -->
                                      <div class="col-md-9">
                                        <div class="container-fluid text-start">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">GUARDIAN'S NAME:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['guardian_name']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">RELATIONSHIP:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['guardian_relationship']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">CONTACT NUMBER:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['guardian_contact']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <label class="form-label fw-bold">EMAIL:</label>
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['guardian_email']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                              <label for=""><?= $row['parent_address']; ?></label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <hr class="hr mb-1">
                                            </div>
                                          </div>
                                          <div class="row pb-5 mb-5">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- EDIT STUDENT  -->
                      <!-- REGISTRATION DETAIL -->
                      <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="learnerID" value="<?= $row['studentID']; ?>">
                        <div class="modal fade classname1" id="editstudent<?= $row['studentID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="width:695px;">
                              <div class="modal-header">
                                <h5 class="modal-title" id="addstudentlabel">Learner Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
                                      <nav class="navbar navbar-expand-lg navbar-light pb-0">
                                          <div class="container-fluid ps-0 ms-0">
                                            <button type="button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                              <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarScroll">
                                              <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                                <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link active active-btn">Registration Details</button>
                                                </li>
                                                <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#editstudent2<?= $row['studentID']; ?>" onclick="showParent()">Parent Information</button>
                                                </li>
                                                <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link not-active-btn" data-bs-toggle="modal" data-bs-target="#editstudent3<?= $row['studentID']; ?>" onclick="showUpdated()">Updated Image</button>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </nav>
                                    </div>
                                  </div>
                                  <div class="row card">
                                    <div class="container pt-2">
                                      <div class="row">
                                        <!-- LEFT HALF -->
                                        <div class="col-md-3 p-0 ps-1">
                                          <div class="container-fluid p-0">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <img src="../<?= $row['photo_location']; ?>" alt="" style="height:135px;width: 160px;">
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <label class="form-label fw-light">Teacher In-charge:</label>
                                                <input type="text" name="teacher_incharge" value="<?= $row['teacher_incharge']; ?>" class="form-control black-border" required>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- RIGHT HALF -->
                                        <div class="col-md-9">
                                          <div class="container-fluid">
                                            <div class="row">
                                              <div class="col-md-6">
                                                <label class="form-label fw-light">First Name</label>
                                                <input type="text" name="fname" value="<?= $row['fname']; ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-6">
                                                <label class="form-label fw-light">Last Name</label>
                                                <input type="text" name="lname" value="<?= $row['lname']; ?>" class="form-control black-border" required>
                                              </div>
                                            </div>
                                            <div class="row mt-1">
                                              <div class="col-md-3">
                                                <label class="form-label fw-light">Sex</label>
                                                <select class="form-select form-select-sm" name="sex" aria-label=".form-select-sm example" required>
                                                  <option selected hidden><?= $row['sex']; ?></option>
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                                </select>
                                              </div>
                                              <div class="col-md-5">
                                                <label class="form-label fw-light">Diagnosis</label>
                                                <select class="form-select form-select-sm" name="diagnosis" aria-label=".form-select-sm example" required>
                                                  <option selected hidden><?= $row['diagnosis']; ?></option>
                                                  <option value="diagnosis_1">Diagnosis 1</option>
                                                  <option value="diagnosis_2">Diagnosis 2</option>
                                                </select>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="form-label fw-light">Date of Birth</label>
                                                <input type="date" name="date_of_birth" value="<?= $row['date_of_birth']; ?>" class="form-control black-border" required>
                                              </div>
                                            </div>
                                            <div class="row mt-1">
                                              <div class="col-md-8">
                                                <label class="form-label fw-light">Address</label>
                                                <input type="text" name="address" value="<?= $row['address']; ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-3">
                                                <label class="form-label fw-light">Age</label>
                                                <input type="number" name="age" value="<?= $row['age']; ?>" class="form-control black-border" required>
                                              </div>
                                            </div>
                                            <div class="row mt-1 mb-2">
                                              <div class="col-md-7">
                                                <label class="form-label fw-light">Registration No.</label>
                                                <input type="text" name="registration_no" value="<?= $row['registration_no']; ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="form-label fw-light">Date Enrolled</label>
                                                <input type="date" name="enrolled_date" value="<?= $row['enrolled_date']; ?>" class="form-control black-border" required>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="update_learner" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- PARENT INFORMATION -->
                        <div class="modal fade classname2" id="editstudent2<?= $row['studentID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="width:695px;">
                              <div class="modal-header">
                                <h5 class="modal-title" id="addstudentlabel">Learner Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
                                      <nav class="navbar navbar-expand-lg navbar-light pb-0">
                                          <div class="container-fluid ps-0 ms-0">
                                            <button type="button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                              <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarScroll">
                                              <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                              <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#editstudent<?= $row['studentID']; ?>" onclick="showRegistration<?= $row['studentID']; ?>()">Registration Details</button>
                                                </li>
                                                <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link active active-btn ">Parent Information</button>
                                                </li>
                                                <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link not-active-btn" data-bs-toggle="modal" data-bs-target="#editstudent3<?= $row['studentID']; ?>" onclick="showUpdated<?= $row['studentID']; ?>()">Updated Image</button>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </nav>
                                    </div>
                                  </div>
                                  <div class="row card">
                                    <div class="container pt-2">
                                      <div class="row">
                                        <!-- LEFT HALF -->
                                        <div class="col-md-3 p-0 ps-1">
                                          <div class="container-fluid p-0">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <img src="../<?= $row['photo_location']; ?>" alt="" style="height:135px;width: 160px;">
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <label class="form-label fw-light">Teacher In-charge:</label>
                                                <input type="text" value="<?= $row['teacher_incharge']; ?>" class="form-control black-border" readonly>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- RIGHT HALF -->
                                        <div class="col-md-9">
                                          <div class="container-fluid">
                                            <div class="row">
                                              <div class="col-md-6">
                                                <label class="form-label fw-light">Guardian Name</label>
                                                <input type="text" name="guardian_name" value="<?= $row['guardian_name'] ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="form-label fw-light">Relationship</label>
                                                <input type="text" name="guardian_relationship" value="<?= $row['guardian_relationship'] ?>" class="form-control black-border" required>
                                              </div>
                                            </div>
                                            <div class="row mt-1">
                                              <div class="col-md-6">
                                                <label class="form-label fw-light">Contact Number</label>
                                                <input type="text" name="guardian_contact" value="<?= $row['guardian_contact']; ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-6">
                                                <label class="form-label fw-light">Email</label>
                                                <input type="email" name="guardian_email" value="<?= $row['guardian_email'] ?>" class="form-control black-border" required>
                                              </div>
                                            </div>
                                            <div class="row mt-1 mb-2">
                                              <div class="col-md-8">
                                                <label class="form-label fw-light">Address</label>
                                                <input type="text" name="parent_address" value="<?= $row['parent_address'] ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-4">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                              <button type="submit" name="update_learner" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- UPDATED IMAGE -->
                        <div class="modal fade classname3" id="editstudent3<?= $row['studentID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="width:695px;">
                              <div class="modal-header">
                                <h5 class="modal-title" id="addstudentlabel">Learner Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
                                      <nav class="navbar navbar-expand-lg navbar-light pb-0">
                                          <div class="container-fluid ps-0 ms-0">
                                            <button type="button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                              <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarScroll">
                                              <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                              <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#editstudent<?= $row['studentID']; ?>" onclick="showRegistration()">Registration Details</button>
                                                </li>
                                                <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#editstudent2<?= $row['studentID']; ?>" onclick="showParent()">Parent Information</button>
                                                </li>
                                                <li class="nav-item">
                                                  <button type="button" class="me-1 nav-link active active-btn">Updated Image</button>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </nav>
                                    </div>
                                  </div>
                                  <div class="row card">
                                    <div class="container pt-2">
                                      <div class="row">
                                        <!-- LEFT HALF -->
                                        <div class="col-md-3 p-0 ps-1">
                                          <div class="container-fluid p-0">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <img src="../<?= $row['photo_location']; ?>" alt="" style="height:135px;width: 160px;">
                                              </div>
                                            </div>
                                            <div class="row mb-2">
                                              <div class="col-md-12">
                                                <label class="form-label fw-light">Teacher In-charge:</label>
                                                <input type="text" value="<?= $row['teacher_incharge'] ?>" class="form-control black-border" readonly>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- RIGHT HALF -->
                                        <div class="col-md-9">
                                          <div class="container-fluid">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <label for="" class="fw-bold">Upload Image</label>
                                                <input type="file" name="learner_photo" class="form-control">
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <hr class="hr">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                              <button type="submit" name="update_learner" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <script>
                        //VIEW STUDENT FUNCTION
                        function viewshowRegistration<?= $row['studentID']; ?>() {
                          // Select all elements with the class 'classname1' and show them
                          var elementToShow = document.getElementById('viewstudent<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'block'; // Hide element
                          }
                          var elementsToHide = document.getElementById('viewstudent1<?= $row['StudentID']; ?>');
                          if (elementsToHide) {
                            elementsToHide.style.display = 'none'; // Hide element
                          }
                        }
                        function viewshowParent<?= $row['studentID']; ?>() {
                          // Select all elements with the class 'classname1' and show them
                          var elementToShow = document.getElementById('viewstudent<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'none'; // Hide element
                          }

                          var elementsToHide = document.getElementById('viewstudent1<?= $row['StudentID']; ?>');
                          if (elementsToHide) {
                            elementsToHide.style.display = 'block'; // Hide element
                          }
                        }

                        //EDIT STUDENT FUNCTION
                        function showRegistration<?= $row['studentID']; ?>() {
                          // Select all elements with the class 'classname1' and show them
                          
                          var elementToShow = document.getElementById('editstudent<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'block'; // Hide element
                          }
                          var elementToShow = document.getElementById('editstudent2<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'none'; // Hide element
                          }
                          var elementToShow = document.getElementById('editstudent3<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'none'; // Hide element
                          }
                        }
                        function showParent<?= $row['studentID']; ?>() {
                          // Select all elements with the class 'classname1' and show them
                          
                          var elementToShow = document.getElementById('editstudent<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'none'; // Hide element
                          }
                          var elementToShow = document.getElementById('editstudent2<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'block'; // Hide element
                          }
                          var elementToShow = document.getElementById('editstudent3<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'none'; // Hide element
                          }
                        }
                        function showUpdated<?= $row['studentID']; ?>() {
                          // Select all elements with the class 'classname1' and show them
                          
                          var elementToShow = document.getElementById('editstudent<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'none'; // Hide element
                          }
                          var elementToShow = document.getElementById('editstudent2<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'none'; // Hide element
                          }
                          var elementToShow = document.getElementById('editstudent3<?= $row['StudentID']; ?>');
                          if (elementToShow) {
                              elementToShow.style.display = 'block'; // Hide element
                          }
                        }
                      </script>
                          </td>
                      </tr>
                      
                <?php
                    }
                  }
                }
              ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.active-btn {
  background-color: rgba(63, 147, 245, 1);
  color: white; /* Text color for contrast */
  border: none; /* Remove default border */
  padding: 10px 20px; /* Add padding for better appearance */
  border-radius: 5px; /* Rounded corners */
  font-size: 16px; /* Font size */
  font-weight: bold; /* Bold text */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow for 3D effect */
  transition: all 0.3s ease; /* Smooth transition for hover effects */
}

.active-btn:hover {
  background-color: rgba(63, 147, 245, 0.9); /* Slightly lighter color on hover */
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3), 0 3px 6px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
  transform: translateY(-2px); /* Slight lift effect on hover */
}

.active-btn:active {
  background-color: rgba(63, 147, 245, 0.8); /* Darker color when button is pressed */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 1px 2px rgba(0, 0, 0, 0.1); /* Reduced shadow when pressed */
  transform: translateY(0); /* Reset lift effect when button is pressed */
}

.not-active-btn {
  background-color: rgba(239, 237, 237, 1);
  color: black; /* Text color for contrast */
  border: none; /* Remove default border */
  padding: 10px 20px; /* Add padding for better appearance */
  border-radius: 5px; /* Rounded corners */
  font-size: 16px; /* Font size */
  font-weight: bold; /* Bold text */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow for 3D effect */
  transition: all 0.3s ease; /* Smooth transition for hover effects */
}
.not-active-btn:hover {
  background-color: rgba(239, 237, 237, 0.9); /* Slightly lighter color on hover */
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3), 0 3px 6px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
  transform: translateY(-2px); /* Slight lift effect on hover */
}
</style>


<script>
  new DataTable('#example');
</script>
<script>
    // PARA LUMABAS AGAD YUNG MODAL
    //document.addEventListener('DOMContentLoaded', function () {
    //  var myModal = new bootstrap.Modal(document.getElementById('addstudent'));
    //  myModal.show();
    //});

  </script>
  
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
