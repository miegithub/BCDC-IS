<?php
ob_start();
session_start();
include('../admin/config/dbcon.php');
$currentPage="inquiries";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

if(!isset($_SESSION['learnerID'])){
  #ob_end_flush();
  #header("Location: inquiries.php");
  #exit(0);
}
function get_size($size){
  $kb_size = $size / 1024;
  $formal_size = number_format($kb_size,2);
  return $formal_size;
}
?>
<style>
  .main{
    background-color: white;
  }
  .right-button-active{
    font-size: 14px;
    padding: 9px 7px;
    border: 1px solid black;
    margin-left: -1px;
    box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.2);
  }
  .right-button{
    font-size: 14px;
    padding: 9px 7px;
    color: rgba(0, 134, 188);
  }
  .form-control{
    border: none;
  }
</style>
<div class="container-fluid">
  <?php
    $learnerID= $_SESSION['learnerID'];
    $search_learner = "SELECT * FROM learner_report WHERE learnerID='$learnerID'";
    $search_learner_run = mysqli_query($con, $search_learner);
    if($search_learner_run){
      if(mysqli_num_rows($search_learner_run) > 0){
        foreach($search_learner_run as $row){
          $q1=$row['q1'];
          $q2=$row['q2'];
          $q3=$row['q3'];
          $q4=$row['q4'];
          $q5=$row['q5'];
          $q6=$row['q6'];
          $q7=$row['q7'];
          $q8=$row['q8'];
          $q9=$row['q9'];
          $q10=$row['q10'];
          $q11=$row['q11'];
          $q12=$row['q12'];
          $q13=$row['q13'];
          $q14=$row['q14'];
        }
      }
      else{
        $q1=null;
        $q2=null;
        $q3=null;
        $q4=null;
        $q5=null;
        $q6=null;
        $q7=null;
        $q8=null;
        $q9=null;
        $q10=null;
        $q11=null;
        $q12=null;
        $q13=null;
        $q14=null;
      }
    }
    

  $select_question = "SELECT * FROM `learner` WHERE learnerID='$learnerID'";
  $select_question_run = mysqli_query($con,$select_question);
  if($select_question_run){
    if(mysqli_num_rows($select_question_run) > 0){
      foreach($select_question_run as $row){
        if($row['chief_complain']=="Initial evaluation for speech, behavior or learning problem (unang makikita ng doktor)"){
          
          $userID=$row['userID'];
          $get_question2 = "SELECT * FROM `learner_dr2` WHERE useriD='$userID'";
          $get_question2_run = mysqli_query($con,$get_question2);
          if($get_question2_run){
            if(mysqli_num_rows($get_question2_run) > 0){
              foreach($get_question2_run as $get){
                ?>
                
                <div class="row">
                  <div class="col-md-12">
                    <h1 class=" mb-0">Patient Details</h1>
                    <hr class=" mb-1 mt-0">
                  </div>
                </div>
                
                <div class="row  p-0 m-0">
                  <div class="col-md-10 px-0">
                    <div class="container border border-dark py-2">

                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>1. Toilet Training1</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q1" id="flexRadioDefault1" value="Very often (Madalas napapansin)" readonly checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q1']; ?>
                            </label>
                          </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>2. Has difficulty keeping attention to what needs to be done.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q2" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q2']; ?>
                            </label>
                          </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>3. Does not seem to listen when spoken to directly.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q3" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q3']; ?>
                            </label>
                          </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>4. Does not follow through when given direnctions and fails to finish activities (Not due to refusal or failure to understand.)</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q4" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q4']; ?>
                            </label>
                          </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>5. Has difficulty organzing tasks and activities.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q5" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q5']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>6. Avoids, dislikes, or does not want to start tasks that require ongoing mental effort</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q6" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q6']; ?>
                            </label>
                          </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>7. Avoids, dislikes, or does not want to start tasks that require ongoing mental effort</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q7" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q7']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>8. Is easily distracted by noises or other stimuli.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q8" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q8']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>9. Is forgetful in daily activities.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q9" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q9']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>10. Fidgets with hands or feet or squirms in seat.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q10" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q10']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>11. Leaves seat when remaining seated is expected.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q11" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q11']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>12. Runs about or climbs too much when remaining seated is expected.</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q12" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q12']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>13. Has difficulty playing or beginning quiet play activities*</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q13" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q13']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>14. Is “on the go” or often acts as if “driven by a motor”</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q14" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q14']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>15. Talks too much</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q15" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q15']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>16. Blurts out answers before questions have been completed</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q16" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q16']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>17. Has difficulty waiting for his/her turn</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q17" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q17']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>18. Interrupts or intrudes on others’ conversations and/or activities</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q18" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q18']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>19. Argues with adults</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q19" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q19']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>20. Loses temper</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q20" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q20']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>21. Actively defies or refuses to go along with adults’ requests or rules</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q21" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q21']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>22. Deliberately annoys people</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q22" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q22']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>23. Blames others for his/her mistakes or misbehaviors</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q23" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q23']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>24. Is touchy or easily annoyed by others</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q24" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q24']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>25. Is angry or resentful</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q25" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q25']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>26. Is spiteful and wants to get even</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q26" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q26']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>27. Bullies, threatens, or intimidates others</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q27" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q27']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>28. Starts physical fights</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q28" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q28']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>29. Lies to get out of trouble or to avoid obligations (ie,“cons” others)</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q29" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q29']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>30. Is truant from school (skips school) without permission</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q30" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q30']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>31. Is physically cruel to people</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q31" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q31']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>32. Has stolen things that have value</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q32" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q32']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>33. Deliberately destroys others’ properties</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q33" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q33']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>34. Has used a weapon that can cause serious harm (bat, knife, brick, gun)</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q34" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q34']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>35. Is physically cruel to animals</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q35" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q35']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>36. Has deliberately set fires to cause damage</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q36" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q36']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>37. Has broken into someone else’s home, business, or car</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q37" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q37']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>38. Has stayed out at night without permission</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q38" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q38']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>39. Has run away from home overnight</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q39" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q39']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>40. Has forced someone into sexual activity</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q40" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q40']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>41. Is fearful, anxious, or worried </strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q41" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q41']; ?>
                            </label>
                          </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>42. Is afraid to try new things for fear of making mistakes</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q42" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q42']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>43. Feels worthless or inferior</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q43" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q43']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>44. Blames self for problems, feels guilty </strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q44" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q44']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>45. Feels lonely, unwanted, or unloved; complains that “no one loves him/her” </strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q45" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q45']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>46. Is sad, unhappy, or depressed</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q46" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q46']; ?>
                            </label>
                          </div>
                          
                          <hr class="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="fw-bold mb-2"><strong>47. Is self-conscious or easily embarrassed</strong> </label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q47" id="flexRadioDefault2" value="Very often (Madalas napapansin)" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            <?= $get['q47']; ?>
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
                      
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">48. Overall school performance</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale1']; ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">49. Reading</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale2']; ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">50. Writing</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale3']; ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">51. Mathematics</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale4']; ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">52. Relationship with parents</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale5']; ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">53. Relationship with siblings</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale6']; ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">54. Relationship with peers</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale7']; ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-8">
                          <label for="">55. Participation in organized activities</label>
                        </div>
                        <div class="col-md-4 pt-3">
                        <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale8']; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="flexRadioDefault1" class="mb-2">Is you child depressed or scared/anxious?</label>
                          <div class="form-check ms-3">
                            <input class=" form-check-input border-dark" type="radio" name="q56" id="flexRadioDefault2" value="YES" readonly checked>
                            <label class="form-check-label" for="flexRadioDefault2"><?= $get['q56']; ?>
                            </label>
                          </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12 text-end">
                          <a href="ass-report.php"  class="btn" style="background-color:rgba(63, 147, 245)">Next</a>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                  <div class="col-md-2 p-0 " style="width:16%">
                    <div class="container-fluid px-0">
                      <div class="row">
                        <div class="col-md-12">
                          <a href="inquiries-view.php?id=<?= $_SESSION['learnerID']; ?>"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">Inquirer/Appointment Details</button></a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <a href="inquiries-view-ass.php?id=<?= $_SESSION['learnerID']; ?>"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button-active" style="">View Assessment Form</button></a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <a href="ass-report.php"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">Assessment Report</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
          
          <?php
              }
            }
            else{
              ?> 
              <div class="container">
                <div class="row">
                  <div class="col-md-12 text-center">
                  <label for="">No answered assessment</label>
                  </div>
                </div>
              </div>
              <?php
            }
          }
                
        }
        else{
          $userID=$row['userID'];
          $get_question2 = "SELECT * FROM `learner_dr` WHERE useriD='$userID'";
          $get_question2_run = mysqli_query($con,$get_question2);
          if($get_question2_run){
            if(mysqli_num_rows($get_question2_run) > 0){
              foreach($get_question2_run as $get){
          ?>
          <div class="row">
            <div class="col-md-12">
              <h1 class=" mb-0">Patient Details</h1>
              <hr class=" mb-1 mt-0">
            </div>
          </div>
          <div class="row  p-0 m-0">
            <div class="col-md-10 px-0">
              <div class="container border border-dark py-2">
                <div class="row">
                  <div class="col-md-12">
                    <form action="" method="post">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            <h5><strong>DEVELOPMENTAL ASSESSMENT RESULTS</strong></h5>
                            <hr>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Name of patient or concerns <br>(Problema ng bata)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['name']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Scheduled date of assessment <br>
                            (Naka-iskedyul na petsa ng pagsusuri)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['assessment_sched']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Scheduled date of assessment <br>
                            (Naka-iskedyul na petsa ng pagsusuri)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['assessment_sched']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Birthday <br> (Kaarawan)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['date_of_birth']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Age of patient in years and months (Ex. 1 yr and 6 mos) <br>
                            (Edad ng bata - taon at buwan Hal. 1 taon at 6 na buwan)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['age']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Address  <br>
                            (Tirahan)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['address']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Contact no.</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['contact_no']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Email Address</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['guardian_email']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Gender of patient <br>
                            (Kasarian ng bata)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['gender']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Chief complaint or concerns <br>
                            (Problema ng bata)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $row['chief_complain']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">What is his/her diagnosis? <br>
                            (Ano po ang diagnosis ng iyong anak?)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['diagnosis']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">When was his/her last developmental assessement? <br>
                            (Kailan po siya huling nakita ng developmental pediatrician?)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['last_dev_ass']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">What are the interventions or therapy given to your child? (Ex. Occupational therapy, physical therapy, speech therapy, SpED, regular school, social skills training, tutorials, etc) How frequent? (Ex. Twice a week) <br>
                            (Ano po ang mga interbensyon na binibigay sa anak ninyo? Hal. Occupational therapy, physical therapy atbp.? Ilang beses sa isang linggo?) </label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['intervention']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">What is the current grade level, school and therapy center of your child? If not yet enrolled, please put N/A. <br>
                            (Saan nagaaral at anong grade level ng iyong anak? Saan siya ngthetherapy? Kung hindi pa, pakilagay N/A)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['current_grade_level']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">What are the improvements you have observed on his/her  <br>
                              1. language and communication (ex. mas dumami na po salita niya, nagmumustra na po siya) <br>
                              2. behavior (ex. di na po siya nanakit, nakikinig na po sa instruksyon) <br>
                              3. academics/learning (ex. nagbabasa na po siya, marunong na po siya ng calculator)  <br>
                              (Ano pong mga pagbabago ang napansin ninyo sa kanyang pakikipagusap, paguugali, pag-aaral at pag-aalaga ng sarili?)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['improvement']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Toilet Training</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['toilet_training']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">With dressing, what can he/she do? <br>
                            (Sa pagdadamit, ano ang malimit niyang ginagawa?)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['with_dressing']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">With feeding, what can he/she do? <br>
                            (Ano ang malimit na nagagawa niya habang kumakain?)</label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['with_feeding']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">When drinking, what can he/she do? <br>
                            (Ano ang malimit na nagagawa niya kapag umiinom.)
                            </label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['diagnosis']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">What other skills can he/she do?  (Answer can be more than 1) <br>

                              (Ano pa ang mga kaya niyang gawin? Maaaring pumili ng marami.)
                            </label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                            <label type="text" class=""><?= $get['when_drinking']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">List any new problems or behavioral concern that  you have observed?  <br>

                              (Ilista ang mga bagong mga problema sa paguugali.)
                            </label>
                          </div>
                          <div class="col-md-12 border-bottom pb-2 mt-2">
                          <?php
                            for ($i = 1; $i <= 5; $i++) {
                              if($get['other_skill'.$i]== null || $get['other_skill'.$i]==""){

                              }
                              else{
                          ?>
                                <label type="text" class="">• <?= $get['other_skill'.$i]; ?></label><br>
                          <?php
                              }
                            }
                          ?>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-12">
                            <label for="">Parental Stress Scale (Eskala ng Stress Pangmagulang) <br>
                            references: Berry JD & Jones W.H.
                            </label>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">I am happy in my role as a parent. <br>
                            (Masaya ako sa aking tungkulin bilang isang magulang.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale1']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">There is little or nothing I wouldn't do for my child(ren) if it is necessary. <br> 
                            (May kaunti o wala akong hindi gagawin para sa aking (mga) anak kung kinakailangan.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale2']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">Caring for my child(ren) sometimes takes more time and energy than I have to give. <br>
                            (Ang pag-aalaga sa aking (mga) anak kung minsan ay nangangailangan ng mas maraming oras at 
                            lakas kaysa sa kailangan kong ibigay.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale3']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">I sometimes worry whether I am doing enough for my child(ren).<br>
                            (Minsan nag-aalala ako kung sapat ba ang ginagawa ko para sa aking (mga) anak).
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale4']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">I feel close to my child(ren).<br>
                            (Pakiramdam ko ay malapit ako sa aking (mga) anak.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale5']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">I enjoy spending time with my child(ren).<br>
                            (Nasisiyahan akong gumugol ng oras kasama ang aking (mga) anak.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale6']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">My child(ren) is an important source of affection for me. <br>
                            (Ang aking (mga) anak ay isang mahalagang pinagmumulan ng pagmamahal para sa akin.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale7']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">Having child(ren) gives me a more certain and optimistic view for the future. <br>
                              (Ang pagkakaroon ng (mga) anak ay nagbibigay sa akin ng mas tiyak at positibing pananaw para 
                              sa hinaharap.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale8']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">The major source of stress in my life is my child(ren). <br>
                            (Ang pangunahing pinagmumulan ng stress sa aking buhay ay ang aking (mga) anak.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale9']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">Having child(ren) leaves little time and flexibility in my life. <br>
                              (Ang pagkakaroon ng (mga) anak ay naglilimita sa aking oras at kakayahang umangkop sa aking 
                              buhay.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale10']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">It is difficult to balance different responsibilities because of my child(ren).<br>
                            (Mahirap balansehin ang iba't ibang responsibilidad dahil sa (mga) anak ko.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale11']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">The behaviour of my child(ren) is often embarrassing or stressful to me.<br>
                            (Ang pag-uugali ng aking (mga) anak ay madalas na nakakahiya o nakaka-stress sa akin.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale12']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">If I had it to do over again, I might decide not to have child(ren).<br>
                            (Kung paulit-ulit ko itong gagawin, baka magdesisyon akong hindi na magkaroon ng (mga) anak.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale13']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">I feel overwhelmed by the responsibility of being a parent.<br>
                            (Nabibigatan ako sa responsibilidad ng pagiging magulang.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale14']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">Having child(ren) has meant having too few choices and too little control over my   life.<br>
                              (Ang pagkakaroon ng (mga) anak ay nangangahulugan ng pagkakaroon ng iilang pagpipilian at 
                              masyadong kaunting kontrol sa aking buhay.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale15']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">I am satisfied as a parent.<br>
                            (Kontento ako sa aking pagiging magulang.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale16']; ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-8">
                            <label for="">I find my child/ren enjoyable.<br>
                            (Natutuwa ako sa aking (mga) anak.)
                            </label>
                          </div>
                          <div class="col-md-4 pt-3">
                          <input class="form-check-input border-dark" type="radio" name="" id="flexRadioDefault1" value="Undecided" readonly checked> <?= $get['stress_scale17']; ?>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-12 text-end">
                            <a href="ass-report.php" class="btn btn-primary">Next</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- RIGHT BUTTON -->
            <div class="col-md-2 p-0 " style="width:16%">
              <div class="container-fluid px-0">
                <div class="row">
                  <div class="col-md-12">
                    <a href="inquiries-view.php?id=<?= $_SESSION['learnerID']; ?>"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">Inquirer/Appointment Details</button></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="inquiries-view-ass.php?id=<?= $_SESSION['learnerID']; ?>"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button-active" style="">View Assessment Form</button></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="ass-report.php"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">Assessment Report</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
              }
            }
          }
        }
      }
    }
  }
  ?>
  
</div>
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
