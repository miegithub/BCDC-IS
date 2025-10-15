<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="review_l";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

?>
<style>
  table {
            border-collapse: collapse;
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 9px;
        }
</style>
<div class="container p-5">
  <?php
    $learnerID=$_GET['id'];
  ?>
  <form action="" method="post">
    <div class="row mb-3">
      <div class="col-md-12">
        
        <div class="container-fluid card p-4 ps-5 pe-5 shadow" >
          <div class="row">
            <div class="col-md-12">
              <h2>Patient Assessment Registration and Appointment Details</h2>
              <hr class="p-0 m-0">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-12 text-end">
              <label for=""><strong>Registration Date: </strong><?= date('F j, Y'); ?></label>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for=""><strong>Patient Assessment Registration Details</strong></label>
            </div>
            <div class="col-md-6">
              <label for=""><strong>Patient Assessment Appointment Details</strong></label>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <table class="border w-100">
                <tbody>
                  <?php
                    $query = "SELECT * FROM learner WHERE learnerID='$learnerID'";
                    $query_run = mysqli_query($con, $query);
                    if($query_run){
                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $row){
                          $learnerID = $row['learnerID'];
                          $name = $row['name'];
                          $date_of_birth = $row['date_of_birth'];
                          $age = $row['age'];
                          $gender = $row['gender'];
                          $parent_contact = $row['guardian_contact'];
                          $address = $row['address'];
                          $parent_email = $row['guardian_email'];
                        }
                      }
                    }
                  ?>
                  <tr>
                    <td class="text-end w-50"><strong>Registration No.:</strong></td>
                    <td><?= $learnerID; ?></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Patient Name:</strong></td>
                    <td><?= $name; ?></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Date of Birth:</strong></td>
                    <td><?= $date_of_birth; ?></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Age:</strong></td>
                    <td><?= $age; ?></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Gender:</strong></td>
                    <td><?= $gender; ?></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Contact No.:</strong></td>
                    <td><?= $parent_contact; ?></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Address:</strong> </td>
                    <td><?= $address; ?></td>
                  </tr>
                  <tr>
                    <td class="text-end border border-black"><strong>Email Address of Parent:</strong></td>
                    <td class=" border border-black"> <?= $parent_email; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6">
              <table class="border w-100 mb-5">
                <tbody>
                  <?php
                    $query = "SELECT * FROM learner WHERE learnerID='$learnerID'";
                    $query_run = mysqli_query($con, $query);
                    if($query_run){
                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $row){
                          $learnerID = $row['learnerID'];
                          $name = $row['name'];
                          $date_of_birth = $row['date_of_birth'];
                          $age = $row['age'];
                          $gender = $row['gender'];
                          $parent_contact = $row['guardian_contact'];
                          $address = $row['address'];
                          $parent_email = $row['guardian_email'];
                          $assessment_outlet = $row['assessment_outlet'];
                          $assessment_date = $row['assessment_sched'];
                          $assessment_time = $row['assessment_time'];
                          $status = $row['status'];

                          if($status == "Pending"){
                            $status_color = "0, 255, 0";
                          }
                          else{
                            $status_color = "0, 102, 0";
                          }
                          $have_patient = "The head teacher has reviewed your record and provided you with the assesssment appointment details. Please fill out another form of Dr. Hazel Manabal Reyes  Developmental Assessment";
                        }
                      }
                    }
                  ?>
                  <tr>
                    <input type="hidden" name="learnerID" value="<?= $learnerID; ?>">
                    <td class="text-end w-50"><strong>Assessment Outlet:</strong></td>
                    <td><input type="text" name="ass_outlet" id="ass_outlet" class="form-control border-white border" value="<?= $assessment_outlet; ?>" readonly></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Assessment Date:</strong></td>
                    <td><input type="date" name="ass_date" id="ass_date" class="form-control border-white" value="<?= $assessment_date; ?>" readonly></td>
                  </tr>
                  <tr>
                    <td class="text-end border border-black"><strong>Assessment Time:</strong></td>
                    <td class="border border-black"><input type="time" name="ass_time" id="ass_time" class="form-control border-white" value="<?= $assessment_time; ?>" readonly></td>
                  </tr>
                </tbody>
              </table>
              <label for="" class="fw-bold">Appointment Status:</label>
              <input type="text" class="form-control border-dark border" value="<?= $status; ?>" readonly style="color:rgba(<?= $status_color; ?>);">
              <label for="" class="pt-3"><?= $have_patient; ?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-end">
        <a href="learner-review.php?id=<?= $_GET['id']; ?>" class="btn bg-primary text-white w-25">
        Back
        </a>
      </div>
    </div>
  </form>
</div>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>

<?php
  include('../admin/includes/footer.php');
?>
