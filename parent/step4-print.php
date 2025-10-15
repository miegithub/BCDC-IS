<?php
ob_start();
session_start();
include('../admin/config/dbcon.php');
$currentPage="step4";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

if(!isset($_SESSION['learnerID'])){
  #ob_end_flush();
  #header("Location: inquiries.php");
  #exit(0);
}
?>
<style>
  .main{
    background-color: white;
  }
  .right-button-active{
    font-size: 10px;
    padding: 9px 7px;
    border: 1px solid black;
    margin-left: -1px;
    box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.2);
  }
  .right-button{
    font-size: 10px;
    padding: 9px 7px;
    color: rgba(0, 134, 188);
  }
  .form-control{
    border: none;
  }
</style>
<div class="container">
  <div class="row mt-2 ">
    <div class="col-md-6">
      <h1>Assessment Report</h1>
    </div>
    <div class="col-md-6 text-end">
      <a href="step5.php" class="btn btn-primary me-2">Next</a>
    </div>
    <hr>
  </div>
  
  <div class="row">
    <div class="col-md-12 hv-100">
      <iframe src="../admin/pdf/assessment.pdf" class="w-100 mw-100" frameborder="0" style="height:660px;"></iframe>
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
