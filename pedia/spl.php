<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="spl";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

if(isset($_POST['update_employee'])){
  $splID = mysqli_real_escape_string($con, $_POST['splID']);
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
  $age = mysqli_real_escape_string($con, $_POST['age']);
  $sex = mysqli_real_escape_string($con, $_POST['sex']);
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

  $query_update_employee = "UPDATE `spl` SET `fname`='$fname',`lname`='$lname',`date_of_birth`='$date_of_birth',`sex`='$sex',`age`='$age',`email`='$email',`contact_no`='$contact_no',`address`='$address',`position`='$position' WHERE splID='$splID'";
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
          <div class="col-md-12">
            <h1>Service Partner List</h1>
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
                    <th class="text-center">Last Name</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact No.</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $count=1;
                $query = "SELECT * FROM `user` WHERE archive='0' and position!='Administrator' and position!='Parent'";
                $query_run = mysqli_query($con,$query);
                if($query_run){
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if($row['position'] == "headteacher"){
                        $position="Head Teacher";
                      }
                      else if($row['position'] == "teacher"){
                        $position="Teacher";
                      }
                      else if($row['position'] == "pedia"){
                        $position="Developmental and Behavioral Pediatrician";
                      }
                      if($row['archive'] == "0"){
                        $status_color = "text-success";
                        $status="Active";
                      }
                      else{
                        $status_color = "text-danger";
                        $status="Inactive";
                      }
              ?>
              <tr>
                  <td class="text-center"><?= $count++; ?></td>
                  <td class="text-center"><?= $row['lname'] ?></td>
                  <td class="text-center"><?= $row['fname'] ?></td>
                  <td class="text-center"><?= $row['EMAIL'] ?></td>
                  <td class="text-center"><?= $row['contact_no'] ?></td>
                  <td class="text-center"><?= $row['position'] ?></td>
                  <td class="text-center <?= $status_color; ?>"><?= $status; ?></td>
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
