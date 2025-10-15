<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="inquire";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
?>

<div class="container">
  <div class="row ">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
        <img src="../images/login_logo.jpg" alt="" style="width:450px;height:150px">
        
    </div>
    
  </div>
  <div class="row text-center mt-2">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
        <h5 class=" mb-0 pb-0">BIÑAN CITY DEVELOPMENT CENTER</h5>
    </div>
  </div>
  <div class="row text-center mt-0 pt-0">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
        <p class="fst-italic">Nurturing Childen, Empowering Families</p>
    </div>
  </div>
  <div class="row">
    <div class="cola-md-12 text-end">
      <a href="inquire-fill.php" class="btn btn-primary">Fill-out</a>
    </div>
  </div>
</div>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
