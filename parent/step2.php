<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step2";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

$userID = $_SESSION['auth_user']['userID'];
$update_redirect = "UPDATE user SET redirect='2' WHERE ID='$userID'";
mysqli_query($con,$update_redirect);
$query1 = "SELECT learnerID FROM learner WHERE userID='$userID'";
$query_run1 = mysqli_query($con, $query1);
foreach($query_run1 as $row){
  $_SESSION['learnerID'] = $row['learnerID'];
}
?>
<style>
  table {
            border-collapse: collapse;
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 9px;
        }
        td, strong {
          color:black;
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
        background-color: #040346; /* Green for active step */
        content: '✔'; /* Check mark for active step */
    }

    #progressbar li strong {
        display: block;
        margin-top: 40px;
        color: black; /* Default text color */
    }

    #progressbar li.active strong {
        color: #040346; /* Green text for active step */
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
<div class="container p-5">
  <div class="row px-4">
    <div class="col-md-12">
      <div class="text-center px-0 pt-5">
        <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
        <p class="pt-3" style="margin-bottom: 70px"><strong>Here are the following steps to avail the program and make your child an official learner in BCDC:</strong></span> 
        </p>
        <div class="card">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="" id="s1"><strong>STEP 1</strong></li>
                <li id="s2" class="active"><strong>STEP 2</strong></li>
                <li id="s3"><strong>STEP 3</strong></li>
                <li id="s4"><strong>STEP 4</strong></li>
                <li id="s5"><strong>STEP 5</strong></li>
            </ul>
        </div>
        <fieldset>
        <p class="pt-5" style="margin-bottom: 70px"><strong>Step 2: Please wait for 3 working days to receive the assessment appointment details of the patient.</strong> <br>
        (Maghintay ng tatlong araw upang matanggap ang assessment appointment ng pasyente.)</p>
        </fieldset>
       
        <fieldset>
        <p class="pt-5" style="margin-bottom: 70px"><strong>Step 2: Please wait for 3 working days to receive the assessment appointment details of the patient.</strong> <br>
        (Maghintay ng tatlong araw upang matanggap ang assessment appointment ng pasyente.)</p>
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
  <div class="row mb-4">
    <div class="col-md-12">
      
      <div class="container-fluid shadow card p-4 ps-5 pe-5" >
        <div class="row mb-3">
          <div class="col-md-12">
            <h5>Patient Assessment Registration and Appointment Details</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr class="hr m-0">
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-12 text-end">
            <!-- <label><strong>Registration Date: </strong>September 9, 2024</label> -->
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for=""><strong>Patient Assessment Registration Details</strong></label>
          </div>
          <div class="col-md-6">
            <label for=""><strong>Patient Assessment Appointment Details</strong></label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <table class="border w-100">
              <tbody>
                <?php
                  $learnerID = $_SESSION['learnerID'];
                  $reg_no = null;
                  $name = null;
                  $date_of_birth = null;
                  $age = null;
                  $gender = null;
                  $contact_no = null;
                  $address = null;
                  $parent_email = null;
                  $query = "SELECT * FROM learner WHERE learnerID='$learnerID'";
                  $query_run = mysqli_query($con, $query);
                  if($query_run){
                    if(mysqli_num_rows($query_run) > 0){
                      foreach($query_run as $row){
                        $learnerID = $row['learnerID'];
                        $name = $row['name'];
                        $date_of_birth = $row['date_of_birth'];
                        $age = $row['age'];
                        $gender = $row['gender'];
                        $parent_contact = $row['guardian_contact'];
                        $address = $row['address'];
                        $parent_email = $row['guardian_email'];
                      }
                    }
                  }
                ?>
                <tr>
                  <td class="text-end w-50"><strong>Registration No.:</strong></td>
                  <td><?= $learnerID; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Patient Name:</strong></td>
                  <td><?= $name; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Date of Birth:</strong></td>
                  <td><?= $date_of_birth; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Age:</strong></td>
                  <td><?= $age; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Gender:</strong></td>
                  <td><?= $gender; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Contact No.:</strong></td>
                  <td><?= $parent_contact; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Address:</strong> </td>
                  <td><?= $address; ?></td>
                </tr>
                <tr>
                  <td class="text-end border border-black"><strong>Email Address of Parent:</strong></td>
                  <td class=" border border-black"> <?= $parent_email; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <table class="border w-100 mb-5">
              <tbody>
                <?php
                  $reg_no = null;
                  $name = null;
                  $date_of_birth = null;
                  $age = null;
                  $gender = null;
                  $contact_no = null;
                  $address = null;
                  $parent_email = null;
                  $parent_assessment_schedemail = null;
                  $assessment_outlet = null;
                  $assessment_time = null;
                  $userID = $_SESSION['auth_user']['userID'];
                  $have_patient = '<p class="text-black-50 " style="font-size: 0.75rem;">No patient assessment appointment details have been displayed yet, 
                  please wait for 3 working days for the head teacher to review your record.</p>';

                  $working_button='onclick="event.preventDefault();"';
                  $bg_disabled = "btn-secondary";
                  $query = "SELECT * FROM learner WHERE userID='$userID'";
                  $query_run = mysqli_query($con, $query);
                  if($query_run){
                    if(mysqli_num_rows($query_run) > 0){
                      foreach($query_run as $row){
                        $learnerID = $row['learnerID'];
                        $name = $row['name'];
                        $date_of_birth = $row['date_of_birth'];
                        $age = $row['age'];
                        $gender = $row['gender'];
                        $parent_contact = $row['guardian_contact'];
                        $address = $row['address'];
                        $parent_email = $row['guardian_email'];
                        $assessment_sched = $row['assessment_sched'];
                        $assessment_outlet = $row['assessment_outlet'];
                        $assessment_time = $row['assessment_time'];
                      }
                    }
                  }
                  $query_have_patient = "SELECT * FROM learner WHERE learnerID='$learnerID' and assessment_sched is not null and trigger_ht='1'";
                  $query_have_patient_run = mysqli_query($con,$query_have_patient);
                  if(mysqli_num_rows($query_have_patient_run) >0){
                    $working_button="";
                    $bg_disabled="btn-primary";
                    $have_patient = '<p class="text-black-50" style="font-size: 0.75rem;">The head teacher has reviewed your record and provided you with the assesssment appointment
                    details. Please fill out another form of Developmental Assessment.</p>';

                   
                  }
                ?>
                <tr>
                  <td class="text-end w-50"><strong>Assessment Outlet:</strong></td>
                  <td><?= $assessment_outlet; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Assessment Date:</strong></td>
                  <td><?= $assessment_sched; ?></td>
                </tr>
                <tr>
                  <td class="text-end border border-black"><strong>Assessment Time:</strong></td>
                  <td class=" border border-black"><?= $assessment_time; ?></td>
                </tr>
              </tbody>
            </table>
            <h5 class="text-center"><?= $have_patient; ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-end">
      <a href="step1.php" class="btn " style="background-color:rgba(119, 164, 218); width:100px;">Previous</a>
      <a href="step3.php" class="btn <?= $bg_disabled; ?> " <?= $working_button; ?> style="width:100px;">Next</a>
    </div>
  </div>
</div>
<script>
    // Initialize step navigation
    let currentStep = 0;
    if(<?= mysqli_num_rows($query_have_patient_run) ?> >0 ){
      currentStep = 1;
    }
    
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
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
