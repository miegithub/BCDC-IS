<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step3";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

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
        <p class="pt-3"  style="margin-bottom: 70px"><strong>Here are the following steps to avail the program and make your child an official learner in BCDC:</strong></span> 
       </p>
       <!-- </div> -->
       
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
        <div class="mt-5"></div>
        <fieldset>
          <p class="pt-5"><strong>Step 2:</strong> Patient Assessment Registration and Appointment Details <br></p>
        </fieldset>
        <fieldset>
        <!-- <p class="pt-5"><strong>Step 3:</strong> Dr. Hazel Manabal-Reyes Developmental Assessment</p> -->
        </fieldset>
        <fieldset>
          <!-- <p class="pt-5"><strong>Step 3:</strong> Dr. Hazel Manabal-Reyes Developmental Assessment</p> -->
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
            dito magsho show yung ,enrollment step 5 patient evaluation !comment only  
            <div style="text-align: right; margin: 20px;">
                <button type="button" class="previous action-button">Previous</button>
                <button type="button" class="next action-button">Next</button>
            </div>
        </fieldset>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      
      <div class="container-fluid card p-4 ps-5 pe-5" >
        <div class="row mb-3">
          <div class="col-md-12 border border-danger p-2 text-center">
            <h5 style="font-size:17px;"><strong>Please review the details of your assessment registration. Keep in mind that this registration is non-transferable.</strong></h2>
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
                  $learnerID = $_SESSION['learnerID'];
                  $reg_no = null;
                  $name = null;
                  $date_of_birth = null;
                  $age = null;
                  $gender = null;
                  $contact_no = null;
                  $address = null;
                  $parent_email = null;
                  $have_patient= "No patient assessment appointment details have been displayed yet, your record
            is still under review by the head teacher";
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
                        $assessment_outlet = $row['assessment_outlet'];
                        $assessment_date = $row['assessment_sched'];
                        $assessment_time = $row['assessment_time'];
                        $chief_complain = $row['chief_complain'];
                        $have_patient = "The head teacher has reviewed your record and provided you with the assesssment appointment
 details. Please fill out another form of Dr. Hazel Manabal Reyes  Developmental Assessment";
                      }
                    }
                  }
                ?>
                <tr>
                  <td class="text-end w-50"><strong>Assessment Outlet:</strong></td>
                  <td><?= $assessment_outlet; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Assessment Date:</strong></td>
                  <td><?= $assessment_date; ?></td>
                </tr>
                <tr>
                  <td class="text-end"><strong>Assessment Time:</strong></td>
                  <td><?= $assessment_time; ?></td>
                </tr>
                <tr>
                  <td class="text-end border border-black"><strong>Chief complainant or concerns:</strong></td>
                  <td class=" border border-black"><?= $chief_complain; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row pb-5">
          <div class="col-md-6">
            <a href="" class="btn btn-primary">Back</a>
          </div>
          <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
            Confirm
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <h5>Assessment Appointment Confirmed</h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <p>You have sucessfully scheduled an appointment in <?= $assessment_outlet; ?>, <?= $assessment_date; ?> at <?= $assessment_time; ?>, please print out or present the patient assessment appointment on the day of your scheduled assessment.</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 text-end">
                          <a href="step3-input.php" class="btn btn-primary" >Next</a>
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
</div>

<script>
    // Initialize step navigation
    let currentStep = 2;
    
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
