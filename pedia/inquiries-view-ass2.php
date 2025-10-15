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
    font-size: 10px;
    padding: 9px 7px;
    border: 1px solid black;
    margin-left: -1px;
    box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.2);
  }
  .right-button{
    font-size: 10px;
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
          $q15=$row['q15'];
          $q16=$row['q16'];
          $q17=$row['q17'];
          $q18=$row['q18'];
          $q19=$row['q19'];
          $q20=$row['q20'];
          $q21=$row['q21'];
          $q22=$row['q22'];
          $q23=$row['q23'];
          $q24=$row['q24'];
          $q25=$row['q25'];
          $q26=$row['q26'];
          $q27=$row['q27'];
        }
      }
      else{
        $q15=null;
        $q16=null;
        $q17=null;
        $q18=null;
        $q19=null;
        $q20=null;
        $q21=null;
        $q22=null;
        $q23=null;
        $q24=null;
        $q25=null;
        $q26=null;
        $q27=null;
      }
    }
    
    if(isset($_POST['submit_report'])){
      
    $q15=$_POST['q15'];
    $q16=$_POST['q16'];
    $q17=$_POST['q17'];
    $q18=$_POST['q18'];
    $q19=$_POST['q19'];
    $q20=$_POST['q20'];
    $q21=$_POST['q21'];
    $q22=$_POST['q22'];
    $q23=$_POST['q23'];
    $q24=$_POST['q24'];
    $q25=$_POST['q25'];
    $q26=$_POST['q26'];
    $q27=$_POST['q27'];

    $query = "UPDATE `learner_report` SET `q15`='$q15',`q16`='$q16',`q17`='$q17',`q18`='$q18',`q19`='$q19',`q20`='$q20',`q21`='$q21',`q22`='$q22',`q23`='$q23',`q24`='$q24',`q25`='$q25',`q26`='$q26', q27='$q27' WHERE learnerID='$learnerID'";
    $query_run = mysqli_query($con, $query);
    header("Location: ass-report.php");
    }
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
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Toilet Training</label>
                    <input type="text" value="<?= $q15; ?>" required name="q15" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">With dressing, what can he/she do?
                    <br>(Sa pagdadamit, ano ang malimit niyang ginagawa?)</label>
                    <input type="text" value="<?= $q16; ?>" required name="q16" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">With feeding, what can he/she do?
                    <br>(Ano ang malimit na nagagawa niya habang kumakain?)</label>
                    <input type="text" value="<?= $q17; ?>" required name="q17" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">When drinking, what can he/she do?
                    <br>(Ano ang malimit na nagagawa niya kapag umiinom.)</label>
                    <input type="text" value="<?= $q18; ?>" required name="q18" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">What other skills can he/she do? (Answer can be more than 1)
                    <br>(Ano pa ang mga kaya niyang gawin? Maaaring pumili ng marami.)</label>
                    <input type="text" value="<?= $q19; ?>" required name="q19" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">During your pregnancy, were you stressed, depressed, had any infections or illnesses? What month of pregnancy?
                    <br>(Nung nagbuntis ka, ikaw ba ay stressed or nagkasakit? Anong kabuwanan?)</label>
                    <input type="text" value="<?= $q20; ?>" required name="q20" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">List all of your children by age and put an (*) asterisk on the child for Developmental Assessment and put an (A) for adopted, or place any medical concerns.
                    <br>Ex.: 1- AB, 5 y.o -  A 
                    <br>       2- CD, 1.2 y.o - 
                    <br>(Ilista ang pagkakasunod sunod ng inyong mga anak base sa kanilang edad. Lagyan ng (*) asterisk ang anak na para sa Developmental Assessement at (A) kung siya ay inampon.) </label>
                    <textarea type="text" value="<?= $q21; ?>" required name="q21" placeholder="Answer" class="form-control border-bottom border-dark"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Type of delivery done on your child for assessment,  normal delivery or cesarean section (CS)? If CS, why?
                    <br>(Ikaw ba ay nag normal delivery o cesarean sa anak mo na magpapaassessment?) Kung CS, bakit?</label>
                    <input type="text" value="<?= $q22; ?>" required name="q22" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Was your child for assessment admitted at the neonatal intensive care unit (NICU) after delivery? If yes, why?  
                    <br>(Ang anak niyo po ba na iaassess ay naadmit sa ICU pagkapanganak? Kung oo, bakit siya naadmit? Hal.  nahirapan huminga, kailangan ng antibiotic, atbp.)</label>
                    <input type="text" value="<?= $q23; ?>" required name="q23" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Does your child for assessment have any other medical conditions? List the disorder and current medications he/she is taking. 
                    <br>(Ang anak niyo po ba ay may iba pang mga sakit? Isulat ang pangalan ng sakit at mga gamot na iniinom Hal. problema sa puso - furosemide )</label>
                    <input type="text" value="<?= $q24; ?>" required name="q24" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">List the diseases or disorders in your family. 
                      <br>Ex.: 
                      <br>    mother  side- Hypertension, Autism 
                      <br>    father side- Diabetes, Down syndrome 
                      <br>(Anu-ano ang mga sakit  na mayroon sa inyong pamilya?) Ilista ang mga sakit sa pamilya ng nanay at sa pamilya ng tatay. (Hal. pamilya ng nanay:  High blood, Diabetes, Autism, atbp.)</label>
                    <input type="text" value="<?= $q25; ?>" required name="q25" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">How many hours does your child watch TV and play with gadgets per day?
                    <br>(Ilang oras nanunuod ng tv at naglalaro ng gadget ang anak ninyo?)</label>
                    <input type="text" value="<?= $q26; ?>" required name="q26" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">If your child is 1 month to 17 months old, please press A
                      <br>If your child is 18 months to 3 years old, please press B
                      <br>If your child is 4 to 5 years old, please press C
                      <br>If your child is more than 6 - 14 years old, please press D
                      <br>If your child is more than 15 years old,  please press E</label>
                    <input type="text" value="<?= $q27; ?>" required name="q27" placeholder="Answer" class="form-control border-bottom border-dark">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr class="mb-1">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-md-12 text-end">
                    <?php
                      
                      $select_learner_ass = "SELECT * FROM learner_ass WHERE learnerID='$learnerID'";
                      $select_learner_ass_run = mysqli_query($con, $select_learner_ass);
                      if(mysqli_num_rows($select_learner_ass_run) >0){
                        $create= "View";
                      }
                      else{
                        $create ="Create";
                      }
                    ?>
                    <a href="inquiries-view-ass.php" class="btn btn-success">Back</a>
                    <button type="submit" href="ass-report.php" name="submit_report" class="btn btn-primary"><?= $create; ?> Assessment Report</button>
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
            <a href="inquiries-view.php?id=<?= $_GET['id']; ?>"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">Inquirer/Appointment Details</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="inquiries-view-ass.php"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button-active" style="">View Assessment Form</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href=""><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">Assessment Report</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
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
