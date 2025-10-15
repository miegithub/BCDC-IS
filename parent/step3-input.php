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
    $diagnosis=mysqli_real_escape_string($con, $_POST['diagnosis']);
    $last_dev_ass=mysqli_real_escape_string($con, $_POST['last_dev_ass']);
    $intervention=mysqli_real_escape_string($con, $_POST['intervention']);
    $current_grade_level=mysqli_real_escape_string($con, $_POST['current_grade_level']);
    $improvement=mysqli_real_escape_string($con, $_POST['improvement']);
    $toilet_training=mysqli_real_escape_string($con, $_POST['toilet_training']);
    $with_dressing=mysqli_real_escape_string($con, $_POST['with_dressing']);
    $with_feeding=mysqli_real_escape_string($con, $_POST['with_feeding']);
    $when_drinking=mysqli_real_escape_string($con, $_POST['when_drinking']);
    $other_skill1=mysqli_real_escape_string($con, $_POST['other_skill1']);
    $other_skill2=mysqli_real_escape_string($con, $_POST['other_skill2']);
    $other_skill3=mysqli_real_escape_string($con, $_POST['other_skill3']);
    $other_skill4=mysqli_real_escape_string($con, $_POST['other_skill4']);
    $other_skill5=mysqli_real_escape_string($con, $_POST['other_skill5']);
    $other_skill6=mysqli_real_escape_string($con, $_POST['other_skill6']);
    $new_problem=mysqli_real_escape_string($con, $_POST['new_problem']);
    $stress_scale1=mysqli_real_escape_string($con, $_POST['stress_scale1']);
    $stress_scale2=mysqli_real_escape_string($con, $_POST['stress_scale2']);
    $stress_scale3=mysqli_real_escape_string($con, $_POST['stress_scale3']);
    $stress_scale4=mysqli_real_escape_string($con, $_POST['stress_scale4']);
    $stress_scale5=mysqli_real_escape_string($con, $_POST['stress_scale5']);
    $stress_scale6=mysqli_real_escape_string($con, $_POST['stress_scale6']);
    $stress_scale7=mysqli_real_escape_string($con, $_POST['stress_scale7']);
    $stress_scale8=mysqli_real_escape_string($con, $_POST['stress_scale8']);
    $stress_scale9=mysqli_real_escape_string($con, $_POST['stress_scale9']);
    $stress_scale10=mysqli_real_escape_string($con, $_POST['stress_scale10']);
    $stress_scale11=mysqli_real_escape_string($con, $_POST['stress_scale11']);
    $stress_scale12=mysqli_real_escape_string($con, $_POST['stress_scale12']);
    $stress_scale13=mysqli_real_escape_string($con, $_POST['stress_scale13']);
    $stress_scale14=mysqli_real_escape_string($con, $_POST['stress_scale14']);
    $stress_scale15=mysqli_real_escape_string($con, $_POST['stress_scale15']);
    $stress_scale16=mysqli_real_escape_string($con, $_POST['stress_scale16']);
    $stress_scale17=mysqli_real_escape_string($con, $_POST['stress_scale17']);
    /*$toe_walking=mysqli_real_escape_string($con, $_POST['toe_walking']);
    $motor_skill=mysqli_real_escape_string($con, $_POST['motor_skill']);
    $during_pregnancy=mysqli_real_escape_string($con, $_POST['during_pregnancy']);
    $list_children=mysqli_real_escape_string($con, $_POST['list_children']);
    $type_of_delivery=mysqli_real_escape_string($con, $_POST['type_of_delivery']);
    $was_your_child=mysqli_real_escape_string($con, $_POST['was_your_child']);
    $other_medical_condition=mysqli_real_escape_string($con, $_POST['other_medical_condition']);
    $list_disease_fam=mysqli_real_escape_string($con, $_POST['list_disease_fam']);
    $watch_tv=mysqli_real_escape_string($con, $_POST['watch_tv']);*/

    
    $query = "INSERT INTO `learner_dr`(`userID`, `diagnosis`, `last_dev_ass`, `intervention`, `current_grade_level`, `improvement`, `toilet_training`, `with_dressing`, `with_feeding`, `when_drinking`, `other_skill1`, `other_skill2`, `other_skill3`, `other_skill4`, `other_skill5`, `other_skill6`, `new_problem`, `stress_scale1`, `stress_scale2`, `stress_scale3`, `stress_scale4`, `stress_scale5`, `stress_scale6`, `stress_scale7`, `stress_scale8`, `stress_scale9`, `stress_scale10`, `stress_scale11`, `stress_scale12`, `stress_scale13`, `stress_scale14`, `stress_scale15`, `stress_scale16`, `stress_scale17`) VALUES ('$userID','$diagnosis','$last_dev_ass','$intervention','$current_grade_level','$improvement','$toilet_training','$with_dressing','$with_feeding','$when_drinking','$other_skill1','$other_skill2','$other_skill3','$other_skill4','$other_skill5','$other_skill6','$new_problem','$stress_scale1','$stress_scale2','$stress_scale3','$stress_scale4','$stress_scale5','$stress_scale6','$stress_scale7','$stress_scale8','$stress_scale9','$stress_scale10','$stress_scale11','$stress_scale12','$stress_scale13','$stress_scale14','$stress_scale15','$stress_scale16','$stress_scale17')";
    $query_run = mysqli_query($con, $query);


    $query_update = "UPDATE `learner` SET trigger_dr_ass='1' WHERE userID='$userID'";
    $query_update_run = mysqli_query($con, $query_update);
    $name= $_SESSION["auth_user"]['name'];
    $position = $_SESSION["auth_user"]['position'];
    $activity = "RE-EVALUATION SUBMITED SUCCESSFULLY";
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
            <p class="pt-3" style="margin-bottom: 80px;"><strong> Here are the following steps to avail the program and make your child become an official learner in BCDC:</strong></span> 
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
            <p class="pt-5 text-center" style="margin-bottom: 50px" > <strong>Step 3: Fill out all the required information in the Developmental Behavioral Pediatrician Pre-Assessment Form.  </strong><br>(Sagutan lahat ng hinihinging impormasyon sa Developmental Behavioral Pediatrician Pre-Assessment Form.)</p>
        
            </fieldset>
            <fieldset>
            <p class="pt-5 text-center" style="margin-bottom: 50px" > <strong>Step 3: Fill out all the required information in the Developmental Behavioral Pediatrician Pre-Assessment Form.  </strong><br>(Sagutan lahat ng hinihinging impormasyon sa Developmental Behavioral Pediatrician Pre-Assessment Form.)</p>
        
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
      <div class="row m-5 card shadow d-flex justify-content-center text-center align-items-center">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 my-5">
        <img src="../images/done-reg.gif" alt="" style="width: 250px">
        <p class="text-black-50">You have already filled out the Developmental Behavioral Pediatrician Pre-Assessment Form.</p>
        </div>
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-end mt-5 mb-3">
          <a href="" class="btn btn-primary">View Record</a>
        </div>
      </div>
      <div class="row px-4">
        <div class="col-md-12 text-end">
          <a href="step2.php" class="btn " style="background-color:rgba(119, 164, 218); width:100px;">Previous</a>
            <a href="step4-ass-result.php" class="btn bg-primary text-white" style="width:100px;">Next</a>
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
              <p class="pt-3" style="margin-bottom: 80px;"><strong>Here are the following steps to avail the program and make your child become an official learner in BCDC:</strong></span> 
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
                <p class="pt-5" style="margin-bottom: 80px;"><strong>Step 2:</strong> Patient Assessment Registration and Appointment Details <br></p>
              </fieldset>
              <fieldset>
              <p class="pt-5 text-center" style="margin-bottom: 40px" > <strong>Step 3: Fill out all the required information in the Developmental Behavioral Pediatrician Pre-Assessment Form.  </strong><br>(Sagutan lahat ng hinihinging impormasyon sa Developmental Behavioral Pediatrician Pre-Assessment Form.)</p>
        
              </fieldset>
              <fieldset>
                <p class="pt-5 text-center " style="margin-bottom: 40px" > <strong>Step 3: Fill out all the required information in the Developmental Behavioral Pediatrician Pre-Assessment Form.  </strong><br>(Sagutan lahat ng hinihinging impormasyon sa Developmental Behavioral Pediatrician Pre-Assessment Form.)</p>
        
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
                    <h2>Re-evaluation for old patient assessment</h2>
                  </div>
                </div>
                <div class="row mt-3 mb-3">
                  <div class="col-md-12">
                    <h5 class="text-danger mb-0">Re-evaluation (Nakita na ng developmental pediatrician) questionnaires:</h5>
                    <hr class="hr m-0">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What is his/her diagnosis? </label>
                    <input type="text" name="diagnosis" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="bg-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">When was his/her last developmental assessement?</label> <br>
                    <label for="" class="fw-light">(Kailan po siya huling nakita ng developmental pediatrician?)</label>
                    <input type="text" name="last_dev_ass" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What are the interventions or therapy given to your child? (Ex. Occupational therapy, physical therapy, speech therapy, SpED, regular school, social skills 
                    training, tutorials, etc) How frequent? (Ex. Twice a week)</label> <br>
                    <label for="" class="fw-light">(Ano po ang mga interbensyon na binibigay sa anak ninyo? Hal. Occupational therapy, physical therapy atbp.? Ilang beses sa isang linggo?) </label>
                    <input type="text" name="intervention" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What is the current grade level, school and therapy center of your child? If not yet enrolled, please put N/A.</label> <br>
                    <label for="" class="fw-light">(Saan nagaaral at anong grade level ng iyong anak? Saan siya ngthetherapy? Kung hindi pa, pakilagay N/A)</label>
                    <input type="text" name="current_grade_level" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What are the improvements you have observed on his/her <br>
                                                  1. language and communication (ex. mas dumami na po salita niya, nagmumustra na po siya)<br>
                                                  2. behavior (ex. di na po siya nanakit, nakikinig na po sa instruksyon)<br>
                                                  3. academics/learning (ex. nagbabasa na po siya, marunong na po siya ng calculator)</label> <br>
                    <label for="" class="fw-light">(Ano pong mga pagbabago ang napansin ninyo sa kanyang pakikipagusap, paguugali, pag-aaral at pag-aalaga ng sarili?) </label>
                    <input type="text" name="improvement" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Toilet Training</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Gestures or verbalize toilet needs" required>
                      <label class="form-check-label" for="flexRadioDefault1">Gestures or verbalize toilet needs</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Toilet trained but still needs assistance" required>
                      <label class="form-check-label" for="flexRadioDefault1">Toilet trained but still needs assistance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Goes to toilet alone and wipes/washes after bowel" required>
                      <label class="form-check-label" for="flexRadioDefault1">Goes to toilet alone and wipes/washes after bowel</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Not yet toilet trained" required>
                      <label class="form-check-label" for="flexRadioDefault1">Not yet toilet trained</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">With dressing, what can he/she do?</label>
                    <label for="" class="fw-light">(Sa pagdadamit, ano ang malimit niyang ginagawa?)</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Cooperates when dressing by giving hands and legs. (Isinusuot ang kamay at paa sa mga butas ng damit.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Cooperates when dressing by giving hands and legs. (Isinusuot ang kamay at paa sa mga butas ng damit.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Removes upper garment. (Tinatanggal ang blouse o t-shirt magisa.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Removes upper garment. (Tinatanggal ang blouse o t-shirt magisa.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Unzips zipper. (Ibinababa ang zipper.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Unzips zipper. (Ibinababa ang zipper.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Removes all clothes without a button alone. (Tinatanggal magisa ang shorts at t-shir na walang butones.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Removes all clothes without a button alone. (Tinatanggal magisa ang shorts at t-shir na walang butones.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Put coat unassisted. (Maglagay ng jacket nang mag-isa.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Put coat unassisted. (Maglagay ng jacket nang mag-isa.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Put on shoes without lace (Magsuot ng sapatos na walang sintas.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Put on shoes without lace (Magsuot ng sapatos na walang sintas.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Independent dressing (Namimili ng kanyang damit.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Independent dressing (Namimili ng kanyang damit.)</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">With feeding, what can he/she do?</label> <br>
                    <label for="" class="fw-light">(Ano ang malimit na nagagawa niya habang kumakain?)</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Finger feed (Nagkakamay gamit ang hinlalaki at pangturo na daliri.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Finger feed (Nagkakamay gamit ang hinlalaki at pangturo na daliri.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Uses spoon with some spill. (Gumagamit ng kutsara na may natatapon pang pagkain.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Uses spoon with some spill. (Gumagamit ng kutsara na may natatapon pang pagkain.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Uses spoon well. (Kumakain na kutsara lang ang gamit.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Uses spoon well. (Kumakain na kutsara lang ang gamit.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Uses spoon and fork with help.  (Gumagamit ng kutsara at tinidor nang may tulong.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Uses spoon and fork with help.  (Gumagamit ng kutsara at tinidor nang may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Independent eating using spoon and fork. (Kayang kumain magisa gamit ang kutsara't tinidor.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Independent eating using spoon and fork. (Kayang kumain magisa gamit ang kutsara't tinidor.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Spreads jam using a knife. (Kaya maglagay ng palaman gamit ang kutsilyo.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Spreads jam using a knife. (Kaya maglagay ng palaman gamit ang kutsilyo.)</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">When drinking, what can he/she do?</label> <br>
                    <label for="" class="fw-light">(Ano ang malimit na nagagawa niya kapag umiinom.)</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Milk bottle (Dumedede sa bote.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Milk bottle (Dumedede sa bote.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Drinks from a straw. (Umiinom gamit ang straw.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Drinks from a straw. (Umiinom gamit ang straw.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Drinks from a glass or cup with spill. (Umiinom sa baso na may natatapon.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Drinks from a glass or cup with spill. (Umiinom sa baso na may natatapon.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Drinks from a cup without spill.  (Umiinom sa baso nang walang tapon.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Drinks from a cup without spill.  (Umiinom sa baso nang walang tapon.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Pours liquid from one container to another and can drink independently. (Kayang maglagay ng tubig galing sa pitchel at uminom ng tubig magisa.)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Pours liquid from one container to another and can drink independently. (Kayang maglagay ng tubig galing sa pitchel at uminom ng tubig magisa.)</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What other skills can he/she do?  (Answer can be more than 1)</label> <br>
                    <label for="" class="fw-light">(Ano pa ang mga kaya niyang gawin? Maaaring pumili ng marami.)</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill1" id="flexRadioDefault1" value="Opens door knob. (Magbukas ng pintuan.)">
                      <label class="form-check-label" for="flexRadioDefault1">Opens door knob. (Magbukas ng pintuan.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill2" id="flexRadioDefault1" value="Washes hand. (Maghugas at magpunas ng kamay.)">
                      <label class="form-check-label" for="flexRadioDefault1">Washes hand. (Maghugas at magpunas ng kamay.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill3" id="flexRadioDefault1" value="Brushes teeth with assistance. (Nagsisipilyo na may tulong.)">
                      <label class="form-check-label" for="flexRadioDefault1">Brushes teeth with assistance. (Nagsisipilyo na may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill4" id="flexRadioDefault1" value="Washes face. (Naghihilamos ng mukha. )">
                      <label class="form-check-label" for="flexRadioDefault1">Washes face. (Naghihilamos ng mukha. )</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill5" id="flexRadioDefault1" value="Bathes independently. (Naliligo nang maayos at mag-isa.)">
                      <label class="form-check-label" for="flexRadioDefault1">Bathes independently. (Naliligo nang maayos at mag-isa.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill6" id="flexRadioDefault1" value="Ties shoes (Nagsisintas ng sapatos.)">
                      <label class="form-check-label" for="flexRadioDefault1">Ties shoes (Nagsisintas ng sapatos.)</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">List any new problems or behavioral concern that  you have observed?</label> <br>
                    <label for="" class="fw-light">(Ilista ang mga bagong mga problema sa paguugali.)</label>
                    <input type="text" name="new_problem" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Parental Stress Scale</label> <br>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>references: Berry JD & Jones W.H.</th>
                          <th class="text-center">Strongly Disagree</th>
                          <th class="text-center">Disagree</th>
                          <th class="text-center">Undecided</th>
                          <th class="text-center">Agree</th>
                          <th class="text-center">Strongly Agree</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="tr-bg">
                          <td class="text-dark">I am happy in my role as a parent</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">There is little or nothing I wouldn't do for my child(ren) if it is necessary*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Caring for my child(ren) sometimes takes more time and energy than I have to give.</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">I sometimes worry whether I am doing enough for my child(ren).</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">I feel close to my chil(dren).</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">I enjoy spending time with my child(ren)</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">My child(ren) is an important source of affection for me</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Having child(ren) gives me a more certain and optimistic view for the future</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">The major source of stress in my life is my child(ren)</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Having child(ren) leaves little time and flexibility in my life.</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale10" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale10" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale10" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale10" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale10" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">It is difficult to balance different responsibilities because of my child(ren).</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale11" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale11" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale11" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale11" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale11" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">The behaviour of my child(ren) is often embarrassing or stressful to me.</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale12" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale12" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale12" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale12" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale12" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">If I had it to do over again, I might decide not to have child(ren).</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale13" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale13" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale13" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale13" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale13" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">I feel overwhelmed by the responsibility of being a parent.</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale14" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale14" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale14" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale14" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale14" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Having child(ren) has meant having too few choices and too little control over my life.</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale15" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale15" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale15" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale15" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale15" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">I am satisfied as a parent.</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale16" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale16" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale16" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale16" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale16" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">I find my child/ren enjoyable.</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale17" id="flexRadioDefault1" value="Strongly Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale17" id="flexRadioDefault1" value="Disagree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale17" id="flexRadioDefault1" value="Undecided" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale17" id="flexRadioDefault1" value="Agree" required>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale17" id="flexRadioDefault1" value="Strongly Agree" required>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <hr class="">
                  </div>
                </div><!--
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Any concerns on toe walking when he/she was more than 3 years old?</label> <br>
                    <label for="" class="fw-light">(Nagkproblema ka ba sa kanyagng pagtingkayad nung siya ay edad 3 - 5?)*</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toe_walking" id="flexRadioDefault1" value="Yes (Oo)" required>
                      <label class="form-check-label" for="flexRadioDefault1">Yes (Oo)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toe_walking" id="flexRadioDefault1" value="No (Hindi)" required>
                      <label class="form-check-label" for="flexRadioDefault1">No (Hindi)</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Any concerns on his motor skills while he/she was growing up? If yes, please list motor concerns (Ex. Clumsy, difficulty with balance and coordination, delayed in walking, uses wheel chair or needs to be carried around, etc.) If there is none, please put N/A</label> <br>
                    <label for="" class="fw-light">(Ilista ang mga problema sa paglalakad o paggalaw habang siya ay lumalaki) (Hal. Hirap maglakad, laging natutumba, kailangan kargahin, atbp.)<br>Kung wala, pakilagay ang N/A</label>
                    <input type="text" name="motor_skill" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">During your pregnancy, were you stressed, depressed, had any infections or illnesses? What month of pregnancy?</label> <br>
                    <label for="" class="fw-light">(Nung nagbuntis ka, ikaw ba ay stressed or nagkasakit? Anong kabuwanan?)</label>
                    <input type="text" name="during_pregnancy" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">List all of your children by age and put an (*) asterisk on the child for Developmental Assessment and put an (A) for adopted, or place any medical concerns.</label> <br>
                    <label for="" class="fw-light">Ex.: <br>1- AB, 5 y.o -  A<br>2- CD, 1.2 y.o - *</label>
                    <label for="" class="fw-light">(Ilista ang pagkakasunod sunod ng inyong mga anak base sa kanilang edad. Lagyan ng (*) asterisk ang anak na para sa Developmental Assessement at (A) kung siya ay inampon.) </label>
                    <input type="text" name="list_children" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Type of delivery done on your child for assessment,  normal delivery or cesarean section (CS)? If CS, why?</label> <br>
                    <label for="" class="fw-light">(Ikaw ba ay nag normal delivery o cesarean sa anak mo na magpapaassessment?) Kung CS, bakit?</label>
                    <input type="text" name="type_of_delivery" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Was your child for assessment admitted at the neonatal intensive care unit (NICU) after delivery? If yes, why?</label> <br>
                    <label for="" class="fw-light">(Ang anak niyo po ba na iaassess ay naadmit sa ICU pagkapanganak? Kung oo, bakit siya naadmit? Hal.  nahirapan huminga, kailangan ng antibiotic, atbp.)</label>
                    <input type="text" name="was_your_child" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Does your child for assessment have any other medical conditions? List the disorder and current medications he/she is taking.</label> <br>
                    <label for="" class="fw-light">(Ang anak niyo po ba ay may iba pang mga sakit? Isulat ang pangalan ng sakit at mga gamot na iniinom Hal. problema sa puso - furosemide )</label>
                    <input type="text" name="other_medical_condition" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">List the diseases or disorders in your family.</label> <br>
                    <label for="" class="fw-light">Ex.:<br>mother side- Hypertension, Autism<br>father side- Diabetes, Down syndrome<br><br>(Anu-ano ang mga sakit  na mayroon sa inyong pamilya?) Ilista ang mga sakit sa pamilya ng nanay at sa pamilya ng tatay. (Hal. pamilya ng nanay:  High blood, Diabetes, Autism, atbp.)</label>
                    <input type="text" name="list_disease_fam" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">How many hours does your child watch TV and play with gadgets per day?</label> <br>
                    <label for="" class="fw-light">(Ilang oras nanunuod ng tv at naglalaro ng gadget ang anak ninyo?)</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="30 min/day" required>
                      <label class="form-check-label" for="flexRadioDefault1">30 min/day</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="1 hour per day" required>
                      <label class="form-check-label" for="flexRadioDefault1">1 hour per day</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="2 hours per day" required>
                      <label class="form-check-label" for="flexRadioDefault1">2 hours per day</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="more than 4 hours a day" required>
                      <label class="form-check-label" for="flexRadioDefault1">more than 4 hours a day</label>
                    </div>
                    <hr class="">
                  </div>
                </div>-->
                <div class="row mb-3">
                  <div class="col-md-12 text-end">
                    <button class="btn" style="background-color:rgba(208, 208, 208)">Back</button>
                    <button type="submit" name="submit_dr_ass" class="btn" style="background-color:rgba(63, 147, 245)">Submit</button>
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
