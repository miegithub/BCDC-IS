<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step5";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d');
 

$userID = $_SESSION['auth_user']['userID'];
$update_redirect = "UPDATE user SET redirect='5' WHERE ID='$userID'";
mysqli_query($con,$update_redirect);
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
<div class="container mw-100 p-3 m-0" style="width:100%;height:100%;">
  <div class="row  px-4">
      <div class="col-md-12 text-center px-4 mt-3 mb-2">
          <div class=" px-0 pt-5">
              <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
              <p class="pt-3" style="margin-bottom: 80px";><strong>
              Here are the following steps to avail the program and make your child an official learner in BCDC: </strong></p>
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
              <p class="pt-5"><strong>Step 5: Please wait for 7 working days to know if the patient is approved to become an official learner in Biñan City Development Center (BCDC). <br> </strong>(Mangyaring maghintay ng pitong araw upang malaman kung ang pasyente ay kwalipikado bilang isang opisyal na mag-aaral ng Biñan City Development Center (BCDC).)</p>
              </fieldset>
              <fieldset>
              <!-- <p class="pt-5"><strong>Step 5: Patient Enrollee Evaluation</strong> </p> -->
              </fieldset>
              
          </div>
      </div>
  </div>
  <?php
    $userID = $_SESSION['auth_user']['userID'];
    
    $query_check = "SELECT * FROM user WHERE ID='$userID' ";
    $query_check_run = mysqli_query($con,$query_check);

    if($query_check_run){
      if(mysqli_num_rows($query_check_run) > 0){
        foreach($query_check_run as $row){
          $contact_no = $row['contact_no'];
        }
      }
    }
    $query_check = "SELECT * FROM learner WHERE userID='$userID' ";
    $query_check_run = mysqli_query($con,$query_check);

    if($query_check_run){
      if(mysqli_num_rows($query_check_run) > 0){
        foreach($query_check_run as $row){
          $learnerID = $row['learnerID'];
          $registration = $row['registration_no'];
          $patient_name = $row['guardian_name'];
          $diagnosis = $row['diagnosis'];
          $date_of_birth = $row['date_of_birth'];
          $age = $row['age'];
          $gender = $row['gender'];
          //$contact_no = $row['contact_no'];
          $address = $row['address'];
          $parent_email = $row['guardian_email'];
          $enrolled_date = $row['enrolled_date'];
          //$learner_batch = $row[''];
          //$therapy_start_date = $row[''];
          $teacher_in_charge = $row['teacher_incharge'];
          //$shadow = $row[''];
          $session_schedule = $row['assessment_sched'];
          $approved = $row['approved'];
        }
        if($approved==1){
          ?>
          <div class="row">
            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
              <?php
                $userID = $_SESSION['auth_user']['userID'];
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="container card b mw-100 m-0 mt-5" style="width:99%;">
                  <div class="row pt-2">
                    <div class="col-md-12 text-dark">
                      <h2>Patient Evaluation</h2>
                      <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="container-fluid">
                        <div class="row  mb-4">
                          <div class="col-md-7">
                            <div class="container-fluid">
                              <div class="row mb-3">
                                <div class="col-md-4">
                                  <img src="../images/girl.png" alt="" style="width:150px;border:5px solid rgba(232, 72, 111);">
                                </div>
                                <div class="col-md-7">
                                  <p>Your child is officially enrolled at Binan City Development Center. The head teacher evaluate your child’s assessment and the doctor's recommendation is fits to the BCDC program.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <table class="table table-bordered">
                                    <tbody>
                                      <tr>
                                        <td style="width: 50%;">Registration:</td>
                                        <td style="width: 50%;"><?= $userID; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Patient Name:</td>
                                        <td><?= $patient_name; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Diagnosis:</td>
                                        <td><?= $diagnosis; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Date of Birth:</td>
                                        <td><?= $date_of_birth; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Age:</td>
                                        <td><?= $age; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Gender:</td>
                                        <td><?= $gender; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Contact No.:</td>
                                        <td><?= $contact_no; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Address:</td>
                                        <td><?= $address; ?></td>
                                      </tr>
                                      <tr>
                                        <td class="border" style="width: 50%;">Email address of parent:</td>
                                        <td class="border" style="width: 50%;"><?= $parent_email; ?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="col-md-6">
                                  <table class="table table-bordered">
                                    <tbody>
                                      <tr>
                                        <td style="width: 50%;">Date Enrolled:</td>
                                        <td style="width: 50%;"><?= $enrolled_date; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Learner Batch:</td>
                                        <td><?= "Batch 34"; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Therapy Start Date:</td>
                                        <td><?= "Monday, 01/05/2024"; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Teacher In-charge:</td>
                                        <td><?= $teacher_in_charge; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Shadow:</td>
                                        <td><?= "Ella Hillario"; ?></td>
                                      </tr>
                                      <tr>
                                        <td class="border">Session Schedule:</td>
                                        <td class="border"><?= $session_schedule; ?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                          <div class="container-fluid border border-dark h-100" >
                            <div class=""style="height: 90%;">
                              <div class="row border border-dark" style="background-color:rgba(217, 217, 217)">
                                <div class="col-md-12 ">
                                  <label class="fw-bold fs-5">Dr. Hazel Gertrude Manabal-Reyes</label>
                                  <label for="" class="fst-italic">Developmental and Behavioral Pediatrics</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <label for="" class="fw-lighter">Recommendation:</label>
                                </div>
                              </div>




                              <div class="row">
                                <div class="col-md-12">
                                 <?php
                                    $query = "SELECT * FROM learner_ass WHERE learnerID='$learnerID'";
                                    $query_run = mysqli_query($con,$query);
                                    foreach($query_run as $row){
                                      $recommendation = $row['recommendation'];
                                    }
                                  ?>
                                  <p><?= $recommendation; ?></p>
                                  
                                </div>
                              </div>
                              
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 text-end mt-3">
                                  <!-- <button class="btn text-white" style="background:rgba(4, 3, 70)">View entire assessment</button> -->
                                   <a href="ass-report.php?id=<?= $learnerID; ?>" class="btn text-white" style="background:rgba(4, 3, 70)">View entire assessment</a>
                                </div>
                              </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
          <div class="row mt-2 px-4">
            <div class="col-md-12 text-end">
              <a href="step4-ass-result.php" class="btn " style="background-color:rgba(208, 208, 208); width:100px;">Previous</a>
              <a href="ass-report.php?id=<?= $learnerID; ?>" class="btn text-white" style="background-color:rgba(52, 149, 247);width:100px;">Done</a>
            </div>
          </div>
          <?php

        }
        else if($approved==2){
          ?>
          <div class="row">
            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
              <?php
                $userID = $_SESSION['auth_user']['userID'];
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="container card b mw-100 m-0" style="width:99%;">
                  <div class="row pt-2">
                    <div class="col-md-12 text-dark">
                      <h2>Patient Evaluation</h2>
                      <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="container-fluid">
                        <div class="row  mb-4">
                          <div class="col-md-7">
                            <div class="container-fluid">
                              <div class="row mb-3">
                                <div class="col-md-4">
                                  <img src="../images/girl.png" alt="" style="width:150px;border:5px solid rgba(232, 72, 111);">
                                </div>
                                <div class="col-md-7">
                                  <p><span class="text-danger">I'm sorry,</span> but we cannot proceed with enrollment City Development Center. The head teacher evaluate your child’s assessment, as the doctor's recommendation it doesn’t fit to the BCDC program.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <table class="table table-bordered">
                                    <tbody>
                                      <tr>
                                        <td style="width: 50%;">Registration:</td>
                                        <td style="width: 50%;"><?= $registration; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Patient Name:</td>
                                        <td><?= $patient_name; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Diagnosis:</td>
                                        <td><?= $diagnosis; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Date of Birth:</td>
                                        <td><?= $date_of_birth; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Age:</td>
                                        <td><?= $age; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Gender:</td>
                                        <td><?= $gender; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Cotnact No.:</td>
                                        <td><?= $contact_no; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Address:</td>
                                        <td><?= $address; ?></td>
                                      </tr>
                                      <tr>
                                        <td class="border" style="width: 50%;">Email address of parent:</td>
                                        <td class="border" style="width: 50%;"><?= $parent_email; ?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="container-fluid border border-dark">
                              <div class="row border border-dark" style="background-color:rgba(217, 217, 217)">
                                <div class="col-md-12 ">
                                  <label class="fw-bold fs-5">Dr. hazel Gertrude Manabal-Reyes</label>
                                  <label for="" class="fst-italic">Developmental and Behavioral Pediatrics</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <label for="" class="fw-lighter">Recommendation:</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>1. <span class="fw-bold">Medication:</span> Begin taking Risperidone, 1 mg per tablet;1 tablet twice daily for 6 months. Report progressto BCDC every two weeks initially, then monthly after that. Do not stop the medication within the 6-month period without consultation with the prescribing doctor.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>2. <span class="fw-bold">ABA therapy:</span> sessions at least twicea week to address behaviorand life skills,and provide a parent/caregiver trainingprogram. Contact <span class="fw-bold">TEAMWORKS ABA THERAPY, INC.</span> at Unit 210 RJ TitusBuilding 2, HalangRoad, San Francisco, (0995)7615601 or <span class="text-decoration-underline">teamworkslaguna@gmail.com</span> for home-based services and parent training.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>3. <span class="fw-bold">School Placement:</span> sessions at least twicea week to address behaviorand life skills,and provide a parent/caregiver trainingprogram. Contact <span class="fw-bold">TEAMWORKS ABA THERAPY, INC.</span> at Unit 210 RJ TitusBuilding 2, HalangRoad, San Francisco, (0995)7615601 or <span class="text-decoration-underline">teamworkslaguna@gmail.com</span> for home-based services and parent training.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>4. <span class="fw-bold">Home Management:</span> Focus on developing to enhance his independence and participation in household activities. This includes:</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>a. Establishing consistent routines for daily activities like waking up, meals,  
                                  and bedtime to provide structure and security.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>b. Teaching self-care skills such as dressing, grooming, and bathing, 
                                  starting with simple tasks and gradually increasing complexity.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>c. Introducing basic household choreslike tidying his room, sortinglaundry, setting the table, or assisting with simple cookingtasks to foster a sense of responsibility.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>d. Educating Red on home safety, including avoiding hot surfaces, safely using appliances, and understanding emergency procedures.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>e. Encouraging the use of simple communication methods, such as verbal expression gestures, or visualaids, to communicate his needs and preferences.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <p>f. Using visual schedulesor charts to help Red understand and anticipate daily activities and routines.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-2 px-4">
            
          </div>
          
          <?php
        }
        else{
          ?>
          <div class="row p-5">
            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 card d-flex justify-content-center text-center align-items-center" style="height:400px;">
              <img class="mb-4 img-error " style="width: 250px;"  src="../images/paperhourglass.gif" />
              <p class="text-black-50">The patient enrollee evaluation is currently being prepared and not yet available. <br>
                Please check back later once it has been completed.</p>
              <!-- <img src="../images/no_record.jpg" alt="" style="width:500px;"> -->
            </div>
          <div class="row mt-2 px-4">
          <div class="col-md-12 text-end">
            <a href="step4-ass-result.php" class="btn " style="background-color:rgba(208, 208, 208); width:100px;">Previous</a>
            <a disabled class="btn bg-secondary" style="width:100px;">Next</a>
          </div>
          </div>
          </d>
          
          <?php
          
        }
        ?>
        
          
        <?php
      }
    }
  ?>
</div>

<script>
    // Initialize step navigation
    let currentStep = 4;
    if(<?= $approved; ?> == "0"){
      currentStep = 3;
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
