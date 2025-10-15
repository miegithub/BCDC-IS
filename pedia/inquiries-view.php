<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="inquiries";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

if(!isset($_GET['id'])){
  #header("Location: inquiries.php");
  #exit(0);
}
$_SESSION['learnerID']=$_GET['id'];
$learnerID = $_GET['id'];
function get_size($size){
  $kb_size = $size / 1024;
  $formal_size = number_format($kb_size,2);
  return $formal_size;
}
?>
<style>
  .main{
    background-color: white;
  }
  .right-button-active{
    font-size: 14px;
    padding: 9px 7px;
    border: 1px solid black;
    margin-left: -1px;
    box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.2);
  }
  .right-button{
    font-size: 14px;
    padding: 9px 7px;
    color: rgba(0, 134, 188);
  }
  td{
    color:black;
  }
</style>
<div class="container-fluid " style="height:100vh">
  <div class="row">
    <div class="col-md-12">
      <h1 class=" mb-0">Patient Details</h1>
      <hr class=" mb-1 mt-0">
    </div>
  </div>
  <div class="row  p-0 m-0">
    <div class="col-md-10 px-0">
      <div class="container border border-dark py-2">
        <div class="row">
          <div class="col-md-6">
            <div class="container-fluid">
              <?php
                $query = "SELECT * FROM learner WHERE learnerID='$learnerID'";
                $query_run = mysqli_query($con, $query);
                foreach($query_run as $row){
                  $name = $row['name'];
                  $age = $row['age'];
                  $date_of_birth = $row['date_of_birth'];
                  $gender = $row['gender'];
                  $address = $row['address'];
                  $mother_name = $row['mother_name'];
                  $guardian_contact = $row['guardian_contact'];
                  $guardian_email = $row['guardian_email'];
                  $registration_no = $row['registration_no'];
                  $assessment_sched = $row['assessment_sched'];
                  $assessment_outlet = $row['assessment_outlet'];
                  $assessment_time = $row['assessment_time'];

                  $diagnosis = $row['diagnosis'];
                  $therapy = $row['therapy'];
                  $therapy_location = $row['therapy_location'];
                  $remarks = $row['remarks'];
                }
              ?>
              <div class="row">
                <div class="col-md-12">
                  <label><strong>Patient Assessment Registration Details</strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered text-dark">
                    <tbody>
                      <tr>
                        <td class="text-end">Registration.:</td>
                        <td><?= $registration_no; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end">Patient Name:</td>
                        <td><?= $name; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end">Date of Birth:</td>
                        <td><?= $date_of_birth; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end">Age:</td>
                        <td><?= $age; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end">Gender:</td>
                        <td><?= $gender; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end">Contact No.:</td>
                        <td><?= $guardian_contact; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end">Address:</td>
                        <td><?= $address; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end border">Email address of parent:</td>
                        <td class="border"><?= $guardian_email; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <label><strong>Patient Assessment Appointment Details</strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered text-dark">
                    <tbody>
                      <tr>
                        <td class="text-end">Assessment Outlet:</td>
                        <td><?= $assessment_outlet; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end">Assessment Date:</td>
                        <td><?= $assessment_sched; ?></td>
                      </tr>
                      <tr>
                        <td class="text-end border">Assessment Time:</td>
                        <td class="border"><?= $assessment_time; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6" >
            <div class="container-fluid card py-2">
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Present Impression / Diagnosis / Health Condition of Patient</strong></label>
                  <div class="form-check">
                  <input class="form-check-input border-dark" style="opacity: 1;" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" checked readonly>
                    <label class="form-check-label opacity-100" for="flexRadioDefault1">
                      <?= $diagnosis; ?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <hr class="my-0">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for=""><strong>Is the patient currently undergoing therapy?</strong></label>
                  <div class="form-check">
                  <input class="form-check-input border-dark" style="opacity: 1;" type="radio" name="flexRadioDefault2" id="flexRadioDefault1" checked readonly>
                    <label class="form-check-label opacity-100" for="flexRadioDefault1">
                    <?= $therapy; ?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <hr class="my-0">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for=""><strong>If undergoing therapy, where?</strong></label>
                  <div class="form-check">
                  <input class="form-check-input border-dark" style="opacity: 1;" type="radio" name="flexRadioDefault3" id="flexRadioDefault1" checked readonly>
                    <label class="form-check-label opacity-100" for="flexRadioDefault1">
                    <?= $therapy_location; ?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <hr class="my-0">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for=""><strong>Remarks</strong></label>
                  <div class="form-check">
                  <input class="form-check-input border-dark" style="opacity: 1;" type="radio" name="flexRadioDefault4" id="flexRadioDefault1" checked readonly>
                    <label class="form-check-label opacity-100" for="flexRadioDefault1">
                    <?= $remarks; ?>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <div class="col-md-2 p-0 " style="width:16%">
      <div class="container-fluid px-0">
        <div class="row">
          <div class="col-md-12">
            <a href="inquiries-view.php?id=<?= $_GET['id']; ?>"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button-active" style="">Inquirer/Appointment Details</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="inquiries-view-ass.php"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">View Assessment Form</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href=""><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">Assessment Report</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
