<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="profile";
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
<div class="container mw-100 p-3 m-0" style="width:100%;height:100vh;background-color: rgba(190, 190, 190);">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-12">
            <h1>My Profile</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr class="hr fw-bold">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="container">
              <div class="row">
                <div class="col-md-3 d-flex justify-content-center align-item-center p-4">
                  <img src="../images/girl.png" class="border" alt="" style="width:150px;heigth:150px;">
                </div>
                <div class="col-md-9">
                  <div class="container">
                    <?php
                      $userID= $_SESSION['auth_user']['userID'];
                      $query = "SELECT * FROM user WHERE ID='$userID'";
                      $query_run = mysqli_query($con,$query);
                      
                      if($query_run){
                        if(mysqli_num_rows($query_run) > 0){
                          foreach($query_run as $row){
                            $name=$row['NAME'];
                            $position=$row['position'];
                            $age=$row['age'];
                            $gender=$row['gender'];
                            $address=$row['address'];
                            $contact=$row['contact_no'];
                            $date_of_birth=$row['date_of_birth'];
                            $EMAIL=$row['EMAIL'];
                          }
                        }
                      }
                    ?>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for=""><strong>Name: </strong> <?= $name; ?></label>
                      </div>
                      <div class="col-md-6">
                        <label for=""><strong>Address: </strong> <?= $address; ?></label>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for=""><strong>Position: </strong> Teacher</label>
                      </div>
                      <div class="col-md-6">
                        <label for=""><strong>Contact No.: </strong> <?= $contact; ?></label>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for=""><strong>Age: </strong> <?= $age; ?> years old</label>
                      </div>
                      <div class="col-md-6">
                        <label for=""><strong>Date of Birth: </strong> <?= date('F j, Y', strtotime($date_of_birth)); ?></label>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for=""><strong>Status: </strong> <span class="text-success">Active</span></label>
                      </div>
                      <div class="col-md-6">
                        <label for=""><strong>Email: </strong> <?= $EMAIL; ?></label>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <label for=""><strong>Sex: </strong> <?= $gender; ?></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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


<script>
  new DataTable('#example');
</script>
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
