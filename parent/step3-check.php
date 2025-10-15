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
</style>
<?php


  $userID = $_SESSION['auth_user']['userID'];
  $queryget = "SELECT * FROM learner_dr WHERE userID='$userID'";
  $queryget_run = mysqli_query($con, $queryget); 
  if($queryget_run){
    if(mysqli_num_rows($queryget_run) >0){
      foreach($queryget_run as $row){
        $diagnosis=$row['diagnosis'];
        $last_dev_ass=$row['last_dev_ass'];
        $intervention=$row['intervention'];
        $current_grade_level=$row['current_grade_level'];
        $improvement=$row['improvement'];
        $toilet_training=$row['toilet_training'];
        $with_dressing=$row['with_dressing'];
        $with_feeding=$row['with_feeding'];
        $when_drinking=$row['when_drinking'];
        $other_skill1=$row['other_skill1'];
        $other_skill2=$row['other_skill2'];
        $other_skill3=$row['other_skill3'];
        $other_skill4=$row['other_skill4'];
        $other_skill5=$row['other_skill5'];
        $other_skill6=$row['other_skill6'];
        $new_problem=$row['new_problem'];
        $stress_scale1=$row['stress_scale1'];
        $stress_scale2=$row['stress_scale2'];
        $stress_scale3=$row['stress_scale3'];
        $stress_scale4=$row['stress_scale4'];
        $stress_scale5=$row['stress_scale5'];
        $stress_scale6=$row['stress_scale6'];
        $stress_scale7=$row['stress_scale7'];
        $stress_scale8=$row['stress_scale8'];
        $stress_scale9=$row['stress_scale9'];
        $toe_walking=$row['toe_walking'];
        $motor_skill=$row['motor_skill'];
        $during_pregnancy=$row['during_pregnancy'];
        $list_children=$row['list_children'];
        $type_of_delivery=$row['type_of_delivery'];
        $was_your_child=$row['was_your_child'];
        $other_medical_condition=$row['other_medical_condition'];
        $list_disease_fam=$row['list_disease_fam'];
        $watch_tv=$row['watch_tv'];
      }
      ?>
      
      <div class="container mw-100 p-3 m-0" style="width:100%;height:100%;">
        
        <div class="row">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
            <form action="" method="post">
              
              <div class="container card b mw-100 m-0" style="width:99%;">
                <div class="row pt-2" style="background-color:rgba(4, 3, 70);">
                  <div class="col-md-12 text-white">
                    <h2>Dr. Hazel Manabal-Reyes Developmental Assessment </h2>
                  </div>
                </div>
                <div class="row mt-3 mb-3">
                  <div class="col-md-12">
                    <h5 class="text-danger mb-0">Follow-up or re-evaluation questionnaires: </h5>
                    <hr class="hr m-0">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What is his/her diagnosis? </label>
                    <input type="text" name="diagnosis" value="<?= $diagnosis; ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <input type="hidden" value="<?= $userID ?>" name="userID">
                    <hr class="bg-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">When was his/her last developmental assessement?</label> <br>
                    <label for="" class="fw-light">(Kailan po siya huling nakita ng developmental pediatrician?)</label>
                    <input type="text" name="last_dev_ass" value="<?= $last_dev_ass; ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What are the interventions or therapy given to your child? (Ex. Occupational therapy, physical therapy, speech therapy, SpED, regular school, social skills 
                    training, tutorials, etc) How frequent? (Ex. Twice a week)</label> <br>
                    <label for="" class="fw-light">(Ano po ang mga interbensyon na binibigay sa anak ninyo? Hal. Occupational therapy, physical therapy atbp.? Ilang beses sa isang linggo?) </label>
                    <input type="text" name="intervention" value="<?= $intervention; ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">What is the current grade level, school and therapy center of your child? If not yet enrolled, please put N/A.</label> <br>
                    <label for="" class="fw-light">(Saan nagaaral at anong grade level ng iyong anak? Saan siya ngthetherapy? Kung hindi pa, pakilagay N/A)</label>
                    <input type="text" name="current_grade_level" value="<?= $current_grade_level; ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
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
                    <input type="text" name="improvement" value="<?= $improvement; ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Toilet Training</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Gestures or verbalize toilet needs" required <?= ($toilet_training=="Gestures or verbalize toilet needs") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Gestures or verbalize toilet needs</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Toilet trained but still needs assistance" required <?= ($toilet_training=="Toilet trained but still needs assistance") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Toilet trained but still needs assistance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Goes to toilet alone and wipes/washes after bowel" required <?= ($toilet_training=="Goes to toilet alone and wipes/washes after bowel") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Goes to toilet alone and wipes/washes after bowel</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toilet_training" id="flexRadioDefault1" value="Not yet toilet trained" required <?= ($toilet_training=="Not yet toilet trained") ? "checked" : ""; ?>>
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
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Cooperates when dressing by giving hands and legs. (Isinusuot ang kamay at paa sa mga butas ng damit.)" required <?= ($with_dressing=="Cooperates when dressing by giving hands and legs. (Isinusuot ang kamay at paa sa mga butas ng damit.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Cooperates when dressing by giving hands and legs. (Isinusuot ang kamay at paa sa mga butas ng damit.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Removes upper garment. (Tinatanggal ang blouse o t-shirt magisa.)" required <?= ($with_dressing=="Removes upper garment. (Tinatanggal ang blouse o t-shirt magisa.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Removes upper garment. (Tinatanggal ang blouse o t-shirt magisa.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Unzips zipper. (Ibinababa ang zipper.)" required <?= ($with_dressing=="Unzips zipper. (Ibinababa ang zipper.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Unzips zipper. (Ibinababa ang zipper.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Removes all clothes without a button alone. (Tinatanggal magisa ang shorts at t-shir na walang butones.)" required <?= ($with_dressing=="Removes all clothes without a button alone. (Tinatanggal magisa ang shorts at t-shir na walang butones.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Removes all clothes without a button alone. (Tinatanggal magisa ang shorts at t-shir na walang butones.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)" required <?= ($with_dressing=="Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Put coat unassisted. (Maglagay ng jacket nang mag-isa.)" required <?= ($with_dressing=="Put coat unassisted. (Maglagay ng jacket nang mag-isa.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Put coat unassisted. (Maglagay ng jacket nang mag-isa.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Put on shoes without lace (Magsuot ng sapatos na walang sintas.)" required <?= ($with_dressing=="Put on shoes without lace (Magsuot ng sapatos na walang sintas.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Put on shoes without lace (Magsuot ng sapatos na walang sintas.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)" required <?= ($with_dressing=="Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Pulls pants up with assistance. (Magsuot ng shorts nang may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_dressing" id="flexRadioDefault1" value="Independent dressing (Namimili ng kanyang damit.)" required <?= ($with_dressing=="Independent dressing (Namimili ng kanyang damit.)") ? "checked" : ""; ?>>
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
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Finger feed (Nagkakamay gamit ang hinlalaki at pangturo na daliri.)" required <?= ($with_feeding=="Finger feed (Nagkakamay gamit ang hinlalaki at pangturo na daliri.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Finger feed (Nagkakamay gamit ang hinlalaki at pangturo na daliri.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Uses spoon with some spill. (Gumagamit ng kutsara na may natatapon pang pagkain.)" required <?= ($with_feeding=="Uses spoon with some spill. (Gumagamit ng kutsara na may natatapon pang pagkain.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Uses spoon with some spill. (Gumagamit ng kutsara na may natatapon pang pagkain.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Uses spoon well. (Kumakain na kutsara lang ang gamit.)" required <?= ($with_feeding=="Uses spoon well. (Kumakain na kutsara lang ang gamit.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Uses spoon well. (Kumakain na kutsara lang ang gamit.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Uses spoon and fork with help.  (Gumagamit ng kutsara at tinidor nang may tulong.)" required <?= ($with_feeding=="Uses spoon and fork with help.  (Gumagamit ng kutsara at tinidor nang may tulong.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Uses spoon and fork with help.  (Gumagamit ng kutsara at tinidor nang may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Independent eating using spoon and fork. (Kayang kumain magisa gamit ang kutsara't tinidor.)" required <?= ($with_feeding=="Independent eating using spoon and fork. (Kayang kumain magisa gamit ang kutsara't tinidor.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Independent eating using spoon and fork. (Kayang kumain magisa gamit ang kutsara't tinidor.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="with_feeding" id="flexRadioDefault1" value="Spreads jam using a knife. (Kaya maglagay ng palaman gamit ang kutsilyo.)" required <?= ($with_feeding=="Spreads jam using a knife. (Kaya maglagay ng palaman gamit ang kutsilyo.)") ? "checked" : ""; ?>>
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
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Milk bottle (Dumedede sa bote.)" required <?= ($when_drinking=="Milk bottle (Dumedede sa bote.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Milk bottle (Dumedede sa bote.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Drinks from a straw. (Umiinom gamit ang straw.)" required <?= ($when_drinking=="Drinks from a straw. (Umiinom gamit ang straw.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Drinks from a straw. (Umiinom gamit ang straw.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Drinks from a glass or cup with spill. (Umiinom sa baso na may natatapon.)" required <?= ($when_drinking=="Drinks from a glass or cup with spill. (Umiinom sa baso na may natatapon.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Drinks from a glass or cup with spill. (Umiinom sa baso na may natatapon.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Drinks from a cup without spill.  (Umiinom sa baso nang walang tapon.)" required <?= ($when_drinking=="Drinks from a cup without spill.  (Umiinom sa baso nang walang tapon.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Drinks from a cup without spill.  (Umiinom sa baso nang walang tapon.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="when_drinking" id="flexRadioDefault1" value="Pours liquid from one container to another and can drink independently. (Kayang maglagay ng tubig galing sa pitchel at uminom ng tubig magisa.)" required <?= ($when_drinking=="Pours liquid from one container to another and can drink independently. (Kayang maglagay ng tubig galing sa pitchel at uminom ng tubig magisa.)") ? "checked" : ""; ?>>
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
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill1" id="flexRadioDefault1" value="Opens door knob. (Magbukas ng pintuan.)"  <?= ($other_skill1=="Opens door knob. (Magbukas ng pintuan.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Opens door knob. (Magbukas ng pintuan.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill2" id="flexRadioDefault1" value="Washes hand. (Maghugas at magpunas ng kamay.)"  <?= ($other_skill2=="Washes hand. (Maghugas at magpunas ng kamay.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Washes hand. (Maghugas at magpunas ng kamay.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill3" id="flexRadioDefault1" value="Brushes teeth with assistance. (Nagsisipilyo na may tulong.)"  <?= ($other_skill3=="Brushes teeth with assistance. (Nagsisipilyo na may tulong.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Brushes teeth with assistance. (Nagsisipilyo na may tulong.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill4" id="flexRadioDefault1" value="Washes face. (Naghihilamos ng mukha. )"  <?= ($other_skill4=="Washes face. (Naghihilamos ng mukha. )") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Washes face. (Naghihilamos ng mukha. )</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill5" id="flexRadioDefault1" value="Bathes independently. (Naliligo nang maayos at mag-isa.)" <?= ($other_skill5=="Bathes independently. (Naliligo nang maayos at mag-isa.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Bathes independently. (Naliligo nang maayos at mag-isa.)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="checkbox" name="other_skill6" id="flexRadioDefault1" value="Ties shoes (Nagsisintas ng sapatos.)" <?= ($other_skill6=="Ties shoes (Nagsisintas ng sapatos.)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Ties shoes (Nagsisintas ng sapatos.)</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">List any new problems or behavioral concern that  you have observed?</label> <br>
                    <label for="" class="fw-light">(Ilista ang mga bagong mga problema sa paguugali.)</label>
                    <input type="text" name="new_problem" value="<?= $new_problem; ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
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
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale1=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale1=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale1=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale1=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale1" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale1=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">There is little or nothing I wouldn't do for my child(ren) if it is necessary*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale2=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale2=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale2=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale2=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale2" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale2=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Utter phrases/sentences " I want milk." (Nagsalita ng buong pangugusap "Gusto ko ng gatas.")*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale3=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale3=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale3=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale3=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale3" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale3=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">Learn the alphabet, shapes, colors (Natuto ng alpabeto, hugis at kulay,)*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale4=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale4=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale4=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale4=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale4" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale4=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Learn to name/identify numbers and count (Natuto magbilang)*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale5=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale5=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale5=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale5=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale5" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale5=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">Sit (Upo)*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale6=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale6=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale6=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale6=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale6" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale6=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Crawl (Gapang)*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale7=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale7=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale7=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale7=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale7" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale7=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-dark">Walk alone (Maglakad magisa)*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale8=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale8=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale8=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale8=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale8" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale8=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                        <tr class="tr-bg">
                          <td class="text-dark">Run (Takbo)*</td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Strongly Disagree" required <?= ($stress_scale9=="Strongly Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Disagree" required <?= ($stress_scale9=="Disagree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Undecided" required <?= ($stress_scale9=="Undecided") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Agree" required <?= ($stress_scale9=="Agree") ? "checked" : ""; ?>>
                          </td>
                          <td class="text-center">
                            <input class="form-check-input border-dark" type="radio" name="stress_scale9" id="flexRadioDefault1" value="Strongly Agree" required <?= ($stress_scale9=="Strongly Agree") ? "checked" : ""; ?>>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Any concerns on toe walking when he/she was more than 3 years old?</label> <br>
                    <label for="" class="fw-light">(Nagkproblema ka ba sa kanyagng pagtingkayad nung siya ay edad 3 - 5?)*</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toe_walking" id="flexRadioDefault1" value="Yes (Oo)" required <?= ($toe_walking=="Yes (Oo)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">Yes (Oo)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="toe_walking" id="flexRadioDefault1" value="No (Hindi)" required <?= ($toe_walking=="No (Hindi)") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">No (Hindi)</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Any concerns on his motor skills while he/she was growing up? If yes, please list motor concerns (Ex. Clumsy, difficulty with balance and coordination, delayed in walking, uses wheel chair or needs to be carried around, etc.) If there is none, please put N/A</label> <br>
                    <label for="" class="fw-light">(Ilista ang mga problema sa paglalakad o paggalaw habang siya ay lumalaki) (Hal. Hirap maglakad, laging natutumba, kailangan kargahin, atbp.)<br>Kung wala, pakilagay ang N/A</label>
                    <input type="text" name="motor_skill" value="<?= $motor_skill;  ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">During your pregnancy, were you stressed, depressed, had any infections or illnesses? What month of pregnancy?</label> <br>
                    <label for="" class="fw-light">(Nung nagbuntis ka, ikaw ba ay stressed or nagkasakit? Anong kabuwanan?)</label>
                    <input type="text" name="during_pregnancy" value="<?= $during_pregnancy;  ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">List all of your children by age and put an (*) asterisk on the child for Developmental Assessment and put an (A) for adopted, or place any medical concerns.</label> <br>
                    <label for="" class="fw-light">Ex.: <br>1- AB, 5 y.o -  A<br>2- CD, 1.2 y.o - *</label>
                    <label for="" class="fw-light">(Ilista ang pagkakasunod sunod ng inyong mga anak base sa kanilang edad. Lagyan ng (*) asterisk ang anak na para sa Developmental Assessement at (A) kung siya ay inampon.) </label>
                    <input type="text" name="list_children" value="<?= $list_children;  ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Type of delivery done on your child for assessment,  normal delivery or cesarean section (CS)? If CS, why?</label> <br>
                    <label for="" class="fw-light">(Ikaw ba ay nag normal delivery o cesarean sa anak mo na magpapaassessment?) Kung CS, bakit?</label>
                    <input type="text" name="type_of_delivery" value="<?= $type_of_delivery;  ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Was your child for assessment admitted at the neonatal intensive care unit (NICU) after delivery? If yes, why?</label> <br>
                    <label for="" class="fw-light">(Ang anak niyo po ba na iaassess ay naadmit sa ICU pagkapanganak? Kung oo, bakit siya naadmit? Hal.  nahirapan huminga, kailangan ng antibiotic, atbp.)</label>
                    <input type="text" name="was_your_child" value="<?= $was_your_child;  ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">Does your child for assessment have any other medical conditions? List the disorder and current medications he/she is taking.</label> <br>
                    <label for="" class="fw-light">(Ang anak niyo po ba ay may iba pang mga sakit? Isulat ang pangalan ng sakit at mga gamot na iniinom Hal. problema sa puso - furosemide )</label>
                    <input type="text" name="other_medical_condition" value="<?= $other_medical_condition;  ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">List the diseases or disorders in your family.</label> <br>
                    <label for="" class="fw-light">Ex.:<br>mother side- Hypertension, Autism<br>father side- Diabetes, Down syndrome<br><br>(Anu-ano ang mga sakit  na mayroon sa inyong pamilya?) Ilista ang mga sakit sa pamilya ng nanay at sa pamilya ng tatay. (Hal. pamilya ng nanay:  High blood, Diabetes, Autism, atbp.)</label>
                    <input type="text" name="list_disease_fam" value="<?= $list_disease_fam;  ?>" class="form-control border-0 border-bottom" style="border-bottom: 2px solid #000;" placeholder="Your answer">
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="fw-bold">How many hours does your child watch TV and play with gadgets per day?</label> <br>
                    <label for="" class="fw-light">(Ilang oras nanunuod ng tv at naglalaro ng gadget ang anak ninyo?)</label>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="30 min/day" required <?= ($watch_tv=="30 min/day") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">30 min/day</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="1 hour per day" required <?= ($watch_tv=="1 hour per day") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">1 hour per day</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="2 hours per day" required <?= ($watch_tv=="2 hours per day") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">2 hours per day</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input border-dark" type="radio" name="watch_tv" id="flexRadioDefault1" value="more than 4 hours a day" required <?= ($watch_tv=="more than 4 hours a day") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="flexRadioDefault1">more than 4 hours a day</label>
                    </div>
                    <hr class="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-end">
                    <button type="submit" name="update_dr_ass" class="btn" style="background-color:rgba(63, 147, 245)">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php
    }
  } 
  if(isset($_POST['update_dr_ass'])){
    $userID=mysqli_real_escape_string($con, $_POST['userID']);
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
    $toe_walking=mysqli_real_escape_string($con, $_POST['toe_walking']);
    $motor_skill=mysqli_real_escape_string($con, $_POST['motor_skill']);
    $during_pregnancy=mysqli_real_escape_string($con, $_POST['during_pregnancy']);
    $list_children=mysqli_real_escape_string($con, $_POST['list_children']);
    $type_of_delivery=mysqli_real_escape_string($con, $_POST['type_of_delivery']);
    $was_your_child=mysqli_real_escape_string($con, $_POST['was_your_child']);
    $other_medical_condition=mysqli_real_escape_string($con, $_POST['other_medical_condition']);
    $list_disease_fam=mysqli_real_escape_string($con, $_POST['list_disease_fam']);
    $watch_tv=mysqli_real_escape_string($con, $_POST['watch_tv']);

    
    $query = "UPDATE `learner_dr` SET `diagnosis`='$diagnosis',`last_dev_ass`='$last_dev_ass',`intervention`='$intervention',`current_grade_level`='$current_grade_level',`improvement`='$improvement',`toilet_training`='$toilet_training',`with_dressing`='$with_dressing',`with_feeding`='$with_feeding',`when_drinking`='$when_drinking',`other_skill1`='$other_skill1',`other_skill2`='$other_skill2',`other_skill3`='$other_skill3',`other_skill4`='$other_skill3',`other_skill5`='$other_skill5',`other_skill6`='$other_skill6',`new_problem`='$new_problem',`stress_scale1`='$stress_scale1',`stress_scale2`='$stress_scale2',`stress_scale3`='$stress_scale3',`stress_scale4`='$stress_scale4',`stress_scale5`='$stress_scale5',`stress_scale6`='$stress_scale6',`stress_scale7`='$stress_scale7',`stress_scale8`='$stress_scale8',`stress_scale9`='$stress_scale9',`toe_walking`='$toe_walking',`motor_skill`='$motor_skill',`during_pregnancy`='$during_pregnancy',`list_children`='$list_children',`type_of_delivery`='$type_of_delivery',`was_your_child`='$was_your_child',`other_medical_condition`='$other_medical_condition',`list_disease_fam`='$list_disease_fam',`watch_tv`='$watch_tv' WHERE userID='$userID'";
    $query_run = mysqli_query($con, $query);
    header("Location: step3-review.php");
  }
?>
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
