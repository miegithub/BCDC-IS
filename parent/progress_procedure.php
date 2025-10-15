<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="step1";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
?>
<style>
  .body{
    background-color: rgba(190, 190, 190);
  }
</style>

<div class="container mt-4">
    <div class="">
        <div class="col text-center col-xl-15 text-center p-0 mt-3 mb-2">
            <div class=" px-0 pt-5">
                <h2 class="fw-bold" id="heading" style="font-size: 30px; color: black;">How to avail the program and become an official learner in BCDC</h2>
                <p class="pt-3"><strong>Hello, mommy and daddy!</strong></span> 
                here are the following steps to avail the program and make your child an official learner in BCDC:</p>
              
              
                <form id="msform" class="pt-5" style="width: 1200px; margin: auto;">

    
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
        <p class="pt-5" > <strong>Step 1: </strong>Behavioral Assessment Form
</p>
        
         Dito mag sho-show yung Step1- Developmental and Behavioral Assessment Form !comment only 
         <!--?php include('step1.php')?--->

         <div style="text-align: right; margin: 20px;">
        <button type="button" class="next action-button">Next</button></div>
        <p></p>
        
    </fieldset>
    
    <fieldset>
        <p class="pt-5"><strong>Step 2:</strong> Patient Assessment Registration and Appointment Details <br>

       
        <p></p>
        <div style="text-align: right; margin: 20px;">
        <button type="button" class="previous action-button">Previous</button>
        <button type="button" class="next action-button">Next</button></div>
        <p></p>
    </fieldset>

    
    <fieldset>
    <p class="pt-5"><strong>Step 3:</strong> Dr. Hazel Manabal-Reyes Developmental Assessment
        
        <p></p>
        <p></p>
        <div style="text-align: right; margin: 20px;">
        <button type="button" class="previous action-button">Previous</button>
        <button type="button" class="next action-button">Next</button></div>
        <p></p>
    </fieldset>

    
    <fieldset>
    <p class="pt-5"><strong>Step 4:</strong> Assessment Report
        <p></p>
        <p></p>
        <div style="text-align: right; margin: 20px;">
        <button type="button" class="previous action-button">Previous</button>
        <button type="button" class="next action-button">Next</button></div>
        <p></p>
    </fieldset>

    
     <fieldset>
    <p class="pt-5"><strong>Step 5: </strong> Patient Enrollee Evaluation
        
        <p></p>
        <p></p>
        dito magsho show yung ,enrollment step 5 patient evaluation !comment only  
        <div style="text-align: right; margin: 20px;">
        <button type="button" class="previous action-button">Previous</button>
        <button type="button" class="next action-button">Next</button></div>
        <p></p>
    </fieldset>

</form>

<!-- CSS for Progress Bar -->
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
        background-color: #4caf50; /* Green for active step */
        content: '✔'; /* Check mark for active step */
    }

    #progressbar li strong {
        display: block;
        margin-top: 40px;
        color: black; /* Default text color */
    }

    #progressbar li.active strong {
        color: #4caf50; /* Green text for active step */
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





<!--footer--->
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
