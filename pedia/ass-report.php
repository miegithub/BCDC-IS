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
</style>
<div class="container-fluid" >
  <?php
    $learnerID= $_SESSION['learnerID'];
    $query_learner = "SELECT * FROM learner WHERE learnerID='$learnerID'";
    $query_learner_run = mysqli_query($con, $query_learner);
    foreach($query_learner_run as $row){
      $name=$row['name'];
      $age=$row['age'];
      $date_of_birth=$row['date_of_birth'];
    }
    if(isset($_POST['submit_assessment'])){
      
      $patient_name=$_POST['patient_name'];
      $date=$_POST['date'];
      $age=$_POST['age'];
      $date_of_birth=$_POST['date_of_birth'];
      $dev_diagnosis=$_POST['dev_diagnosis'];
      $current_concern=$_POST['current_concern'];
      $fine_motor=$_POST['fine_motor'];
      $language=$_POST['language'];
      $personal=$_POST['personal'];
      $cognitive=$_POST['cognitive'];
      $behavior=$_POST['behavior'];
      $lang_com=$_POST['lang_com'];
      $social=$_POST['social'];
      $adaptive=$_POST['adaptive'];
      $conceptual=$_POST['conceptual'];
      $practical=$_POST['practical'];
      $recommendation=$_POST['recommendation'];

      $query = "INSERT INTO `learner_ass`(`learnerID`, `ass_date`, `dev_diagnosis`, `current_concern`, `fine_motor`, `language`, `personal`, `cognitive`, `behavior`, `social`, `adaptive`, `conceptual`, `practical`, `recommendation`, lang_com) VALUES ('$learnerID','$date','$dev_diagnosis','$current_concern','$fine_motor','$language','$personal','$cognitive','$behavior','$social','$adaptive','$conceptual','$practical','$recommendation','$lang_com')";
      $query_run = mysqli_query($con, $query);

      
      $query_update = "UPDATE learner SET trigger_assessment='1' where learnerID='$learnerID'";
      mysqli_query($con, $query_update);

      if($query_run){
        echo '<script>alert("You successfully submitted the Assessment Report!")</script>';
        $name= $_SESSION["auth_user"]['name'];
        $position = $_SESSION["auth_user"]['position'];
        $activity = "ASSESSMENT REPORT SUBMITED SUCCESSFULLY";
        date_default_timezone_set('Asia/Manila');
        $current_time = date("h:i a");
        $date_today = date("Y-m-d");
        $query1 = "INSERT INTO `log_monitoring` (`name`, position, activity,`date`, action_time) VALUES ('$name','$position','$activity','$date_today','$current_time')";
        $query_run1 = mysqli_query($con, $query1);
        header("Location: inquiries.php");
        exit(0);
      }
    }

    $select_learner_ass = "SELECT * FROM learner_ass WHERE learnerID='$learnerID'";
    $select_learner_ass_run = mysqli_query($con, $select_learner_ass);
    if(mysqli_num_rows($select_learner_ass_run) >0){
      foreach($select_learner_ass_run as $row){
        $disable = "disabled";
        $readonly = "readonly";
        $borderdark = "";
        $date=$row['ass_date'];
        $dev_diagnosis=$row['dev_diagnosis'];
        $current_concern=$row['current_concern'];
        $fine_motor=$row['fine_motor'];
        $language=$row['language'];
        $personal=$row['personal'];
        $cognitive=$row['cognitive'];
        $behavior=$row['behavior'];
        $lang_com=$row['lang_com'];
        $social=$row['social'];
        $adaptive=$row['adaptive'];
        $conceptual=$row['conceptual'];
        $practical=$row['practical'];
        $recommendation=$row['recommendation'];
      }
    }
    else{
      $disable = "";
      $readonly = "";
      $borderdark = "border-dark";
      $date=null;
      $dev_diagnosis=null;
      $current_concern=null;
      $fine_motor=null;
      $language=null;
      $personal=null;
      $cognitive=null;
      $behavior=null;
      $lang_com=null;
      $social=null;
      $adaptive=null;
      $conceptual=null;
      $practical=null;
      $recommendation=null;
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
                  <div class="col-md-12 text-center">
                    <img src="../images/bcdc_step3.jpg" alt="">
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for=""> <strong>Name of Patient:</strong> </label>
                    <input type="text" name="patient_name" class="form-control" value="<?= $name; ?>" readonly>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <label for=""> <strong>Date:</strong> </label>
                    <input type="date" name="date" class="form-control <?= $borderdark; ?>" value="<?= $date; ?>" <?= $readonly; ?>>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label for=""> <strong>Age:</strong> </label>
                    <input type="text" name="age" class="form-control" value="<?= $age; ?>" readonly>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <label for=""> <strong>Birthdate:</strong> </label>
                    <input type="text" name="date_of_birth" class="form-control" value="<?= $date_of_birth; ?>" readonly>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Developmental Diagnosis:</strong></label>
                    <textarea name="dev_diagnosis" placeholder="Enter Developmental Diagnosis" class="form-control <?= $borderdark; ?>" id="" <?= $readonly; ?>><?= $dev_diagnosis; ?></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for=""><strong>Current Concerns:</strong></label>
                    <textarea name="current_concern" placeholder="Enter current concern" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $current_concern; ?></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for=""><strong>Present Developmental Profile</strong></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2 text-center">
                    <label for=""><strong>Domain</strong></label>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for=""><strong>Functional Age</strong></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <hr class="mb-1">
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-md-2 text-end">
                    <label for=""><strong>Name of Patient:</strong></label>
                  </div>
                  <div class="col-md-4 text-center">
                    <input type="text" class="form-control" value="<?= $name; ?>" readonly>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-md-2 text-end">
                    <label for=""><strong>Fine Motor:</strong></label>
                  </div>
                  <div class="col-md-4 text-center">
                    <input type="text" name="fine_motor" value="<?= $fine_motor; ?>" placeholder="Enter Fine Motor" class="form-control <?= $borderdark; ?>" <?= $readonly; ?> >
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-md-2 text-end">
                    <label for=""><strong>Language:</strong></label>
                  </div>
                  <div class="col-md-4 text-center">
                    <input type="text" placeholder="Enter Language" class="form-control <?= $borderdark; ?>" name="language" value="<?= $language; ?>" <?= $readonly; ?>>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-md-2 text-end">
                    <label for=""><strong>Personal/Social:</strong></label>
                  </div>
                  <div class="col-md-4 text-center">
                    <input type="text" placeholder="Enter Personal/Social" class="form-control <?= $borderdark; ?>" name="personal" value="<?= $personal; ?>" <?= $readonly; ?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-2 text-end">
                    <label for=""><strong>Cognitive:</strong></label>
                  </div>
                  <div class="col-md-4 text-center">
                    <input type="text" placeholder="Enter Cognitive" class="form-control <?= $borderdark; ?>" name="cognitive" value="<?= $cognitive; ?>" <?= $readonly; ?>>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Clinical Observations</strong></label>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Behavior:</strong></label>
                    <textarea name="behavior" placeholder="Enter Behavior" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $behavior; ?></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Language/Communication:</strong></label>
                    <textarea name="lang_com" placeholder="Enter language/communication" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $lang_com; ?></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Social:</strong></label>
                    <textarea name="social" placeholder="Enter Social" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $social; ?></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Adaptive:</strong></label>
                    <textarea name="adaptive" placeholder="Enter adaptive" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $adaptive; ?></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Conceptual:</strong></label>
                    <textarea name="conceptual" placeholder="Enter conceptual" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $conceptual; ?></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Practical:</strong></label>
                    <textarea name="practical" placeholder="Enter practical" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $practical; ?></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for=""><strong>Recommendations:</strong></label>
                    <textarea name="recommendation" placeholder="Enter recommendation" <?= $readonly; ?> class="form-control <?= $borderdark; ?>" id=""><?= $recommendation; ?></textarea>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-12">
                    <label for=""><strong>Dr. Hazel Gertrude Manabal-Reyes</strong>
                    <br><strong>Developmental and Behavioral Pediatrics</strong>
                    <br>Lic. No. 107177
                    <br>Disclaimer: No signature affixed. Sent via electronic mail.
                    <br>                        This report is not valid for medico-legal purposes.</label>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12 text-end">
                    <button type="button" class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#viewsubmit" <?= $disable; ?>>Submit</button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="viewsubmit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center">
                            <h2>Are you sure you want to submit the Assessment Report?</h2>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" name="submit_assessment" class="btn btn-primary">Yes</button>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
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
            <a href="inquiries-view-ass.php?id=<?= $_SESSION['learnerID']; ?>"><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button" style="">View Assessment Form</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href=""><button class="btn-primary border-start-0 rounded-end bg-white mb-2 bg-body right-button-active" style="">Assessment Report</button></a>
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
