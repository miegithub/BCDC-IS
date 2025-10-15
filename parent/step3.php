<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step3";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d');
 

$userID = $_SESSION['auth_user']['userID'];
$update_redirect = "UPDATE user SET redirect='3' WHERE ID='$userID'";
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
        <p class="pt-5 text-center" style="margin-bottom: 70px" > <strong>Step 3: Fill out all the required information in the Developmental Behavioral Pediatrician Pre-Assessment Form.  </strong><br>(Sagutan lahat ng hinihinging impormasyon sa Developmental Behavioral Pediatrician Pre-Assessment Form.)</p>
        
        </fieldset>
        <fieldset>
        <p class="pt-5 text-center" style="margin-bottom: 70px" > <strong>Step 3: Fill out all the required information in the Developmental Behavioral Pediatrician Pre-Assessment Form.  </strong><br>(Sagutan lahat ng hinihinging impormasyon sa Developmental Behavioral Pediatrician Pre-Assessment Form.)</p>
        
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
  <?php
    $userID = $_SESSION['auth_user']['userID'];
    $query_check = "SELECT * FROM learner WHERE userID='$userID'";
    $query_check_run = mysqli_query($con,$query_check);

    if($query_check_run){
      if(mysqli_num_rows($query_check_run) > 0){
        
        $query1 = "SELECT * FROM learner WHERE userID='$userID'";
        $query_run1 = mysqli_query($con, $query1);
        foreach($query_run1 as $row){
          if($row['trigger_ht']=="0" or $row['assessment_sched']==null){
            ?>
            <div class="row p-5">
              <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 card d-flex justify-content-center text-center align-items-center" style="height:400px;">
                <img src="../images/no_record.jpg" alt="" style="width:400px;">
              </div>
            </div>
            <?php
            
          }
          else{
            if($row['chief_complain']!=null && $row['trigger_dr_ass']==1){
              ?>
              <div class="row m-5 card d-flex justify-content-center text-center align-items-center">
             
               <img src="../images/done-reg.gif" alt="" style="width:250px">
              <p class="text-black-50">You have already filled out the Developmental Behavioral Pediatrician Pre-Assessment Form.</p>
                               

                <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-end mt-5 mb-3">
                  <a href="step3-review.php" class="btn btn-primary">View Record</a>
                </div>
              </div>
              <div class="row px-4">
              <div class="col-md-12 text-end">
                <a href="step2.php" class="btn " style="background-color:rgba(119, 164, 218); width:100px;">Previous</a>
                  <a href="step4-ass-result.php" class="btn bg-primary text-white" style="width:100px;">Next</a>
              </div>
            </div>
              <?php
            }
            else{
              $_SESSION['learnerID'] = $row['learnerID'];
              $learnerID = $row['learnerID'];
              $name = $row['name'];
              $date_of_birth = $row['date_of_birth'];
              $age = $row['age'];
              $gender = $row['gender'];
              $contact_no = $row['contact_no'];
              $address = $row['address'];
              $guardian_name = $row['guardian_name'];
              $guardian_contact = $row['guardian_contact'];
              $guardian_email = $row['guardian_email'];
              $diagnosis = $row['diagnosis'];
              $assessment_outlet = $row['assessment_outlet'];
              $assessment_time = $row['assessment_time'];
              $assessment_sched = $row['assessment_sched'];
              if($row['diagnosis_other'] == null){
                $diagnosis_other = "N/A";
              }
              else{
                $diagnosis_other = $row['diagnosis_other'];
              }
              $therapy = $row['therapy'];
              if($row['therapy_location'] == null){
                $therapy_location = "N/A";
              }
              else{
                $therapy_location = $row['therapy_location'];
              }
              $remarks = $row['remarks'];
              $other = $row['other'];
              ?>
                
                <div class="row">
                  <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                      <div class="container card b mw-100 m-0" style="width:99%;">
                        <div class="row pt-2" style="background-color:rgba(4, 3, 70);">
                          <div class="col-md-12 text-white">
                            <h2>Developmental Behavioral Pediatrician Pre-Assessment Form</h2>
                          </div>
                        </div>
                        <div class="row mt-3 mb-3">
                          <div class="col-md-12">
                            <h5 class="text-danger mb-0">Details of Patient</h5>
                            <hr class="hr m-0">
                          </div>
                        </div>
                        <div class="row mb-1">
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Registration No.:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $learnerID; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Gender:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $gender; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Assessment Outlet:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $assessment_outlet; ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-1">
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Patient Name:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $guardian_name; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Contact No.:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $guardian_contact; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Assessment Schedule:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" value="<?= $assessment_sched; ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-1">
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Date of Birth:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $date_of_birth; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Address:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $address; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Assessment Time:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $assessment_time; ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-1">
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Age:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $age; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <label for="inputPassword" class="col-sm-6 col-form-label pe-0"><strong>Email address of parent:</strong></label>
                              <div class="col-sm-6">
                                <input type="text" class="" id="inputPassword" value="<?= $guardian_email; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <hr class="hr m-0">
                          </div>
                        </div>
                        <?php
                          if(isset($_POST['submit_complain'])){
                            $diagnosis=$_POST['diagnosis'];
                            $learnerID = $_SESSION['auth_user']['userID'];
                            $update = "UPDATE learner SET chief_complain='$diagnosis' WHERE userID='$learnerID'";
                            mysqli_query($con, $update);
                            
                            if($diagnosis=="Initial evaluation for speech, behavior or learning problem (unang makikita ng doktor)"){

                              header("Location: step3-input2.php");
                              exit(0);
                            }
                            else{
                              header("Location: step3-input.php");
                              exit(0);
                            }
                          }
                        ?>
                        <form action="" method="post">
                          <div class="row">
                            <div class="col-md-12">
                              <h5>Chief complainant or concerns (Problema ng bata)</h5>
                              <div class="form-check">
                                <input class="form-check-input border-dark" type="radio" name="diagnosis" id="flexRadioDefault1" value="Initial evaluation for speech, behavior or learning problem (unang makikita ng doktor)" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                Initial evaluation for speech, behavior or learning problem for new patient in BCDC (unang makikita ng developmental pediatrician sa batang pasyente)
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input border-dark" type="radio" name="diagnosis" id="flexRadioDefault1" value="Re-evaluation (Nakita na ng developmental pediatrician)" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                Re-evaluation for old learner in BCDC (Nakita na ng developmental pediatrician sa batang pasyente) 
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-12 text-end">
                              <button type="submit" name="submit_complain" href="step3-review.php" class="btn btn-primary w-25">Next</button>
                            </div>
                          </div>
                        </form>
                        
                      </div>
                  </div>
                </div>
              <?php
            }
            
          }
          
        }
        ?>
          
        <?php
      }
      else{
        ?>
        <div class="row p-5">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 card d-flex justify-content-center text-center align-items-center" style="height:400px;">
            <img src="../images/no_record.jpg" alt="" style="width:400px;">
          </div>
        </div>
        <?php
      }
    }
  ?>
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
