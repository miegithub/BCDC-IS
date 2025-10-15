<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="dev";
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
<div class="container mw-100 p-3 m-0" style="width:100%;height:100%;background-color: rgba(190, 190, 190);">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <?php
        
        $fname = null;
        $lname = null;
        $date_of_birth = null;
        $age = null;
        $gender = null;
        $address =  null;
        $parent_email = null;
        $parent_contact = null;
        $concern = null;
        
        
        if(isset($_POST['submit_assessment'])){
          
          $error="false";
          $fname = mysqli_real_escape_string($con, $_POST['fname']);
          $lname = mysqli_real_escape_string($con, $_POST['lname']);
          $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
          $age = mysqli_real_escape_string($con, $_POST['age']);
          $gender = mysqli_real_escape_string($con, $_POST['gender']);
          $address = mysqli_real_escape_string($con, $_POST['address']);
          $parent_contact = mysqli_real_escape_string($con, $_POST['parent_contact']);
          $parent_email = mysqli_real_escape_string($con, $_POST['parent_email']);
          $concern = mysqli_real_escape_string($con, $_POST['diagnosis']);

          $name = $fname . " " . $lname;
          
          $query = "";
          $query_run = mysqli_query($con, $query);

          if($query_run){
            header("Location: dev-done.php");
            exit(0); 
          }
        }
      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="container card b mw-100 m-0" style="width:99%;">
          <div class="row pt-2" style="background-color:rgba(4, 3, 70);">
            <div class="col-md-12 text-white">
              <h2>BCDC -Dr. Hazel Manabal-Reyes Developmental Assessment </h2>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h5 class="text-danger mb-0">Details of Patient</h5>
              <hr class="hr m-0">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">Patient First Name</label>
              <input type="text" name="fname" class="form-control black-border" value="<?= $fname; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Patient Last Name</label>
              <input type="text" name="lname" class="form-control black-border" value="<?= $lname; ?>" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Date of Birth</label>
              <input type="date" name="date_of_birth" class="form-control black-border" value="<?= $date_of_birth; ?>" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Age</label>
              <input type="text" name="age" class="form-control black-border" value="<?= $age; ?>" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Gender of Patient</label>
                <select class="form-select" name="gender" aria-label="example" required>
                  <option selected hidden><?= $gender; ?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-5">
              <label class="form-label fw-light">Address</label>
              <input type="text" name="address" class="form-control black-border" value="<?= $address; ?>" required>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-light">Email Addres of Parent</label>
              <input type="email" name="parent_email" class="form-control black-border" value="<?= $parent_email; ?>" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Contact of Parents</label>
              <input type="text" name="parent_contact" class="form-control black-border" value="<?= $parent_contact; ?>" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <hr class="hr m-0">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="form-label"><strong>Chief complainant or concerns (Problema ng bata)</strong></label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="concern" id="flexRadioDefault1" value="initial" required>
                <label class="form-check-label" for="flexRadioDefault1">
                Initial evaluation for speech, behavior or learning problem (unang makikita ng doktor)
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" value="reevaluation" type="radio" name="concern" id="flexRadioDefault2" required>
                <label class="form-check-label" for="flexRadioDefault2">
                Re-evaluation (Nakita na ng developmental pediatrician)
                </label>
              </div>
              
            </div>
          </div>
          
          <div class="row mt-2 pb-2">
            <div class="col-md-12 text-end">
            <!--<button type="submit" name="submit_assessment" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Submit</button>-->
              <a href="dev-done.php" class="btn btn-primary">Submit</a>
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
