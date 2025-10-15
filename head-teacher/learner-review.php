<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="review_l";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d');
 
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
      <?php
        $name = null;
        $date_of_birth = null;
        $age = null;
        $gender = null;
        $address = null;
        $guardian_name = null;
        $guardian_contact = null;
        $diagnosis = null;
        $diagnosis_other = null;
        $remarks = null;
        $other = null;
        $therapy = null;
        $therapy_location = null;
        $learnerID=$_GET['id'];
        $query = "SELECT * FROM learner WHERE learnerID='$learnerID' ";
        $query_run = mysqli_query($con, $query);
        if($query_run){
          if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $row){
              $name = $row['name'];
              $date_of_birth = $row['date_of_birth'];
              $age = $row['age'];
              $gender = $row['gender'];
              $address = $row['address'];
              $guardian_name = $row['guardian_name'];
              $guardian_contact = $row['guardian_contact'];
              $diagnosis = $row['diagnosis'];
              if($row['diagnosis_other'] == null){
                $diagnosis_other = "N/A";
              }
              else{
                $diagnosis_other = $row['diagnosis_other'];
              }
              $therapy = $row['therapy'];
              if($row['therapy_location'] == null){
                $therapy_location = "N/A";
              }
              else{
                $therapy_location = $row['therapy_location'];
              }
              $remarks = $row['remarks'];
              $other = $row['other'];

              $trigger_ht = $row['trigger_ht'];
            }
          }
        }
      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="container card b mw-100 m-0" style="width:99%;">
          <div class="row pt-2 " style="">
            <div class="col-md-12 border-bottom">
              <h2>Development and Behavioral Pediatrician Assessment Form (Walk-ins)</h2>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h5 class="text-danger mb-0">Details of Patient</h5>
              <hr class="hr m-0">
            </div>
          </div>
          <div class="row p-3">
            <div class="col-md-2">
              <img src="../images/girl.png" class="border border-danger" alt="" style="width:160px;">
            </div>
            <div class="col-md-10">
              <div class="container-fluid px-0">
                <div class="row mb-2">
                  <div class="col-md-4">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Registration No.:</strong></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputPassword" value="<?= $learnerID; ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-4 col-form-label pe-0"><strong>Patient Name:</strong></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword" value="<?= $name; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-5 col-form-label px-0"><strong>Date of Birth:</strong></label>
                      <div class="col-sm-7">
                        <input type="date" class="form-control" id="inputPassword" value="<?= $date_of_birth; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-4 col-form-label px-0"><strong>AGE:</strong></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword" value="<?= $age; ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Gender of Patient:</strong></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputPassword" value="<?= $gender; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label pe-0"><strong>Address:</strong></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" value="<?= $address; ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-4 col-form-label pe-0"><strong>Name of Parent:</strong></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword" value="<?= $guardian_name; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-5 col-form-label pe-0"><strong>Contact No. of Parent:</strong></label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword" value="<?= $guardian_contact; ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <hr class="hr m-0">
            </div>
          </div>
          <div class="row mt-2">
            <div class="container-fluid border">
              <div class="row">
                <label class="form-label"><strong>Present Impression / Diagnosis / Health Condition Patient</strong></label>
                <div class="form-check">
                  <input class="form-check-input border ms-3" type="radio" name="diagnosis" id="flexRadioDefault1" value="adhd" readonly checked>
                  <label class="form-check-label" for="flexRadioDefault1">
                  <?= $diagnosis; ?>
                  </label>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <hr class="hr m-0">
                </div>
              </div>  
              <div class="row mt-2">
                <div class="col-md-12">
                  <label class="form-label">If answered "Others"</label>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-4">
                  <input type="text" name="diagnosis_other" class="form-control border-bottom" placeholder="" value="<?= $diagnosis_other; ?>" readonly>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <hr class="hr m-0">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <label class="form-label"><strong>Is the patient currently undergoing therapy?</strong></label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="therapy" id="flexRadioDefault1" value="NO"  readonly checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                    <?= $therapy; ?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <label class="form-label"><strong>If undergoing therapy, where?</strong></label>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-4">
                  <input type="text" value="<?= $therapy_location; ?>" name="therapy_location" class="form-control border-bottom" placeholder="" readonly>
                </div>
              </div>
              <div cl`ass="row mt-3">
                <div class="col-md-12">
                  <hr class="hr m-0">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <label class="form-label"><strong>Remarks</strong></label>
                  <div class="form-check">
                    <input class="form-check-input" value="developmental" type="radio" name="remarks" id="flexRadioDefault1"  readonly checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                    <?= $remarks; ?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <hr class="hr m-0">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <label class="form-label"><strong>Other</strong></label>
                </div>
              </div>
              <div class="row mt-2 mb-2">
                <div class="col-md-4">
                  <input type="text" name="other" class="form-control border-bottom" placeholder="" value="<?= $other; ?>" readonly>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="row mt-2 pb-2">
            <div class="col-md-12 text-end">
              <a href="learner-reviewlist.php?id=<?= $learnerID; ?>" class="btn btn-primary" >Done</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
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
