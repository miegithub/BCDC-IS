<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="p-enrollee";
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
<div class="container mw-100 p-3 m-0" style="width:100%;height:100%;background-color: rgba(190, 190, 190);">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <div class="container card pt-3 mw-100 m-0 pb-4" style="width:99%;">
        <div class="row">
          <div class="col-md-12">
            <h2>Evaluate Patient Enrollee</h2>
            <hr class="hr fw-bold">
          </div>
        </div>
        <div class="row">
          <div class="col-md-7  ">
            <?php
            
              $learnerID= $_GET['id'];
              if(isset($_POST['submit_evaluate'])){
                $learnerID= $_GET['id'];
                $name = mysqli_real_escape_string($con, $_POST['name']);
                $enrollment_status = mysqli_real_escape_string($con, $_POST['enrollment_status']);
                $enrolled_date = mysqli_real_escape_string($con, $_POST['enrolled_date']);
                $learner_batch = mysqli_real_escape_string($con, $_POST['learner_batch']);
                $teacher_incharge = mysqli_real_escape_string($con, $_POST['teacher_incharge']);
                $shadow = mysqli_real_escape_string($con, $_POST['shadow']);
                $session_day = mysqli_real_escape_string($con, $_POST['session_day']);
                $session_time = mysqli_real_escape_string($con, $_POST['session_time']);
              
                // idagdag ang photo_location
                $query_update = "UPDATE `learner` SET enrollment_status='$enrollment_status', enrolled_date='$enrolled_date', learner_batch='$learner_batch', teacher_incharge='$teacher_incharge', shadow='$shadow', session_day='$session_day', session_time='$session_time', approved='1' WHERE learnerID='$learnerID'";
                $query_update_run = mysqli_query($con, $query_update);
                $name= $_SESSION["auth_user"]['name'];
                $position = $_SESSION["auth_user"]['position'];
                $activity = "EVALUATE PATIENT ENROLLEE SUBMITED SUCCESSFULLY";
                date_default_timezone_set('Asia/Manila');
                $current_time = date("h:i a");
                $date_today = date("Y-m-d");
                $query1 = "INSERT INTO `log_monitoring` (`name`, position, activity,`date`, action_time) VALUES ('$name','$position','$activity','$date_today','$current_time')";
                $query_run1 = mysqli_query($con, $query1);
                
              
                if($query_update_run){
                  echo '
                      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="">
                            <div class="modal-body">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-12 mt-5 pt-5 mb-5 text-center">
                                    <label for="" class="fw-bold">Congratulation!</label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 text-center">
                                    <p>'.$name.' has officially enrolled at Biñan City Development Center. The parent will be notified that '.$name.' is now an official learner of the BCDC.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <a href="learner-p-enrollee.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
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
                              <h5 class="text-white">'.$learnerID.'Something Went Wrong!</h5>
                            </div>
                            <div class="modal-footer">
                              <a href="learner.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                            </div>
                          </div>
                        </div>
                      </div>';
              }
              }
            ?>
            <form action="" method="post">
              
              <div class="container-fluid ">
                <div class="row mb-3 card shadow">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-4 pe-0 border">
                        <div class="container-fluid p-3">
                          <?php
                            $query = "SELECT * FROM learner WHERE learnerID='$learnerID'";
                            $query_run = mysqli_query($con,$query);
                            if($query_run){
                              if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                  $name=$row['name'];
                                  $address=$row['address'];
                                  $age=$row['age'];
                                  $diagnosis=$row['diagnosis'];
                                }
                              }
                            }
                          ?>
                          <div class="row mb-2">
                            <div class="col-md-12">
                              <img src="../images/girl.png" alt="" class="" style="width: 170px;height:170px;border:3px solid rgba(232, 72, 111);">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Learner's Name</label>
                              <input type="hidden" value="<?= $name; ?>" name="name">
                              <input type="text" class="form-control" value="<?= $name; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Address</label>
                              <input type="text" class="form-control" value="<?= $address; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Age</label>
                              <input type="text" class="form-control" value="<?= $age; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Diagnosis</label>
                              <input type="text" class="form-control" value="<?= $diagnosis; ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 px-0 border">
                        <div class="container-fluid">
                          <div class="row mb-2 mt-2">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Registration No. <?= $learnerID; ?></label>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Enrollment Status</label>
                              <select class="form-select" aria-label="" name="enrollment_status" required>
                                <option selected hidden></option>
                                <option class="text-success" value="Enrolled">Enrolled</option>
                                <option class="text-danger" value="Reject">Reject</option>
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Date Enrolled</label>
                              <input type="date" class="form-control w-50" name="enrolled_date" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Learner Batch</label>
                              <select class="form-select" aria-label="" name="learner_batch" required>
                                <option selected hidden></option>
                                <?php
                                  $query = "SELECT * FROM `learner_batch` WHERE batch_status='active'";
                                  $query_run = mysqli_query($con, $query);
                                  if($query_run){
                                    if(mysqli_num_rows($query_run) > 0){
                                      foreach($query_run as $row){
                                        ?>
                                          <option class="" value="<?= $row['batch_name']; ?>"><?= $row['batch_name']; ?></option>
                                        <?php
                                      }
                                    }
                                  }
                                  
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Teacher In-Charge</label>
                              <select class="form-select" aria-label="" name="teacher_incharge" required>
                                <option selected hidden></option>
                                <?php
                                  $query = "SELECT * FROM `user` WHERE position='Teacher'";
                                  $query_run = mysqli_query($con, $query);
                                  if($query_run){
                                    if(mysqli_num_rows($query_run) > 0){
                                      foreach($query_run as $row){
                                        ?>
                                          <option class="" value="<?= $row['NAME']; ?>"><?= $row['NAME']; ?></option>
                                        <?php
                                      }
                                    }
                                  }
                                  
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Shadow</label>
                              <select class="form-select" aria-label="" name="shadow" required>
                                <option selected hidden></option>
                                <?php
                                  $query = "SELECT * FROM `user` WHERE position='Teacher'";
                                  $query_run = mysqli_query($con, $query);
                                  if($query_run){
                                    if(mysqli_num_rows($query_run) > 0){
                                      foreach($query_run as $row){
                                        ?>
                                          <option class="" value="<?= $row['NAME']; ?>"><?= $row['NAME']; ?></option>
                                        <?php
                                      }
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="" class="fw-bold">Session Schedule:</label>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-6">
                              <select class="form-select" aria-label="" name="session_day" required>
                                <option selected hidden>Session Day</option>
                                <option class="" value="Enrolled">Monday & Thursday</option>
                                <option class="" value="Reject">Wednesday & Friday</option>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <select class="form-select" aria-label="" name="session_time" required>
                                <option selected hidden>Session Time</option>
                                <option class="" value="Enrolled">9:00 - 10:00</option>
                                <option class="" value="Enrolled">10:00 - 11:00</option>
                                <option class="" value="Enrolled">11:00 - 12:00</option>
                                <option class="" value="Enrolled">12:00 - 1:00</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" name="submit_evaluate" class="btn text-white" style="background-color:rgba(4, 3, 70);">Submit</button>
                    <a href="learner-p-enrollee.php" class="btn text-white ms-3" style="background-color:rgba(199, 73, 73);">Close</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5">
            <div class="container-fluid border border-dark h-100">
              <div class="row border border-dark" style="background-color:rgba(217, 217, 217);">
                <div class="col-md-12 ">
                  <label class="p-0 fw-bold" style="font-size:15px;">Dr. Hazel Gertrude Manabal-Reyes</label>
                </div>
                <div class="col-md-12 ">
                  <label for="" class="fw-light fst-italic p-0"  style="font-size:10px;">             Developmental and Behavioral Pediatrics</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="" class="fst-italic">Recommendation:</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <?php
                    $query = "SELECT * FROM learner_ass WHERE learnerID='$learnerID'";
                    $query_run = mysqli_query($con,$query);
                    foreach($query_run as $row){
                      $recommendation = $row['recommendation'];
                    }
                  ?>
                  <p><?= $recommendation; ?></p>
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
