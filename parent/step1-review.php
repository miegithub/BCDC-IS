<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step1";
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
<div class="container p-5">
  <div class="row">
    <div class="col-md-12">
      <div class="text-center px-0 pt-5">
        <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
        <p class="pt-3"  style="margin-bottom: 70px";><strong> Here are the following steps to avail the program and make your child become an official learner in BCDC:</strong></span> 
       </p>
        <div class="card ">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="" id="s1"><strong>STEP 1</strong></li>
                <li id="s2"><strong>STEP 2</strong></li>
                <li id="s3"><strong>STEP 3</strong></li>
                <li id="s4"><strong>STEP 4</strong></li>
                <li id="s5"><strong>STEP 5</strong></li>
            </ul>
        </div>
        <div class="mt-5">

        </div>
        
        
        <!-- <fieldset>
        <p class="pt-5"><strong>Step 3:</strong> Dr. Hazel Manabal-Reyes Developmental Assessment</p>
            
            <div style="text-align: right; margin: 20px;">
                <button type="button" class="previous action-button">Previous</button>
                <button type="button" class="next action-button">Next</button>
            </div>
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
        </fieldset> -->
        
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
        <div class="row mb-2">
          <div class="col-md-12">
            <label for=""><strong>Patient Assessment Registration Details</strong></label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <table class="border w-50">
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
                  <td class=" border border-black"><?= $parent_email; ?></td>
                  <!-- <td class=" border border-black"> </?= $_SESSION['auth_user']['user_email']; ?></td> -->
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row pb-5">
          <div class="col-md-6">
            <a href="step1-check.php" class="btn btn-primary">Back</a>
          </div>
          <div class="col-md-6 text-end">
            <a href="step1.php" class="btn btn-primary">Confirm</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    // Initialize step navigation
    let currentStep = 0;
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
