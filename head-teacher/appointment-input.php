<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step3";
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
    if(isset($_POST['submit_appt'])){
      $ass_outlet = $_POST['ass_outlet'];
      $ass_date = $_POST['ass_date'];
      $ass_time = $_POST['ass_time'];
      $query_update = "UPDATE learner SET trigger_ht='1', assessment_sched='$ass_date',assessment_outlet='$ass_outlet', assessment_time='$ass_time', status='Reviewed' WHERE learnerID='$learnerID'";
      $query_update_run = mysqli_query($con,$query_update);
      $name= $_SESSION["auth_user"]['name'];
      $position = $_SESSION["auth_user"]['position'];
      $activity = "PATIENT ASSESSMENT REG/APPT SUBMITED SUCCESSFULLY";
      date_default_timezone_set('Asia/Manila');
      $current_time = date("h:i a");
      $date_today = date("Y-m-d");
      $query1 = "INSERT INTO `log_monitoring` (`name`, position, activity,`date`, action_time) VALUES ('$name','$position','$activity','$date_today','$current_time')";
      $query_run1 = mysqli_query($con, $query1);
      echo '<script>window.location.href = "appointment-view.php?id='.$learnerID.'";</script>';
    }
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
                    $learnerID = $_GET['id'];
                    $reg_no = null;
                    $name = null;
                    $date_of_birth = null;
                    $age = null;
                    $gender = null;
                    $contact_no = null;
                    $address = null;
                    $parent_email = null;
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
                    $reg_no = null;
                    $name = null;
                    $date_of_birth = null;
                    $age = null;
                    $gender = null;
                    $contact_no = null;
                    $address = null;
                    $parent_email = null;
                    $have_patient= "No patient assessment appointment details have been displayed yet, your record
              is still under review by the head teacher";
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
                          $have_patient = "The head teacher has reviewed your record and provided you with the assesssment appointment details. Please fill out another form of Dr. Hazel Manabal Reyes  Developmental Assessment";
                        }
                      }
                    }
                  ?>
                  <tr>
                    <input type="hidden" name="learnerID" value="<?= $learnerID; ?>">
                    <td class="text-end w-50"><strong>Assessment Outlet:</strong></td>
                    <td><input type="text" name="ass_outlet" id="ass_outlet" class="form-control border-white" value="<?= $assessment_outlet; ?>" required></td>
                  </tr>
                  <tr>
                    <td class="text-end"><strong>Assessment Date:</strong></td>
                    <td><input type="date" name="ass_date" id="ass_date" class="form-control border-white" value="<?= $assessment_date; ?>" required></td>
                  </tr>
                  <tr>
                    <td class="text-end border border-black"><strong>Assessment Time:</strong></td>
                    <td class="border border-black"><input type="time" name="ass_time" id="ass_time" class="form-control border-white" value="<?= $assessment_time; ?>" required></td>
                  </tr>
                </tbody>
              </table>
              <!--
              <label for="" class="fw-bold">Set Appointment Status:</label>
              <select class="form-select form-select-sm border-dark mb-2" aria-label=".form-select-sm example" name="appt_status" id="appt_status">
              <option selected hidden></option>
                <option class="" value="Pending" style="color:rgba(0, 204, 0)">Pending</option>
                <option class="" value="Reviewed" style="color:rgba(0, 102, 0)">Reviewed</option>
                
              </select>
                  -->
              <label for="" class="text-danger mb-2">Please review the details of the assessment appointment if correct. Keep in mind that this appointment is non-transferrable.</label>
              <label for=""><?= $have_patient; ?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-end">
        <button type="button" class="btn bg-primary text-white" id="submitButton" onclick="displayModal()">
        Submit Appointment Details
        </button>

        <!-- Modal -->
        <div class="modal fade" id="viewsubmit" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row mt-4">
                    <div class="col-md-12 text-center">
                      <h5>Assessment Appointment Details has been submitted</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <div id="modalBody" class="text-center mt-3">
                          <!-- The message will be inserted here dynamically -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      
                      <button type="submit" name="submit_appt" class="btn btn-primary">Done</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>

<script>
        function displayModal() {
            // Get the input values
            const outlet = document.getElementById("ass_outlet").value;
            const dateInput = document.getElementById("ass_date").value;
            const timeInput = document.getElementById("ass_time").value;

            // Format the date
            const date = new Date(dateInput);
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = date.toLocaleDateString('en-US', options);

            // Format the time
            let [hours, minutes] = timeInput.split(':');
            hours = parseInt(hours);
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12; // Convert 0 to 12 for midnight
            const formattedTime = `${hours}:${minutes} ${"00"}`;

            // Update the modal content
            const modalMessage = `You have successfully submitted an appointment schedule to Vhong Hillarious in ${outlet}, ${formattedDate} at ${formattedTime}.`;
            document.getElementById("modalBody").innerText = modalMessage;

            // Show the modal
            const myModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            myModal.show();
          }
    </script>
<script>
    document.getElementById('submitButton').addEventListener('click', function() {
        const input_ass = document.getElementById('ass_outlet').value.trim();
        const ass_date = document.getElementById('ass_date').value.trim();
        const ass_time = document.getElementById('ass_time').value.trim();
        if(input_ass==false){
            // Optionally, show an alert or error message
            alert('Please enter appointment details before submitting.');
        }
        else if(ass_date==false){
          alert('Please enter assessment date before submitting.');
        }
        else if(ass_time==false){
          alert('Please enter assessment time before submitting.');
        }
        else{
            // If input is not empty, show the modal
            const modal = new bootstrap.Modal(document.getElementById('viewsubmit'));
            modal.show();
        }
    });
</script>
<?php
  include('../admin/includes/footer.php');
?>
