<?php

session_start();
include('config/dbcon.php');
$currentPage="register";
$hide_side="False";
include('../admin/includes/header.php');
include('../admin/includes/navbar.php');

 if(isset($_POST['approve'])){
  $ID = mysqli_real_escape_string($con, $_POST['ID']);
  $query_update_learner = "UPDATE dev.`user` SET approved='1' WHERE ID='$ID'";
  mysqli_query($con, $query_update_learner);
 } if(isset($_POST['reject'])){
  $ID = mysqli_real_escape_string($con, $_POST['ID']);
  $query_update_learner = "UPDATE dev.`user` SET approved='2' WHERE ID='$ID'";
  mysqli_query($con, $query_update_learner);
 }
 if(isset($_POST['create_account'])){
  
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $position = mysqli_real_escape_string($con, $_POST['position']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
  $age = mysqli_real_escape_string($con, $_POST['age']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $name= $fname . " " . $lname;

  if($position == "Administrator"){
    $type = "Admin";
  }
  else if ($position == "Head Teacher"){
    $type = "head_teacher";
  }
  else if ($position == "Teacher"){
    $type = "teacher";
  }
  else if ($position == "Developmental Pediatrician"){
    $type = "pedia";
  }
  else{
    
    $type = "Parent";
  }

  $query_username = "SELECT * FROM user WHERE USERNAME='$username'";
  $query_run = mysqli_query($con,$query_username);
  if($query_run){
    if(mysqli_num_rows($query_run) > 0){

      $_SESSION['message'] = "Errpr";
      $_SESSION['title'] = "SuccErrpress";
      $_SESSION['message2'] = "Username already exist!";
    }
    else{
      $query = "INSERT INTO `user`(`NAME`, `fname`,`lname`, `address`, `contact_no`, `gender`, `date_of_birth`, `age`, `EMAIL`, `USERNAME`, `PASSWORD`, `position`, `TYPE`) VALUES ('$name','$fname','$lname','$address','$contact_no','$gender','$date_of_birth','$age','$email','$username','$password','$position','$type')";
      mysqli_query($con,$query);
    }
  }

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
            <h1>Registered Users</h1>
          </div>
          <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
              Add User
            </button>

            <!-- Modal -->
             <form action="" method="post">
              
              <div class="modal fade text-start" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content" style="width:700px;">
                    <div class="modal-header" style="background:rgba(63, 147, 245);">
                      <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Add User</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <div class="row mb-2">
                          <div class="col-md-4">
                            <label for="">Full Name</label>
                            <input type="text" name="lname" class="form-control border-dark" placeholder="Last Name" required>
                          </div>
                          <div class="col-md-4">
                            
                            <label for="" class="text-white">.</label>
                            <input type="text" name="fname" class="form-control border-dark" placeholder="First Name" required>
                          </div>
                          <div class="col-md-4">
                            <label for="">Position</label>
                            <select class="form-select border-dark" name="position" aria-label="Default select example" required>
                              <option selected value="Head Teacher">Head Teacher</option>
                              <option value="Teacher">Teacher</option>
                              <option value="Developmental Pediatriacian">Developmental Pediatrician</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-4">
                            <label for="">Sex</label>
                            <select class="form-select border-dark" name="gender" aria-label="Default select example" required>
                              <option selected value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label for="">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control border-dark" placeholder="" required>
                          </div>
                          <div class="col-md-4">
                            <label for="">Age</label>
                            <input type="text" name="age" class="form-control border-dark" placeholder="" required>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-4">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control border-dark" placeholder="" required>
                          </div>
                          <div class="col-md-4">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control border-dark" placeholder="" required>
                          </div>
                          <div class="col-md-4">
                            <label for="">Contact No.</label>
                            <input type="text" name="contact_no" class="form-control border-dark" placeholder="" required>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-4">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control border-dark" placeholder="Enter your preferred username" required>
                          </div>
                          <div class="col-md-4">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control border-dark" placeholder="Enter your preferred password" required>
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <button type="submit" name="create_account" class="btn " style="background:rgba(63, 147, 245);">Create Account</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             </form>
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
                    <th class="text-center">USERNAME</th>
                    <th class="text-center">ACCOUNT OWNER</th>
                    <th class="text-center">ADDRESS</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">CONTACT NUMBER</th>
                    <th class="text-center">POSITION</th>
                    <th class="text-center">REGISTRATION DATE</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM user WHERE approved='0'";
                $query_run = mysqli_query($con,$query);
                if($query_run){
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      ?>
                      <tr>
                        <td class="text-center"><?= $row['USERNAME']; ?></td>
                        <td class="text-center"><?= $row['fname']. " " .$row['lname']; ?></td>
                        <td class="text-center"><?= $row['address']; ?></td>
                        <td class="text-center"><?= $row['EMAIL']; ?></td>
                        <td class="text-center"><?= $row['contact_no']; ?></td>
                        <td class="text-center"><?= $row['position']; ?></td>
                         <td class="text-center"><?= $row['current_time']; ?></td>
                        <td class="text-center p-0 pt-1" style="width:120px;">
                          <form action="" method="post">
                            <input type="hidden" name="ID" value="<?= $row['ID']; ?>">
                            <button class="btn btn-success btn-sm p-0 px-1 mt-2" name="approve" type="submit">Approve</button>
                            <button class="btn btn-danger btn-sm p-0 px-1 mt-2" name="reject" type="button" data-bs-toggle="modal" data-bs-target="#reject">Reject</button>
                            <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div class="container-fluid">
                                      <div class="row mb-3">
                                        <div class="col-md-12">
                                          <label for="">Are you sure you want to reject this user?</label>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger btn-sm px-4 me-3" data-bs-dismiss="modal">No</button>
                                            <button type="submit"  name="reject" class="btn btn-success btn-sm px-4">Yes</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
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
<!-- REGISTRATION DETAIL -->
<div class="modal fade classname1" id="editstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
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
                          <button class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#editstudent2" onclick="showParent()">Parent Information</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn" data-bs-toggle="modal" data-bs-target="#editstudent3" onclick="showUpdated()">Updated Image</button>
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
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RIGHT HALF -->
                <div class="col-md-9">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Student Name</label>
                        <input type="text" name="student_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label fw-light">Age</label>
                        <input type="number" name="age" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-3">
                        <label class="form-label fw-light">Sex</label>
                        <select class="form-select form-select-sm" name="sex" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Diagnosis</label>
                        <select class="form-select form-select-sm" name="diagnosis" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="diagnosis_1">Diagnosis 1</option>
                          <option value="diagnosis_2">Diagnosis 2</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-7">
                        <label class="form-label fw-light">Registration No.</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date Enrolled</label>
                        <input type="date" name="name" class="form-control black-border" required>
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
      <button type="button" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- PARENT INFORMATION -->
<div class="modal fade classname2" id="editstudent2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
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
                          <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#editstudent" onclick="showRegistration()">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn ">Parent Information</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn" data-bs-toggle="modal" data-bs-target="#editstudent3" onclick="showUpdated()">Updated Image</button>
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
                        <img src="../images/admin.jpg" alt="" style="height:142px;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
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
                        <input type="text" name="guardian_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Relationship</label>
                        <input type="text" name="relationship" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Contact Number</label>
                        <input type="number" name="contact_no" class="form-control black-border" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Email</label>
                        <input type="email" name="guardian_email" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
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
      <button type="button" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- UPDATED IMAGE -->
<div class="modal fade classname3" id="editstudent3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
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
                          <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#editstudent" onclick="showRegistration()">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#editstudent2" onclick="showParent()">Parent Information</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn">Updated Image</button>
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
                    <div class="row mb-2">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
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
                        <input type="file" class="form-control">
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
      <button type="button" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- VIEW REGISTRATION DETAIL -->
<div class="modal fade viewclassname1" id="viewstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
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
                          <button class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#viewstudent1" onclick="viewshowParent()">Parent Information</button>
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
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RIGHT HALF -->
                <div class="col-md-9">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Student Name</label>
                        <input type="text" name="student_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label fw-light">Age</label>
                        <input type="number" name="age" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-3">
                        <label class="form-label fw-light">Sex</label>
                        <select class="form-select form-select-sm" name="sex" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Diagnosis</label>
                        <select class="form-select form-select-sm" name="diagnosis" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="diagnosis_1">Diagnosis 1</option>
                          <option value="diagnosis_2">Diagnosis 2</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-7">
                        <label class="form-label fw-light">Registration No.</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date Enrolled</label>
                        <input type="date" name="name" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr class="hr mb-1">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-12 text-end">
                        <button class="btn btn-primary">Learner Document Records</button>
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
<!-- VIEW PARENT INFORMATION -->
<div class="modal fade viewclassname2" id="viewstudent1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
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
                          <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#viewstudent" onclick="viewshowRegistration()">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn ">Parent Information</button>
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
                        <img src="../images/admin.jpg" alt="" style="height:142px;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
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
                        <input type="text" name="guardian_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Relationship</label>
                        <input type="text" name="relationship" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Contact Number</label>
                        <input type="number" name="contact_no" class="form-control black-border" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Email</label>
                        <input type="email" name="guardian_email" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
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
    </div>
  </div>
</div>
<script>
  new DataTable('#example');
</script>
<script>
    // PARA LUMABAS AGAD YUNG MODAL
    //document.addEventListener('DOMContentLoaded', function () {
    //  var myModal = new bootstrap.Modal(document.getElementById('addstudent'));
    //  myModal.show();
    //});

    function showRegistration() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'block'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname1'));
        myModal.show();
      });
    }
    function showParent() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname2'));
        myModal.show();
      });
    }
    function showUpdated() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname3'));
        myModal.show();
      });
    }
    function viewshowRegistration() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.viewclassname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'block'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.viewclassname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.viewclassname1'));
        myModal.show();
      });
    }
    function viewshowParent() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.viewclassname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.viewclassname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.viewclassname2'));
        myModal.show();
      });
    }
  </script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
