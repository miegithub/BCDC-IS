<?php

session_start();
include('config/dbcon.php');
$currentPage="student";
$hide_side="False";
include('../admin/includes/header.php');
include('../admin/includes/navbar.php');

 

if(isset($_POST['add_spl'])){
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $age = mysqli_real_escape_string($con, $_POST['age']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $position = mysqli_real_escape_string($con, $_POST['position']);

  $file_size =  get_size($_FILES['employee_photo']['size']);
  $file_extension = pathinfo($_FILES['employee_photo']['name'], PATHINFO_EXTENSION);
  $file_name = $_FILES['employee_photo']['name'];
  $allowed_extension = ['png','jpeg', 'jpg','webp'];
  $file_path = 'images';
  $file_temp = $_FILES['employee_photo']['tmp_name'];

  $query_insert_spl = "INSERT INTO dev.`user`(`fname`, `lname`, `date_of_birth`, `gender`, `EMAIL`, `contact_no`, `address`, `position`, `image_name`, age) VALUES ('$fname','$lname','$date_of_birth','$gender','$email','$contact_no','$address','$position','$file_name' , '$age')";
  $query_insert_spl_run = mysqli_query($con, $query_insert_spl);

  if($query_insert_spl_run){
    echo '
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(56, 174, 89);">
          <div class="modal-body text-center">
            <h5 class="text-white">Service Partner Added Successfully!</h5>
          </div>
          <div class="modal-footer">
            <a href="spl-add.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
          </div>
        </div>
      </div>
    </div>';
  }
  else{
    echo '
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content bg-danger" style="">
          <div class="modal-body text-center">
            <h5 class="text-white">Something Went Wrong1!</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
          </div>
        </div>
      </div>
    </div>';

  }

}

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
<div class="container mw-100 p-3 m-0" style="width:100%;height:100vh; background-color: rgba(190, 190, 190);">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <form action="" method="post" enctype="multipart/form-data">
        
        <div class="container card b mw-100 m-0" style="width:99%;">
          <div class="row bg-primary pt-2">
            <div class="col-md-6 text-white">
              <h2>Add Service Partner</h2>
            </div>
            <div class="col-md-6 text-end pt-1">
              <a href="spl.php" class="text-white">Back</a>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h5 class="text-danger mb-0">Employee Details</h5>
              <hr class="hr m-0">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <label class="form-label fw-light">First Name</label>
              <input type="text" name="fname" class="form-control black-border" required>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-light">Last Name</label>
              <input type="text" name="lname" class="form-control black-border" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Date of Birth</label>
              <input type="date" name="date_of_birth" class="form-control black-border" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Sex</label>
                <select class="form-select" name="gender" aria-label="example" required>
                  <option selected hidden></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">Email</label>
              <input type="email" name="email" class="form-control black-border" required>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-light">Age</label>
              <input type="number" name="age" class="form-control black-border" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Contact No.</label>
              <input type="text" name="contact_no" class="form-control black-border" required>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-light">Address</label>
              <input type="text" name="address" class="form-control black-border" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label fw-light">Position</label>
                <select class="form-select" name="position" aria-label="example" required>
                  <option selected hidden></option>
                  <option value="Admin">Admin</option>
                  <option value="Head Teacher">Head Teacher</option>
                  <option value="Teachers">Teachers/Therapist</option>
                  <option value="Developmental Pediatrician">Developmental Pediatrician</option>
                </select>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-light">Employee Photo</label>
              <input type="file" name="employee_photo" class="form-control black-border">
            </div>
          </div>
          <div class="row mt-2 pb-2">
            <div class="col-md-12">
              <button type="submit" name="add_spl" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </form>
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

    function showRegistration() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'block'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname1'));
        myModal.show();
      });
    }
    function showParent() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname2'));
        myModal.show();
      });
    }
    function showUpdated() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname3'));
        myModal.show();
      });
    }
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
