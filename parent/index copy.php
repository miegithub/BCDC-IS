<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="index";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
?>
<div class="container">
  <div class="row ">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
        <img src="../images/parent_home.png" alt="" style="width:100%;">
    </div>
  </div>
  <div class="row ">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
        <img src="../images/parent_home1.png" alt="" style="width:100%;">
    </div>
  </div>
  <div class="row ">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
        <img src="../images/prent_home2.png" alt="" style="width:100%;">
    </div>
  </div>
  <div class="row ">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
        <img src="../images/parent_home3.png" alt="" style="width:100%;">
    </div>
  </div>
  <div class="row ">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
        <img src="../images/parent_home4.png" alt="" style="width:100%;">
    </div>
  </div>
</div>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
