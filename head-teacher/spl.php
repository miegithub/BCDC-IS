<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="spl";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');


if(isset($_POST['archive_user'])){
  $ID = mysqli_real_escape_string($con, $_POST['ID']);
  $query_update_learner = "UPDATE dev.`user` SET `archive`='1' WHERE ID='$ID'";
  mysqli_query($con, $query_update_learner);
}
if(isset($_POST['update_employee'])){
  $ID = mysqli_real_escape_string($con, $_POST['ID']);
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
  $age = mysqli_real_escape_string($con, $_POST['age']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $position = mysqli_real_escape_string($con, $_POST['position']);
  $address = mysqli_real_escape_string($con, $_POST['address']);

  $file_size =  get_size($_FILES['employee_photo']['size']);
  $file_extension = pathinfo($_FILES['employee_photo']['name'], PATHINFO_EXTENSION);
  $file_name = $_FILES['employee_photo']['name'];
  $allowed_extension = ['png','jpeg', 'jpg','webp'];
  $file_path = 'images';
  $file_temp = $_FILES['employee_photo']['tmp_name'];

  $query_update_employee = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`date_of_birth`='$date_of_birth',`gender`='$gender',`age`='$age',`EMAIL`='$email',`contact_no`='$contact_no',`address`='$address',`position`='$position' WHERE ID='$ID'";
  $query_update_employee_run = mysqli_query($con, $query_update_employee);

  if($query_update_employee_run){
    echo '
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="background-color:rgba(56, 174, 89);">
              <div class="modal-body text-center">
                <h5 class="text-white">Service Partner Added Successfully!</h5>
              </div>
              <div class="modal-footer">
                <a href="spl.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
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
                <a href="#" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
              </div>
            </div>
          </div>
        </div>';
  }
}
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
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h1>Service Partner List</h1>
          </div>
          <div class="col-md-6 text-end">
            <a href="spl-add.php" class="btn btn-primary">Add Service Partner</a>
           
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr class="hr fw-bold">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <table id="example" class="table table-striped border col-md-12 col-12" style="width:100%;font-size:12px;">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact No.</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $count=1;
                $query = "SELECT * FROM `user` WHERE archive='0' and position!='parent' and position!='admin'";
                $query_run = mysqli_query($con,$query);
                if($query_run){
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if($row['STATUS_TYPE']== "Active"){
                        $text_color_green = "text-success";
                      }
              ?>
              <tr>
                  <td class="text-center"><?= $count++; ?></td>
                  <td class="text-center"><?= $row['ID']; ?></td>
                  <td class="text-center"><?= $row['fname'] ?></td>
                  <td class="text-center"><?= $row['lname'] ?></td>
                  <td class="text-center"><?= $row['EMAIL'] ?></td>
                  <td class="text-center"><?= $row['contact_no'] ?></td>
                  <td class="text-center"><?= $row['position'] ?></td>
                  <td class="text-center <?= $text_color_green; ?>"><?= $row['STATUS_TYPE'] ?></td>
                 
                  <td class="text-center p-0 pt-1">
                    <form action="" method="post">
                      <button type="button" class="btn btn-success btn-sm p-0 px-1 mt-2" data-bs-toggle="modal" data-bs-target="#view<?= $row['ID']; ?>"><i class="fa-solid fa-eye"></i></button>
                      <button type="button" class="btn btn-primary btn-sm p-0 px-1 mt-2" data-bs-toggle="modal" data-bs-target="#editservice<?= $row['ID']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                      <input type="hidden" name="ID" value="<?= $row['ID']; ?>">
                      <button type="submit" name="archive_user" class="btn btn-danger btn-sm p-0 px-1 mt-2"><i class="fa-solid fa-trash"></i></button>

                    </form>
                    
                    <!-- VIEW REGISTRATION DETAIL -->
                    <div class="modal fade" id="view<?= $row['ID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="employeelabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content" style="width:695px;">
                          <div class="modal-header">
                            <h5 class="modal-title" id="employeelabel">Employee Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
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
                                        <div class="row">
                                          <div class="col-md-12">
                                            <label class="form-label fw-bold">ACCOMODATED STUDENTS:</label>
                                            <input type="text" value="" class="form-control black-border mb-2" readonly>
                                            <input type="text" value="" class="form-control black-border mb-2" readonly>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- RIGHT HALF -->
                                    <div class="col-md-9 text-start">
                                      <div class="container-fluid">
                                        <div class="row">
                                          <div class="col-md-4">
                                            <label class="form-label fw-bold">EMPLOYEE NAME:</label>
                                          </div>
                                          <div class="col-md-8">
                                            <label for=""><?= $row['fname']. " " .$row['lname']; ?></label>
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
                                            <label for=""><?= $row['gender']; ?></label>
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
                                            <label class="form-label fw-bold">POSITION:</label>
                                          </div>
                                          <div class="col-md-8">
                                            <label for=""><?= $row['position']; ?></label>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <hr class="hr mb-1">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <label class="form-label fw-bold">CONTACT NO.:</label>
                                          </div>
                                          <div class="col-md-8">
                                            <label for=""><?= $row['contact_no']; ?></label>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <label class="form-label fw-bold">EMAIL:</label>
                                          </div>
                                          <div class="col-md-8">
                                            <label for=""><?= $row['EMAIL']; ?></label>
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
                    <div class="modal fade" id="viewLearner<?= $row['ID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="employeelabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content" style="width:695px;">
                          <div class="modal-header">
                            <h5 class="modal-title" id="employeelabel">Accomodated Learners</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table"> 
                              <thead>
                                <tr>
                                  <th class="text-center">LIST OF LEARNER</th>
                                  <th class="text-center">DIAGNOSIS</th>
                                  <th class="text-center">TIME SCHEDULE</th>
                                </tr>
                                <tbody>
                                  <?php
                                    $userID = $row['ID'];
                                    $list_learner = "SELECT * FROM learner WHERE userID='$userID'";
                                    $list_learner_run = mysqli_query($con,$list_learner);
                                    if($list_learner_run){
                                      if(mysqli_num_rows($list_learner_run) > 0){
                                        foreach($list_learner_run as $rowLearner){
                                          ?>
                                              <tr>
                                                <td><?= $rowLearner['fname']. " " .$rowLearner['lname']; ?></td>
                                                <td><?= $rowLearner['diagnosis']; ?></td>
                                                <td><?= $rowLearner['assessment_sched']; ?></td>
                                              </tr>
                                          <?php
                                        }
                                      }
                                      else{
                                        ?>
                                          <tr>
                                            <td colspan="3">NO RECORD FOUND</td>
                                          </tr>
                                        <?php
                                      }
                                    }
                                  ?>
                                </tbody>
                              </thead>

                            </table>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- EDIT MODULE -->
                    <form action="" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="ID" value="<?= $row['ID']; ?>">
                      <!-- REGISTRATION DETAIL -->
                      <div class="modal fade classname1" id="editservice<?= $row['ID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="width:695px;">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addstudentlabel">Employee Details</h5>
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
                                                <button type="button" class="me-1 nav-link active active-btn">Personal Details</button>
                                              </li>
                                              <li class="nav-item">
                                                <button type="button" class="me-1 nav-link not-active-btn" data-bs-toggle="modal" data-bs-target="#editservice3<?= $row['ID']; ?>" onclick="showUpdated<?= $row['ID']; ?>()">Updated Image</button>
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
                                              <img src="../images/admin.jpg" alt="" style="height:135px;">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label class="form-label fw-light">Accomodated Student:</label>
                                              <input type="text" name="accomodated_student" class="form-control black-border mb-2">
                                              <input type="text" name="accomodated_student1" class="form-control black-border mb-2">
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
                                          <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label fw-light">Date of Birth</label>
                                                <input type="date" name="date_of_birth" value="<?= $row['date_of_birth']; ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-3">
                                                <label class="form-label fw-light">Age</label>
                                                <input type="number" name="age" value="<?= $row['age']; ?>" class="form-control black-border" required>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="form-label fw-light">Sex</label>
                                                <select class="form-select" name="gender" aria-label=".form-select-sm example" required>
                                                  <option selected hidden><?= $row['gender']; ?></option>
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                                </select>
                                              </div>
                                          </div>
                                          <div class="row mt-1">
                                            <div class="col-md-4">
                                              <label class="form-label fw-light">Contact No.</label>
                                              <input type="text" name="contact_no" value="<?= $row['contact_no']; ?>" class="form-control black-border" required>
                                            </div>
                                            <div class="col-md-8">
                                              <label class="form-label fw-light">Email</label>
                                              <input type="email" name="email" value="<?= $row['EMAIL']; ?>" class="form-control black-border" required>
                                            </div>
                                          </div>
                                          <div class="row mt-1">
                                            <div class="col-md-4">
                                              <label class="form-label fw-light">Position</label>
                                              <select class="form-select" name="position" aria-label=".form-select-sm example" required>
                                                <option selected hidden><?= $row['position']; ?></option>
                                                <option value="Admin">Admin</option>
                                                <option value="Head Teacher">Head Teacher/Therapist</option>
                                                <option value="Teachers">Teachers</option>
                                                <option value="Developmental Pediatrician">Developmental Pediatrician</option>
                                              </select>
                                            </div>
                                            <div class="col-md-8">
                                              <label class="form-label fw-light">Address</label>
                                              <input type="text" name="address" value="<?= $row['address']; ?>" class="form-control black-border" required>
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
                            <button type="submit" name="update_employee" class="btn btn-primary">Update</button>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- UPDATED IMAGE -->
                      <div class="modal fade classname3" id="editservice3<?= $row['ID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="width:695px;">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addstudentlabel">Employee Details</h5>
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
                                                <button type="button" class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#editservice<?= $row['ID']; ?>" onclick="showRegistration<?= $row['ID']; ?>()">Personal Details</button>
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
                                              <img src="../images/admin.jpg" alt="" style="height:135px;">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label class="form-label fw-light">Accomodated Student:</label>
                                              <input type="text" class="form-control black-border" readonly>
                                              <input type="text" class="form-control black-border mt-1 mb-2" readonly>
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
                                              <input type="file" name="employee_photo" class="form-control">
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
                            <button type="submit" name="update_employee" class="btn btn-primary">Update</button>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <script>
                      function showRegistration<?= $row['sIDplID']; ?>() {
                        // Select all elements with the class 'classname1' and show them
                        var elementToShow = document.getElementById('editservice<?= $row['ID']; ?>');
                        if (elementToShow) {
                            elementToShow.style.display = 'block'; // Hide element
                        }
                        var elementToShow = document.getElementById('editservice3<?= $row['ID']; ?>');
                        if (elementToShow) {
                            elementToShow.style.display = 'none'; // Hide element
                        }
                      }
                      function showUpdated<?= $row['ID']; ?>() {
                        // Select all elements with the class 'classname1' and show them
                        var elementToShow = document.getElementById('editservice<?= $row['ID']; ?>');
                        if (elementToShow) {
                            elementToShow.style.display = 'none'; // Hide element
                        }
                        var elementToShow = document.getElementById('editservice3<?= $row['ID']; ?>');
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
document.addEventListener('DOMContentLoaded', function() {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  myModal.show();
});
</script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
