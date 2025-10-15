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
    $query_check = "SELECT * FROM learner WHERE userID='$userID'";
    $query_check_run = mysqli_query($con,$query_check);
?>
<style>
  .body{
    background-color: rgba(190, 190, 190);
  }
  .border-bottom {
    border-bottom: 2px solid #000; /* Customize the bottom border */
  }
  
  .form-control:focus {
    box-shadow: none; /* Remove the default box shadow */
    border-bottom: 2px solid #007BFF; /* Change bottom border color on focus */
  }
  .tr-bg td{
    background-color:rgba(247, 246, 246);
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
<?php
  $diagnosis=null;
  $last_dev_ass=null;
  $intervention=null;
  $current_grade_level=null;
  $improvement=null;
  $toilet_training=null;
  $with_dressing=null;
  $with_feeding=null;
  $when_drinking=null;
  $other_skill1=null;
  $other_skill2=null;
  $other_skill3=null;
  $other_skill4=null;
  $other_skill5=null;
  $other_skill6=null;
  $new_problem=null;
  $stress_scale1=null;
  $stress_scale2=null;
  $stress_scale3=null;
  $stress_scale4=null;
  $stress_scale5=null;
  $stress_scale6=null;
  $stress_scale7=null;
  $stress_scale8=null;
  $stress_scale9=null;
  $toe_walking=null;
  $motor_skill=null;
  $during_pregnancy=null;
  $list_children=null;
  $type_of_delivery=null;
  $was_your_child=null;
  $other_medical_condition=null;
  $list_disease_fam=null;
  $watch_tv=null;
  
  $userID = $_SESSION['auth_user']['userID'];
  if(isset($_POST['submit_dr_ass'])){
    $q1=mysqli_real_escape_string($con, $_POST['q1']);
    $q2=mysqli_real_escape_string($con, $_POST['q2']);
    $q3=mysqli_real_escape_string($con, $_POST['q3']);
    $q4=mysqli_real_escape_string($con, $_POST['q4']);
    $q5=mysqli_real_escape_string($con, $_POST['q5']);
    $q6=mysqli_real_escape_string($con, $_POST['q6']);
    $q7=mysqli_real_escape_string($con, $_POST['q7']);
    $q8=mysqli_real_escape_string($con, $_POST['q8']);
    $q9=mysqli_real_escape_string($con, $_POST['q9']);
    $q10=mysqli_real_escape_string($con, $_POST['q10']);
    $q11=mysqli_real_escape_string($con, $_POST['q11']);
    $q12=mysqli_real_escape_string($con, $_POST['q12']);
    $q13=mysqli_real_escape_string($con, $_POST['q13']);
    $q14=mysqli_real_escape_string($con, $_POST['q14']);
    $q15=mysqli_real_escape_string($con, $_POST['q15']);
    $q16=mysqli_real_escape_string($con, $_POST['q16']);
    $q17=mysqli_real_escape_string($con, $_POST['q17']);
    $q18=mysqli_real_escape_string($con, $_POST['q18']);
    $q19=mysqli_real_escape_string($con, $_POST['q19']);
    $q20=mysqli_real_escape_string($con, $_POST['q20']);
    $q21=mysqli_real_escape_string($con, $_POST['q21']);
    $q22=mysqli_real_escape_string($con, $_POST['q22']);
    $q23=mysqli_real_escape_string($con, $_POST['q23']);
    $q24=mysqli_real_escape_string($con, $_POST['q24']);
    $q25=mysqli_real_escape_string($con, $_POST['q25']);
    $q26=mysqli_real_escape_string($con, $_POST['q26']);
    $q27=mysqli_real_escape_string($con, $_POST['q27']);
    $q28=mysqli_real_escape_string($con, $_POST['q28']);
    $q29=mysqli_real_escape_string($con, $_POST['q29']);
    $q30=mysqli_real_escape_string($con, $_POST['q30']);
    $q31=mysqli_real_escape_string($con, $_POST['q31']);
    $q32=mysqli_real_escape_string($con, $_POST['q32']);
    $q33=mysqli_real_escape_string($con, $_POST['q33']);
    $q34=mysqli_real_escape_string($con, $_POST['q34']);
    $q35=mysqli_real_escape_string($con, $_POST['q35']);
    $q36=mysqli_real_escape_string($con, $_POST['q36']);
    $q37=mysqli_real_escape_string($con, $_POST['q37']);
    $q38=mysqli_real_escape_string($con, $_POST['q38']);
    $q39=mysqli_real_escape_string($con, $_POST['q39']);
    $q40=mysqli_real_escape_string($con, $_POST['q40']);
    $q41=mysqli_real_escape_string($con, $_POST['q41']);
    $q42=mysqli_real_escape_string($con, $_POST['q42']);
    $q43=mysqli_real_escape_string($con, $_POST['q43']);
    $q44=mysqli_real_escape_string($con, $_POST['q44']);
    $q45=mysqli_real_escape_string($con, $_POST['q45']);
    $q46=mysqli_real_escape_string($con, $_POST['q46']);
    $q47=mysqli_real_escape_string($con, $_POST['q47']);
    $stress_scale1=mysqli_real_escape_string($con, $_POST['stress_scale1']);
    $stress_scale2=mysqli_real_escape_string($con, $_POST['stress_scale2']);
    $stress_scale3=mysqli_real_escape_string($con, $_POST['stress_scale3']);
    $stress_scale4=mysqli_real_escape_string($con, $_POST['stress_scale4']);
    $stress_scale5=mysqli_real_escape_string($con, $_POST['stress_scale5']);
    $stress_scale6=mysqli_real_escape_string($con, $_POST['stress_scale6']);
    $stress_scale7=mysqli_real_escape_string($con, $_POST['stress_scale7']);
    $stress_scale8=mysqli_real_escape_string($con, $_POST['stress_scale8']);
    $q56=mysqli_real_escape_string($con, $_POST['q56']);

    
    $query = "INSERT INTO `learner_dr2`(`userID`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q24`, `q25`, `q26`, `q27`, `q28`, `q29`, `q30`, `q31`, `q32`, `q33`, `q34`, `q35`, `q36`, `q37`, `q38`, `q39`, `q40`, `q41`, `q42`, `q43`, `q44`, `q45`, `q46`, `q47`, `stress_scale1`, `stress_scale2`, `stress_scale3`, `stress_scale4`, `stress_scale5`, `stress_scale6`, `stress_scale7`, `stress_scale8`, `q56`) VALUES ('$userID','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$q20','$q21','$q22','$q23','$q24','$q25','$q26','$q27','$q28','$q29','$q30','$q31','$q32','$q33','$q34','$q35','$q36','$q37','$q38','$q39','$q40','$q41','$q42','$q43','$q44','$q45','$q46','$q47','$stress_scale1','$stress_scale2','$stress_scale3','$stress_scale4','$stress_scale5','$stress_scale6','$stress_scale7','$stress_scale8','$q56')";
    $query_run = mysqli_query($con, $query);


    $query_update = "UPDATE `learner` SET trigger_dr_ass='1' WHERE userID='$userID'";
    $query_update_run = mysqli_query($con, $query_update);
    $name= $_SESSION["auth_user"]['name'];
    $position = $_SESSION["auth_user"]['position'];
    $activity = "INITIAL EVALUATION SUBMITED SUCCESSFULLY";
    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i a");
    $date_today = date("Y-m-d");
    $query1 = "INSERT INTO `log_monitoring`(`name`, position, activity,`date`, action_time, `time_in`) VALUES ('$name','$position','$activity','$date_today','$current_time','$current_time')";
    $query_run1 = mysqli_query($con, $query1);
    header("Location: step3-review.php");
  }

  $check_query = "SELECT * FROM learner WHERE trigger_dr_ass='1' and userID='$userID'";
  $check_query_run = mysqli_query($con, $check_query);
  if(mysqli_num_rows($check_query_run) > 0){
    ?>
    <div class="container mw-100 p-3 m-0" style="width:100%;height:100%;">
        
      <div class="row px-4">
        <div class="col-md-12">
          <div class="text-center px-0 pt-5">
            <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
            <p class="pt-3" style="margin-bottom: 80px;"><strong>Here are the following steps to avail the program and make your child become an official learner in BCDC:</strong></span> 
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
              <p class="pt-5"><strong>Step 2:</strong> Patient Assessment Registration and Appointment Details <br></p>
            </fieldset>
            <fieldset>
            <p class="pt-5 text-center" style="margin-bottom: 70px" > <strong>Step 3: Fill out all the required information in the Developmental Behavioral Pediatrician Pre-Assessment Form.  </strong><br>(Sagutan lahat ng hinihinging impormasyon sa Developmental Behavioral Pediatrician Pre-Assessment Form.)</p>
        
            </fieldset>
            <fieldset>
              <p class="pt-5"><strong>Step 3:</strong> Developmental Assessment Forms</p>
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
      <div class="row m-5 card shadow d-flex justify-content-center text-center align-items-center" style="">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 my-5">
          <img src="../images/already_answered.jpg" alt="" style="width:200px;">
        </div>
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-end mt-5 mb-3">
          <a href="step4-ass-result.php" class="btn btn-primary">View Record</a>
        </div>
      </div>
      <div class="row px-4">
        <div class="col-md-12 text-end">
          <a href="inquire-done.php" class="btn " style="background-color:rgba(119, 164, 218); width:100px;">Previous</a>
          <a href="step4-ass-result.php" class="btn bg-primary" style="width:100px;">Next</a>
        </div>
      </div>
    </div>
    <?php

  }
  else{
?>
      
      <div class="container mw-100 p-3 m-0" style="width:100%;height:100%;">
        
        <div class="row px-4">
          <div class="col-md-12">
            <div class="text-center px-0 pt-5">
              <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
              <p class="pt-3" style="margin-bottom: 80px;"><strong> Here are the following steps to avail the program and make your child become an official learner in BCDC:</strong></span> 
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
                <p class="pt-5"><strong>Step 2:</strong> Patient Assessment Registration and Appointment Details <br></p>
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
        <div class="row">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
            <form action="" method="post">
              
              <div class="container card b mw-100 m-0" style="width:99%;">
                <div class="row pt-2" style="background-color:rgba(4, 3, 70);">
                  <div class="col-md-12 text-white">
                    <h2>Initial Evaluation for speech, behavior or learning problem for new patient assessment</h2>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                    <h5 class="text-danger mb-0">Vanderbilt Assessment Scale (2002 American Academy of Pediatrics and National Initiative for Children’sHealthcare Quality)</h5>
                    <hr class="hr m-0">
                  </div>
                </div>
                <div class="row mt-1 mb-3">
                  <div class="col-md-12">
                    <h5 class="mb-0">When completing this form, please think about your child’s behaviors in the past 6 months.</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>1. Toilet Training</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q1" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q1" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q1" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q1" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>2. Has difficulty keeping attention to what needs to be done.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q2" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q2" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q2" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q2" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>3. Does not seem to listen when spoken to directly.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q3" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q3" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q3" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q3" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>4. Does not follow through when given direnctions and fails to finish activities (Not due to refusal or failure to understand.)</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q4" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q4" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q4" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q4" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>5. Has difficulty organzing tasks and activities.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q5" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q5" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q5" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q5" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>6. Avoids, dislikes, or does not want to start tasks that require ongoing mental effort</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q6" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q6" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q6" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q6" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>7. Avoids, dislikes, or does not want to start tasks that require ongoing mental effort</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q7" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q7" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q7" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q7" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>8. Is easily distracted by noises or other stimuli.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q8" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q8" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q8" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q8" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>9. Is forgetful in daily activities.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q9" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q9" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q9" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q9" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>10. Fidgets with hands or feet or squirms in seat.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q10" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q10" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q10" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q10" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>11. Leaves seat when remaining seated is expected.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q11" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q11" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q11" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q11" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>12. Runs about or climbs too much when remaining seated is expected.</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q12" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q12" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q12" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q12" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>13. Has difficulty playing or beginning quiet play activities*</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q13" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q13" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q13" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q13" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>14. Is “on the go” or often acts as if “driven by a motor”</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q14" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q14" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q14" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q14" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>15. Talks too much</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q15" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q15" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q15" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q15" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>16. Blurts out answers before questions have been completed</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q16" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q16" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q16" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q16" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>17. Has difficulty waiting for his/her turn</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q17" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q17" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q17" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q17" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>18. Interrupts or intrudes on others’ conversations and/or activities</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q18" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q18" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q18" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q18" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>19. Argues with adults</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q19" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q19" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q19" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q19" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>20. Loses temper</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q20" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q20" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q20" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q20" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>21. Actively defies or refuses to go along with adults’ requests or rules</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q21" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q21" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q21" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q21" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>22. Deliberately annoys people</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q22" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q22" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q22" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q22" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>23. Blames others for his/her mistakes or misbehaviors</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q23" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q23" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q23" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q23" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>24. Is touchy or easily annoyed by others</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q24" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q24" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q24" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q24" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>25. Is angry or resentful</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q25" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q25" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q25" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q25" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>26. Is spiteful and wants to get even</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q26" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q26" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q26" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q26" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>27. Bullies, threatens, or intimidates others</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q27" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q27" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q27" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q27" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>28. Starts physical fights</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q28" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q28" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q28" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q28" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>29. Lies to get out of trouble or to avoid obligations (ie,“cons” others)</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q29" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q29" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q29" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q29" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>30. Is truant from school (skips school) without permission</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q30" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q30" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q30" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q30" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>31. Is physically cruel to people</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q31" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q31" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q31" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q31" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>32. Has stolen things that have value</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q32" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q32" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q32" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q32" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>33. Deliberately destroys others’ properties</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q33" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q33" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q33" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q33" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>34. Has used a weapon that can cause serious harm (bat, knife, brick, gun)</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q34" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q34" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q34" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q34" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>35. Is physically cruel to animals</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q35" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q35" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q35" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q35" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>36. Has deliberately set fires to cause damage</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q36" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q36" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q36" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q36" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>37. Has broken into someone else’s home, business, or car</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q37" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q37" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q37" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q37" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>38. Has stayed out at night without permission</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q38" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q38" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q38" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q38" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>39. Has run away from home overnight</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q39" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q39" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q39" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q39" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>40. Has forced someone into sexual activity</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q40" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q40" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q40" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q40" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>41. Is fearful, anxious, or worried </strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q41" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q41" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q41" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q41" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>42. Is afraid to try new things for fear of making mistakes</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q42" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q42" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q42" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q42" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>43. Feels worthless or inferior</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q43" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q43" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q43" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q43" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>44. Blames self for problems, feels guilty </strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q44" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q44" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q44" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q44" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>45. Feels lonely, unwanted, or unloved; complains that “no one loves him/her” </strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q45" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q45" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q45" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q45" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>46. Is sad, unhappy, or depressed</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q46" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q46" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q46" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q46" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>47. Is self-conscious or easily embarrassed</strong> </label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q47" id="flexRadioDefault2" value="Very often (Madalas napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Very often (Madalas napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q47" id="flexRadioDefault2" value="Often (3x a week na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Often (3x a week na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q47" id="flexRadioDefault2" value="Occassionally. (Once a month na napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Occassionally. (Once a month na napapansin)
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q47" id="flexRadioDefault2" value="Never. (Hindi napapansin)" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Never. (Hindi napapansin)
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h5>please check corresponding box</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>references: Berry JD & Jones W.H.</th>
                          <th class="text-center">Excellence</th>
                          <th class="text-center">Above average</th>
                          <th class="text-center">Average</th>
                          <th class="text-center">Somewhat of a problem</th>
                          <th class="text-center">problematic</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="tr-bg">
                          <td class="text-dark">48. Overall school performance</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">49. Reading</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">50. Writing</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">51. Mathematics</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">52. Relationship with parents</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">53. Relationship with siblings</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">54. Relationship with peers</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">55. Participation in organized activities</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Excellence" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Above average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Average" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Somewhat of a problem" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="problematic" required>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="flexRadioDefault1" class="mb-2">Is you child depressed or scared/anxious?</label>
                    <div class="form-check ms-3">
                      <input class=" form-check-input border-dark" type="radio" name="q56" id="flexRadioDefault2" value="YES" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      YES
                      </label>
                    </div>
                    <div class="form-check ms-3">
                      <input class="form-check-input border-dark" type="radio" name="q56" id="flexRadioDefault2" value="NO" required>
                      <label class="form-check-label" for="flexRadioDefault2">
                      NO
                      </label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12 text-end">
                    <button class="btn" style="background-color:rgba(208, 208, 208)">Back</button>
                    <button type="submit" name="submit_dr_ass" class="btn" style="background-color:rgba(63, 147, 245)">Next</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
<?php
  }
?>
<script>
    // Initialize step navigation
    
    let currentStep = 2;
    if(<?= mysqli_num_rows($check_query_run) ?> > 0){
      currentStep = 2;
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
