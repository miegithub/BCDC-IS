<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="inquiries";
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
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h1>Patient Waiting List</h1>
            <?php
              if(isset($_POST['submit_view_details'])){
                $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
                
                $query_update_learner = "UPDATE dev.`learner` SET `trigger_view_details`='1' WHERE learnerID='$learnerID'";
                mysqli_query($con, $query_update_learner);
                echo '<script>window.location.href = "inquiries-view.php?id='.$learnerID.'";</script>';
                exit(0);
              }
              if(isset($_POST['update_learner'])){
                $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
                $teacher_incharge = mysqli_real_escape_string($con, $_POST['teacher_incharge']);
                $fname = mysqli_real_escape_string($con, $_POST['fname']);
                $lname = mysqli_real_escape_string($con, $_POST['lname']);
                $age = mysqli_real_escape_string($con, $_POST['age']);
                $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
                $gender = mysqli_real_escape_string($con, $_POST['gender']);
                $diagnosis = mysqli_real_escape_string($con, $_POST['diagnosis']);
                $address = mysqli_real_escape_string($con, $_POST['address']);
                $registration_no = mysqli_real_escape_string($con, $_POST['registration_no']);
                $date_enrolled = mysqli_real_escape_string($con, $_POST['date_enrolled']);
                $guardian_name = mysqli_real_escape_string($con, $_POST['guardian_name']);
                $guardian_relationship = mysqli_real_escape_string($con, $_POST['guardian_relationship']);
                $guardian_contact = mysqli_real_escape_string($con, $_POST['guardian_contact']);
                $guardian_email = mysqli_real_escape_string($con, $_POST['guardian_email']);
                $parent_address = mysqli_real_escape_string($con, $_POST['parent_address']);
              
                $name = $fname . " " . $lname;
                
                $file_size =  get_size($_FILES['learner_photo']['size']);
                $file_extension = pathinfo($_FILES['learner_photo']['name'], PATHINFO_EXTENSION);
                $file_name = $_FILES['learner_photo']['name'];
                $allowed_extension = ['png','jpeg', 'jpg','webp'];
                $file_path = 'images';
                $file_temp = $_FILES['learner_photo']['tmp_name'];
              
                // idagdag ang photo_location
                $query_update_learner = "UPDATE dev.`learner` SET `fname`='$fname',`lname`='$lname',`name`='$name',`age`='$age',`address`='$address',`diagnosis`='$diagnosis',`date_enrolled`='$date_enrolled',`teacher_incharge`='$teacher_incharge',`gender`='$gender',`date_of_birth`='$date_of_birth',`registration_no`='$registration_no',`photo_name`='$file_name' WHERE learnerID='$learnerID'";
                $query_update_learner_run = mysqli_query($con, $query_update_learner);
              
                
                $query_update_parent = "UPDATE dev.`parent` SET `guardian_name`='$guardian_name',`guardian_relationship`='$guardian_relationship',`guardian_contact`='$guardian_contact',`guardian_email`='$guardian_email',`parent_address`='$parent_address' WHERE learnerID='$learnerID'";
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
                                <a href="inquiries.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
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
                                <a href="inquiries.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
              }
            ?>
          </div>
          <div class="col-md-6 text-end">
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
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Date of Birth</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Assessment Status</th>
                    <th class="text-center" style="width:120px;">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $count=1;
                $query = "SELECT * FROM `learner` where archive='0'";
                $query_run = mysqli_query($con,$query);
                if($query_run){
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if($row['trigger_view_details'] == "0" && $row['trigger_assessment'] == "0"){
                        $color = "text-danger";
                        $ass_status = "Pending";
                      }
                      else if($row['trigger_view_details'] == "1" && $row['trigger_assessment']=="0"){
                        $color = "text-warning";
                        $ass_status = "In Progress";
                      }
                      else if($row['trigger_view_details'] == "1" && $row['trigger_assessment'] == "1"){
                        $color = "text-success";
                        $ass_status = "Completed";
                      }
                ?>
                      <tr>
                          <td class="text-center"><?= $count++; ?></td> 
                          <td class="text-center"><?= $row['fname']; ?></td>
                          <td class="text-center"><?= $row['lname']; ?></td>
                          <td class="text-center"><?= $row['age']; ?> y.o.</td>
                          <td class="text-center"><?= $row['date_of_birth']; ?></td>
                          <td class="text-center"><?= $row['gender']; ?></td>
                          <td class="text-center"><?= $row['address']; ?></td>
                          <td class="text-center <?= $color; ?>"><?= $ass_status; ?></td>
                          <td class="text-center p-0 pt-1">
                            <form action="" method="post">
                              <input type="text" name="learnerID" value="<?= $row['learnerID']; ?>" readonly>
                              <button type="submit" name="submit_view_details" class="btn btn-primary" href="inquiries-view.php?id=<?= $row['learnerID']; ?>" >View Detail</button>
                            </form>
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
