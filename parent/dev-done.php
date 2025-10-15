<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="inquire";
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
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="container card p-3 mt-4" style="width:700px;">
        <div class="row mb-2">
          <div class="col-md-12">
            <div class="container card p-3  fst-italic">
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Confirmation Required</strong></label>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="">Please confirm the following details before we proceed:</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Name of Patient: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Assessment schedule: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Date of Birth: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Age: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Gender: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Contact No: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Address: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for=""><strong>Email Address: </strong></label>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12">
                  <label for=""><strong>Chief complainant or concerns: </strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="">If you confirm, we will move forward with this action. If you need to make any changes, please cancel and update your information.</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
                <div class="col-md-6">
                  <a href="dev-frm.php" class="btn btn-primary">Back</a>
                </div>
                <div class="col-md-6 text-end">
                  <a href="" class="btn btn-success">Print</a>
                  <a href="inquire.php" class="btn btn-primary">Done</a>
                </div>
              </div>
      </div>
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
