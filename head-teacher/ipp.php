<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="learner-batch";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 if(!isset($_SESSION['long_term_target'])){
  $long_term_target = null;
 }
 else{
  $long_term_target=$_SESSION['long_term_target'];
 }
 
 $learnerID= $_GET['id'];
?>
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

<div class="container mw-100 p-3 m-0 bg-white" style="width:100%;height:100%;">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
    <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h2>LEARNER DOCUMENT RECORD</h2>
          </div>
          <div class="col-md-6 text-end">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr class="text-dark" style="border-bottom: 2px solid black;">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 d-flex">
            <nav class="navbar navbar-expand-lg navbar-light pb-0">
                <div class="container-fluid ps-0 ms-0">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                      <li class="nav-item">
                        <a href="ass-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Assessment Report</a>
                      </li>
                      <li class="nav-item">
                        <a href="ipp.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link active active-btn text-white">Individualized Program Plan (IPP)</a>
                      </li>
                      <li class="nav-item">
                        <a href="progress-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Progress Report</a>
                      </li>
                      <li class="nav-item">
                        <a href="narrative-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Narrative Progress Report</a>
                      </li>
                    </ul>
                  </div>
                </div>
            </nav>
          </div>
        </div>
        <div class="row"> 
          <div class="col-md-12">
          <iframe src= "pdf_ipp.php?id=<?= $_GET['id']; ?>" class="w-100 mw-100" frameborder="0" style="height:660px;"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  new DataTable('#example');
</script>

<script>
  function setHiddenValue() {
    // Get the value of the textarea
    var longTermTarget = document.getElementById("long_term_target").value;
    var ipp_date = document.getElementById("ipp_date").value;
    // Set the hidden input value to match the textarea
    document.getElementById("hidden_long_term_target").value = longTermTarget;
    document.getElementById("hidden_ipp_date").value = ipp_date;
    document.getElementById("hidden_long_term_target1").value = longTermTarget;
    document.getElementById("hidden_ipp_date1").value = ipp_date;
  }
</script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
