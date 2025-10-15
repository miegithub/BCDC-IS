<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step1";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d');
 
?>
<style>
  .body{
    background-color: rgba(190, 190, 190);
  }
</style>
<style>

    #progressbar {
        list-style-type: none;
        padding: 0;
        display: flex;
        justify-content: space-between;
    }

    #progressbar li {
        text-align: center;
        width: 20%;
        position: relative;
    }

    #progressbar li::before {
        content: '';
        width: 30px;
        height: 30px;
        background-color: #ccc;
        border-radius: 50%;
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-family: Arial, sans-serif;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
    }

    #progressbar li.active::before {
        background-color: #040346;; /* Green for active step */
        content: '✔'; /* Check mark for active step */
    }

    #progressbar li strong {
        display: block;
        margin-top: 40px;
        color: black; /* Default text color */
    }

    #progressbar li.active strong {
        color: #040346;; /* Green text for active step */
    }

    /* Style the form fields */
    fieldset {
        display: none;
    }

    fieldset:first-of-type {
        display: block;
    }

    .action-button {
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 20px;
    }

    .previous {
        background-color: #ddd;
    }
</style>
<div class="container mw-100 p-3 m-0" style="width:100%;height:100%;">
  
  <div class="row px-4">
    <div class="col-md-12">
      <div class="text-center px-0 pt-5">
        <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
        <p class="pt-3" style="margin-bottom: 80px;"><strong>Here are the following steps to avail the program and make your child an official learner in BCDC:</strong></span> 
        </p>
        <div class="card">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="" id="s1"><strong>STEP 1</strong></li>
                <li id="s2"><strong>STEP 2</strong></li>
                <li id="s3"><strong>STEP 3</strong></li>
                <li id="s4"><strong>STEP 4</strong></li>
                <li id="s5"><strong>STEP 5</strong></li>
            </ul>
        </div>
        <fieldset>
            <p class="pt-5 text-center" style="margin-bottom: 70px" > <strong>Step 1: Fill out the Patient Registration Form </strong><br>(sagutan ang patient registration form)</p>
                  
        </fieldset>
        <fieldset>
            <p class="pt-5"><strong>Step 2:</strong> Patient Assessment Registration and Appointment Details <br></p>
            <div style="text-align: right; margin: 20px;">
                <button type="button" class="previous action-button">Previous</button>
                <button type="button" class="next action-button">Next</button>
            </div>
        </fieldset>
        <fieldset>
        <p class="pt-5"><strong>Step 3:</strong> Dr. Hazel Manabal-Reyes Developmental Assessment</p>
            
            <div style="text-align: right; margin: 20px;">
                <button type="button" class="previous action-button">Previous</button>
                <button type="button" class="next action-button">Next</button>
            </div>
        </fieldset>
        <fieldset>
        <p class="pt-5"><strong>Step 4:</strong> Assessment Report</p>
            <div style="text-align: right; margin: 20px;">
                <button type="button" class="previous action-button">Previous</button>
                <button type="button" class="next action-button">Next</button>
            </div>
        </fieldset>
        <fieldset>
        <p class="pt-5"><strong>Step 5: </strong> Patient Enrollee Evaluation</p>
        
            <div style="text-align: right; margin: 20px;">
                <button type="button" class="previous action-button">Previous</button>
                <button type="button" class="next action-button">Next</button>
            </div>
        </fieldset>
        
    </div>
    </div>
  </div>
  <?php
    
    if(isset($_POST['update_inquire'])){
      $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
      $registration_date = mysqli_real_escape_string($con, $_POST['registration_date']);
      $fname = mysqli_real_escape_string($con, $_POST['fname']);
      $lname = mysqli_real_escape_string($con, $_POST['lname']);
      $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
      $age = mysqli_real_escape_string($con, $_POST['age']);
      $gender = mysqli_real_escape_string($con, $_POST['gender']);
      $address = mysqli_real_escape_string($con, $_POST['address']);
      $parent_contact = mysqli_real_escape_string($con, $_POST['parent_contact']);
      $parent_name = mysqli_real_escape_string($con, $_POST['parent_name']);
      $diagnosis = mysqli_real_escape_string($con, $_POST['diagnosis']);
      $diagnosis_other = mysqli_real_escape_string($con, $_POST['diagnosis_other']);
      $remarks = mysqli_real_escape_string($con, $_POST['remarks']);
      $other = mysqli_real_escape_string($con, $_POST['other']);
      $therapy = mysqli_real_escape_string($con, $_POST['therapy']);
      $therapy_location = mysqli_real_escape_string($con, $_POST['therapy_location']);
      

      $name = $fname . " " . $lname;
      
      $query = "UPDATE `learner` SET `name`='$name',`fname`='$fname',`lname`='$lname',`registration_date`='$registration_date',`date_of_birth`='$date_of_birth',`age`='$age',`gender`='$gender',`contact_no`='$contact_no',`address`='$address',`diagnosis`='$diagnosis',`diagnosis_other`='$diagnosis_other',`therapy`='$therapy',`therapy_location`='$therapy_location',`remarks`='$remarks',`other`='$other',`guardian_name`='$parent_name',`guardian_contact`='$parent_contact' WHERE learnerID='$learnerID'";
      $query_run = mysqli_query($con, $query);

      if($query_run){
        $query1 = "SELECT learnerID FROM learner WHERE name='$name'";
        $query_run1 = mysqli_query($con, $query1);
        foreach($query_run1 as $row){
          $learnerID = $row['learnerID'];
        }
        $_SESSION['learnerID'] = $learnerID;
        header("Location: step1-review.php");
        exit(0); 
      }
    }


    $userID = $_SESSION['auth_user']['userID'];
    $query_check = "SELECT * FROM learner WHERE userID='$userID'";
    $query_check_run = mysqli_query($con,$query_check);
    if($query_check_run){
      if(mysqli_num_rows($query_check_run) > 0){
        
        $query1 = "SELECT * FROM learner WHERE userID='$userID'";
        $query_run1 = mysqli_query($con, $query1);
        foreach($query_run1 as $row){
          $_SESSION['learnerID'] = $row['learnerID'];
          
          $learnerID = $row['learnerID'];
          $registration_date = $row['registration_date'];
          $fname = $row['fname'];
          $lname = $row['lname'];
          $date_of_birth = $row['date_of_birth'];
          $age = $row['age'];
          $gender = $row['gender'];
          $address = $row['address'];
          $parent_contact = $row['guardian_contact'];
          $parent_name = $row['guardian_name'];
          $diagnosis = $row['diagnosis'];
          $diagnosis_other = $row['diagnosis_other'];
          $remarks = $row['remarks'];
          $other = $row['other'];
          $therapy = $row['therapy'];
          $therapy_location = $row['therapy_location'];
        }
        ?>
          
          <div class="row">
            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="container card b mw-100 m-0" style="width:99%;">
                  <div class="row pt-2" style="background-color:rgba(4, 3, 70);">
                    <div class="col-md-12 text-white">
                      <h2>Development and Behavioral Pediatrician Assessment Form (Walk-ins)</h2>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <h5 class="text-danger mb-0">Details of Patient</h5>
                      <hr class="hr m-0">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-2">
                      <label class="form-label fw-light">Date Today</label>
                      <input type="hidden" name="learnerID" class="form-control black-border" value="<?= $learnerID; ?>">
                      <input type="date" name="registration_date" class="form-control black-border" value="<?= $registration_date; ?>">
                    </div>
                    <div class="col-md-2">
                      <label class="form-label fw-light">Patient First Name</label>
                      <input type="text" name="fname" class="form-control black-border" value="<?= $fname; ?>" required>
                    </div>
                    <div class="col-md-2">
                      <label class="form-label fw-light">Patient Last Name</label>
                      <input type="text" name="lname" class="form-control black-border" value="<?= $lname; ?>" required>
                    </div>
                    <div class="col-md-2">
                      <label class="form-label fw-light">Date of Birth</label>
                      <input type="date" name="date_of_birth" class="form-control black-border" value="<?= $date_of_birth; ?>" required>
                    </div>
                    <div class="col-md-2">
                      <label class="form-label fw-light">Age</label>
                      <input type="number" name="age" class="form-control black-border" value="<?= $age; ?>" required>
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
                    <div class="col-md-3">
                      <label class="form-label fw-light">Patient Photo</label>
                      <input type="file" name="patient_photo" class="form-control black-border" value="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label fw-light">Address</label>
                      <input type="text" name="address" class="form-control black-border" value="<?= $address; ?>" required>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label fw-light">Name of Parent</label>
                      <input type="text" name="parent_name" class="form-control black-border" value="<?= $parent_name; ?>" required>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label fw-light">Contact of Parents</label>
                      <input type="number" name="parent_contact" class="form-control black-border" value="<?= $parent_contact; ?>" required>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <hr class="hr m-0">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-12">
                      <label class="form-label"><strong>Present Impression / Diagnosis / Health Condition Patient</strong></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="diagnosis" id="flexRadioDefault1" value="ADHD (Attention Deficit Hyperactivity Disorder)" required <?= ($diagnosis=="ADHD (Attention Deficit Hyperactivity Disorder)") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                        ADHD (Attention Deficit Hyperactivity Disorder)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="ASD (Autism Spectrum Disorder)" type="radio" name="diagnosis" id="flexRadioDefault2" required <?= ($diagnosis=="ASD (Autism Spectrum Disorder)") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                        ASD (Autism Spectrum Disorder)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="GDD (Global Developmental Delay)" type="radio" name="diagnosis" id="flexRadioDefault2" required <?= ($diagnosis=="GDD (Global Developmental Delay)") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                        GDD (Global Developmental Delay)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="Down Syndrome" type="radio" name="diagnosis" id="flexRadioDefault2" required <?= ($diagnosis=="Down Syndrome") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Down Syndrome
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="Speech and Language Delay" type="radio" name="diagnosis" id="flexRadioDefault2" required <?= ($diagnosis=="Speech and Language Delay") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Speech and Language Delay
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="others" type="radio" name="diagnosis" id="flexRadioDefault2" required <?= ($diagnosis=="others") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                        others
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="Not Available / Not yet Diagnosed" type="radio" name="diagnosis" id="flexRadioDefault2" required <?= ($diagnosis=="others") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Not Available / Not yet Diagnosed
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
                      <label class="form-label">If you answered "Others" please specify</label>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      <input type="text" name="diagnosis_other" class="form-control border-bottom" placeholder="Your answer" value="<?= $diagnosis_other; ?>">
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
                        <input class="form-check-input" type="radio" name="therapy" id="flexRadioDefault1" value="YES"  required <?= ($therapy=="YES") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                        YES
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="therapy" id="flexRadioDefault1" value="NOT YET" required <?= ($therapy=="NOT YET") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                        NOT YET
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
                      <label class="form-label"><strong>If undergoing therapy, where?</strong></label>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      <input type="text" name="therapy_location" class="form-control border-bottom" placeholder="Your answer" value="<?= $therapy_location; ?>">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <hr class="hr m-0">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-12">
                      <label class="form-label"><strong>Remarks</strong></label>
                      <div class="form-check">
                        <input class="form-check-input" value="Developmental and Behavioral Assessment" type="radio" name="remarks" id="flexRadioDefault1"  required <?= ($remarks=="Developmental and Behavioral Assessment") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                        Developmental and Behavioral Assessment
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="BCDC Enrollment" type="radio" name="remarks" id="flexRadioDefault1" required <?= ($remarks=="BCDC Enrollment") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                        BCDC Enrollment
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <hr class="hr m-0">
                    </div>
                  </div>
                  <!-- <div class="row mt-2">
                    <div class="col-md-12">
                      <label class="form-label"><strong>Other</strong></label>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      <input type="text" name="other" class="form-control border-bottom" placeholder="Your answer" value="<?= $other; ?>">
                    </div>
                  </div> -->
                  <div class="row mt-2 pb-2">
                    <div class="col-md-12 text-end">
                      <button type="submit" name="update_inquire" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <?php
      }
    }
  ?>
</div>
<script>
    // Initialize step navigation
    let currentStep = 0;
    const steps = document.querySelectorAll('fieldset');
    const progressbarItems = document.querySelectorAll('#progressbar li');
    
    // Show step based on current index
    function showStep(index) {
        steps.forEach((step, i) => {
            step.style.display = i === index ? 'block' : 'none';
        });
        progressbarItems.forEach((item, i) => {
            item.classList.toggle('active', i <= index);
        });
    }

    // Next and previous buttons functionality
    document.querySelectorAll('.next').forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    document.querySelectorAll('.previous').forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // Initialize the form on the first step
    showStep(currentStep);
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
