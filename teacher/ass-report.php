<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="assessment";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
?>
<style>
</style>
<div class="container mw-100 p-3 m-0 bg-white" style="width:100%;height:100%;">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h2>FORMS AND REPORTS</h2>
          </div>
          <div class="col-md-6 text-end">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr class="text-dark" style="border-bottom: 2px solid black;">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5>Learner Information</h5>
          </div>
        </div>
        <div class="row pb-3">
          <?php
            $learnerID = $_GET['id'];
            $query = "SELECT * FROM `learner` WHERE archive='0' ";
            $query_run = mysqli_query($con,$query);
            if($query_run){
              if(mysqli_num_rows($query_run) > 0){
                foreach($query_run as $row){
                  $name = $row['name'];
                  $address = $row['address'];
                  $age = $row['age'];
                  $diagnosis = $row['diagnosis'];
                  $teacher_incharge = $row['teacher_incharge'];
                }
              }
            }
          ?>
          <!-- LEFT -->
          <div class="col-md-3">
            <div class="container card pt-3 pb-3 shadow">
              <div class="row">
                <div class="col-md-12 text-center pb-3">
                  <img src="../images/girl.png" alt="" style="width:150px;height:150px;">
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Student Name</label>
                  <input type="text" name="student_name" class="form-control black-border" value="<?= $name; ?>" readonly>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Address</label>
                  <input type="text" name="address" class="form-control black-border" value="<?= $address; ?>" readonly>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Age</label>
                  <input type="number" name="age" class="form-control black-border" value="<?= $age; ?>" readonly>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Diagnosis</label>
                  <input type="text" name="diagnosis" class="form-control black-border" value="<?= $diagnosis; ?>" readonly>
                </div>
              </div>
              <div class="row pb-3">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Teacher In-charge</label>
                  <input type="text" name="teacher_incharge" class="form-control black-border" value="<?= $teacher_incharge; ?>" readonly>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Overall Result: <label for="" class="" style="color:rgba(80, 179, 71);">GOOD</label></label>
                </div>
              </div>
            </div>
          </div>
          <!-- RIGHT -->
          <div class="col-md-9">
            <div class="container">
              <div class="row">
                <div class="col-md-12 d-flex">
                  <nav class="navbar navbar-expand-lg navbar-light pb-0">
                      <div class="container-fluid ps-0 ms-0">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                              <a class="me-1 nav-link active active-btn text-white">Assessment Report</a>
                            </li>
                            <li class="nav-item">
                              <a href="ipp.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Individualized Program Plan (IPP)</a>
                            </li>
                            <li class="nav-item">
                              <a href="progress-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Progress Report (running notes)</a>
                            </li>
                            <li class="nav-item">
                              <a href="narrative-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Narrative Progress Report</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                  </nav>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 hv-100">
                <iframe src="pdf_assessment.php?id=<?= $_GET['id']; ?>" class="w-100 mw-100" frameborder="0" style="height:660px;"></iframe>
                </div>
              </div>
            </div>
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
