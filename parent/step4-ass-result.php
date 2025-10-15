<?php
ob_start();
session_start();
include('../admin/config/dbcon.php');
$currentPage="step4";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');


$userID = $_SESSION['auth_user']['userID'];
$update_redirect = "UPDATE user SET redirect='4' WHERE ID='$userID'";
mysqli_query($con,$update_redirect);
if(!isset($_SESSION['learnerID'])){
  #ob_end_flush();
  #header("Location: inquiries.php");
  #exit(0);
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
        content: '✓'; /* Check mark for active step */
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
<div class="container">
      <div class="row px-4">
        <div class="col-md-12">
          <div class="text-center px-0 pt-5">
            <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
            <p class="pt-3" style="margin-bottom:80px;"><strong>Here are the following steps to avail the program and make your child become an official learner in BCDC:</strong></span> 
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
            <p class="pt-5"><strong>Step 3:</strong> Dr. Hazel Manabal-Reyes Developmental Assessment</p>
            </fieldset>
            <fieldset>
              <p class="pt-5"><strong>Step 4: Please wait for 7 working days to receive the assessment report of the patient. <br> </strong>(Maghintay ng pitong araw upang matanggap ang assessment report ng pasyente.)</p>
            </fieldset>
            <fieldset>
              <div class="my-5"></div>
            <!-- <p class="pt-5"><strong>Step 4: Please wait for 7 working days to receive the assessment report of the patient. <br> </strong>(Maghintay ng pitong araw upang matanggap ang assessment report ng pasyente.)</p>
            -->
            </fieldset>
           
            
          </div>
        </div>
      </div>

  <?php
    $userID = $_SESSION['auth_user']['userID'];
    $query_learnerID = "SELECT * FROM learner WHERE userID='$userID'";
    $query_learnerID_run = mysqli_query($con, $query_learnerID);
    if(mysqli_num_rows($query_learnerID_run) > 0){
      foreach($query_learnerID_run as $row){
        $learnerID=$row['learnerID'];
      }
      $search_learner = "SELECT * FROM learner_ass WHERE learnerID='$learnerID'";
      $search_learner_run = mysqli_query($con, $search_learner);
      if($search_learner_run){
        if(mysqli_num_rows($search_learner_run) > 0){
          foreach($search_learner_run as $row){
            ?>
            <div class="row">
              <div class="col-md-12">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 hv-100">

                    
                      <iframe src="pdf_assessment.php?id=<?= $learnerID; ?>" class="w-100 mw-100" frameborder="0" style="height:1000px;"></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          <div class="row px-2">
            <div class="col-md-12 text-end">
              <a href="step3-input.php" class="btn " style="background-color:rgba(119, 164, 218); width:100px;">Previous</a>
              <a href="step5.php" class="btn bg-primary text-white" style="width:100px;">Next</a>
            </div>
          </div>
            <?php
          }
        }

        else{
  ?>
          <div class="row p-5">
            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 card d-flex justify-content-center text-center align-items-center" style="height:400px;">
            <div class="text-center">
            <!-- <img class="mb-4 img-error" style="width: 500px;"  src="../images/clouds.gif" /> -->
            <img class="mb-4 img-error " style="width: 250px;"  src="../images/paperhourglass.gif" />
                
                 <p class="text-black-50">The assessment report is currently being prepared and not yet available. <br>
                Please check back later once it has been completed.</p>
                                    
            </div>
            </div>
          </div>
          
          <div class="row px-4">
            <div class="col-md-12 text-end">
              <a href="step3-input.php" class="btn " style="background-color:rgba(119, 164, 218); width:100px;">Previous</a>
              <a disabled class="btn bg-secondary" style="width:100px;">Next</a>
            </div>
          </div>
<?php
        }
      }
      
    }
    else{
      ?>
            <div class="row p-5">
              <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 card d-flex justify-content-center text-center align-items-center" style="height:400px;">
                <img src="../images/currently.jpg" alt="" style="width:400px;">
              </div>
            </div>
      <?php
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
    // Initialize step navigation
    
    let currentStep = 2;
    if(<?= mysqli_num_rows($search_learner_run) ?> > 0){
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
