<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="learner-batch";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');


function get_size($size){
  $kbSize = $size / 1024;
  $formalSize = number_format($kbSize,2);
  return $formalSize;
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
        <?php
          $lbID = $_GET['id'];
          $query_batch = "SELECT * FROM learner_batch WHERE lbID='$lbID'";
          $query_batch_query = mysqli_query($con, $query_batch);
          
          if($query_batch_query){
            if(mysqli_num_rows($query_batch_query) > 0){
              foreach($query_batch_query as $row){
                $batch_name = $row['batch_name'];

              }
            }
          }
        ?>
        <div class="row">
          <div class="col-md-6">
            <h2>Learner <?= $batch_name; ?></h2>
          </div>
          <div class="col-md-6 text-end pb-2">
            <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_learner">Add Student</button>

            <!-- Modal -->
            <div class="modal fade text-start" id="add_learner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content border border-primary">
                  
                  <?php
                      
                      if(isset($_POST['add_learner_batch'])){
                        $batch_name = mysqli_real_escape_string($con, $_POST['batch_name']);
                        $batch_status = mysqli_real_escape_string($con, $_POST['batch_status']);
                        $batch_year = mysqli_real_escape_string($con, $_POST['batch_year']);
                      
                        // idagdag ang photo_location
                        $query_update = "INSERT INTO `learner_batch`(`batch_name`, `batch_status`, `batch_year`) VALUES ('$batch_name','$batch_status','$batch_year')";
                        mysqli_query($con, $query_update);
                      }
                    ?>
                  <form action="" method="post">
                    <div class="modal-header bg-primary">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Learner Batch</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="" class="text-danger">Batch Details</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <hr class="mt-0 pt-0 ">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <label for="">Batch Name</label>
                            <input type="text" class="form-control" name="batch_name" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label for="">Batch status</label>
                            <select class="form-select" aria-label="" name="batch_status" required>
                              <option selected hidden></option>
                              <option class="text-success" value="active">active</option>
                              <option class="text-danger" value="inactive">inactive</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label for="">Date</label>
                            <select class="form-select" aria-label="" name="batch_year" required>
                              <option selected hidden></option>
                              <option class="" value="2020-2021">2020-2021</option>
                              <option class="" value="2021-2022">2021-2022</option>
                              <option class="" value="2022-2023">2022-2023</option>
                              <option class="" value="2023-2024">2023-2024</option>
                              <option class="" value="2024-2025">2024-2025</option>
                              <option class="" value="2025-2026">2025-2026</option>
                              <option class="" value="2026-2027">2026-2027</option>
                            </select>
                          </div>
                        </div>
                      </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="add_learner_batch"  class="btn btn-primary text-white">Add</button>
                      <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          






          <hr class="hr fw-bold mt-2">
        </div>
        <div class="row">
          <div class="col-md-12">
          <table id="example" class="table table-striped border" style="width:100%;font-size:12px;">
            <thead>
                <tr>
                    <th class="text-center">Student No.</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Diagnosis</th>
                    <th class="text-center">Teacher In Charge</th>
                    <th class="text-center">Shadow</th>
                    <th class="text-center" style="width:120px;">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $count=1;
                $query = "SELECT * FROM `learner` WHERE learner_batch='$batch_name' and archive='0'";
                $query_run = mysqli_query($con,$query);
                if($query_run){
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){

                ?>
                      <tr>
                          <td class="text-center"><?= $row['learnerID'];?></td>
                          <td class="text-center"><?= $row['fname'];?></td>
                          <td class="text-center"><?= $row['lname']; ?></td>
                          <td class="text-center"><?= $row['age']; ?> y.o</td>
                          <td class="text-center"><?= $row['address']; ?></td>
                          <td class="text-center"><?= $row['diagnosis']; ?></td>
                          <td class="text-center"><?= $row['teacher_incharge']; ?></td>
                          <td class="text-center"><?= $row['shadow']; ?></td>
                          <td class="text-center" style="width:100px;">
                            <button class="btn btn-success btn-sm p-0 px-1" data-bs-toggle="modal" data-bs-target="#viewstudent<?= $row['learnerID']; ?>"><i class="fa-solid fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm p-0 px-1" data-bs-toggle="modal" data-bs-target="#editstudent<?= $row['learnerID']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-danger btn-sm p-0 px-1"><i class="fa-solid fa-trash"></i></button>
                            <a href="ass-report.php?id=<?= $row['learnerID']; ?>" class="btn btn-primary btn-sm p-0 px-1"><i class="fa-solid fa-file"></i></a>
                            <div class="modal fade viewclassname1" id="viewstudent<?= $row['learnerID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
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
                                                      <button class="me-1 nav-link active active-btn">Registration Details</button>
                                                    </li>
                                                    <li class="nav-item">
                                                      <button type="button" class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#viewstudent1<?= $row['learnerID']; ?>" onclick="viewshowParent<?= $row['learnerID']; ?>()">Parent Information</button>
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
                                                    <img src="../images/girl.png" alt="" style="height:135px;width: 160px;">
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
                            <div class="modal fade viewclassname2" id="viewstudent1<?= $row['learnerID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
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
                                                      <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#viewstudent<?= $row['learnerID']; ?>" onclick="viewshowRegistration<?= $row['learnerID']; ?>()">Registration Details</button>
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
                                                    <img src="../images/girl.png" alt="" style="height:135px;width: 160px;">
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
        <div class="row my-3">
          <div class="col-md-12 text-end">
            <a href="learner-batch.php" class="btn btn-primary">Back</a>
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
