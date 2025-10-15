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
<?php
  if(isset($_POST['update_batch'])){
    $lbID = $_POST['lbID'];
    $batch_name = $_POST['batch_name'];
    $batch_year = $_POST['batch_year'];

    
    $query = "UPDATE learner_batch SET batch_name='$batch_name', batch_year = '$batch_year' WHERE lbID='$lbID'";
    mysqli_query($con,$query);
  }
  
  if(isset($_POST['archive_learner_batch'])){
    
    $lbID = $_POST['lbID'];
    
    $query = "UPDATE learner_batch SET archive='1' WHERE lbID='$lbID'";
    mysqli_query($con,$query);
    $name= $_SESSION["auth_user"]['name'];
    $position = $_SESSION["auth_user"]['position'];
    $activity = "BATCH DELETED SUCCESSFULLY";
    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i a");
    $date_today = date("Y-m-d");
    $query1 = "INSERT INTO `log_monitoring` (`name`, position, activity,`date`, action_time) VALUES ('$name','$position','$activity','$date_today','$current_time')";
    $query_run1 = mysqli_query($con, $query1);
  }
?>
<div class="container mw-100 p-3 m-0" style="width:100%;height:100vh;background-color: rgba(190, 190, 190);">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h2>Learner Batch</h2>
          </div>
          <div class="col-md-6 text-end pb-2">
            <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_learner">Add Learner Batch</button>

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
                        $name= $_SESSION["auth_user"]['name'];
                        $position = $_SESSION["auth_user"]['position'];
                        $activity = "ADD LEARNER BATCH SUCCESSFULLY";
                        date_default_timezone_set('Asia/Manila');
                        $current_time = date("h:i a");
                        $date_today = date("Y-m-d");
                        $query1 = "INSERT INTO `log_monitoring` (`name`, position, activity,`date`, action_time) VALUES ('$name','$position','$activity','$date_today','$current_time')";
                        $query_run1 = mysqli_query($con, $query1);
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
                    <th class="text-center">No.</th>
                    <th class="text-center">Batch Name</th>
                    <th class="text-center">Batch Year</th>
                    <th class="text-center">Batch Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $count=1;
                $query = "SELECT * FROM `learner_batch` WHERE archive='0'";
                $query_run = mysqli_query($con,$query);
                if($query_run){
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if($row['batch_status']=="active"){
                        $color_batch = "text-success";
                      }
                      else{
                        $color_batch = "text-danger";
                      }
                ?>
                      <tr>
                          <td class="text-center"><?= $count++; ?></td>
                          <td class="text-center"><a href="learner-batch-list.php?id=<?= $row['lbID']; ?>" class="text-dark"><?= $row['batch_name']; ?></a></td>
                          <td class="text-center"><?= $row['batch_year']; ?></td>
                          <td class="text-center <?= $color_batch; ?>"><?= $row['batch_status']; ?></td>
                          <td class="text-center">
                            <form action="" method="post">
                             
                              <button type="button" class="btn btn-success btn-sm p-0 px-1" data-bs-toggle="modal" data-bs-target="#edit<?= $row['lbID']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                              <input type="hidden" name="lbID" class="form-control" value="<?= $row['lbID']; ?>">
                              <button type="submit" name="archive_learner_batch" class="btn btn-danger btn-sm p-0 px-1"><i class="fa-solid fa-trash"></i></button>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="edit<?= $row['lbID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="" method="post">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">EDIT</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <label for="">Batch Name</label>
                                            <input type="hidden" name="lbID" class="form-control" value="<?= $row['lbID']; ?>">
                                            <input type="text" name="batch_name" class="form-control" value="<?= $row['batch_name']; ?>">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <label for="">Batch Year</label>
                                            <input type="text" name="batch_year" class="form-control" value="<?= $row['batch_year']; ?>">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" name="update_batch" class="btn btn-primary">Update</button>
                                    </div>
                                  </form>
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
