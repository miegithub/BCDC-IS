<?php
session_start();
include('../admin/config/dbcon.php');
$currentPage="index";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');


$userID = $_SESSION['auth_user']['userID'];

?>

<div class="container mw-100 pt-0 m-0 bg-white">
    <!-- Banner Section -->
    <div class="row ">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12"
    style="background: url('../images/parent_img2.jpg'); height: 500px; background-position: -100px center; width: 100%;">
<div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-white px-5 pt-5">
                    <label class="fs-1 fw-bold" style="margin-top: 70px;">BIÑAN CITY DEVELOPMENT CENTER</label>
                    <div class="line" style="background-color: white; height: 2px; width: 100%; margin-top: 10px;"></div>


                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6 text-center text-white">
                        <label class="px-5" style="margin-top: 20px;">BCDC was founded to assist and support families unable to pay for therapy. More than a hundred families with children who have special needs have benefited from this initiative, and the number is still growing.</label>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-dm-12">
                        <!---remove this <a href="step1.php" class="btn w-25 mt-5 mb-5" style="background-color:rgba(206, 89, 39)">NEXT</a> --->
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!--- program  --->

   <section style="width: 80%; margin: auto; padding: 20px; background-color: #ffffff; border: 3px solid #e0e0e0; width: 1000px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; text-align: center; padding-top: 100px;">
   <h1 style="padding-top: -35px; font-size: 35px; font-weight: 600; align-items: center;">PROGRAM</h2>


<div class="row" style="align-items: center;">
    <div class="col-md-4 text-center" style="padding-left: 0;"> <!-- Adjust padding for the left -->
        <img src="../images/earlyinterventionprogram.png" alt="Early Intervention Program" style="max-width: 150px; height: auto; margin-left: -180px; margin-top: -100px">
    </div>
    <div class="col-md-8" style="padding: 0; text-align: left;"> 
       <h5 style = "margin-left: -170px; font-size: 15px; font-weight: 500px; margin-top: 50px;"><strong>Early Intervention Therapy</strong></h5>
        <p style="margin-left: -170px; margin-top: 15px">A program that works with kids who have behavioral issues, special learning needs, and developmental delays.
            It is intended for young children who are not yet in school and require extra help with language and communication development, 
            sensory integration, fine and gross motor skill development, academic foundation building, and social skills enhancement. It is 
            intended to help kids acquire the fundamental life skills needed for the formal education system.
            <br>
            <br>
            For young children with special needs, our early intervention 
            at Biñan City Development Center offers programs like <strong>Occupational Therapy, Educational Therapy, Social Skills Training and Pre school Readiness</strong> activities to help 
            them reach their full potential and overcome developmental delays.
            <br>
            <br>
            Every child is different and they learn differently so we provide individualized program plan to help 
            them learn in the best way they can.</p> 
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
    <div style="flex-basis: 48%; margin-bottom: 20px; display: flex; align-items: flex-start;">
        <img src="../images/occupational-therapy.png" style="max-width: 100px; margin-right: 70px; margin-top: 50px;">
        <div>
            <h5 style="font-size: 16px; font-weight: 600; margin-bottom: 5px; margin-right: 115px; margin-top: 50px;">Occupational Therapy</h5>
            <p style="font-size: 14px; line-height: 1.4; text-align: left;">A program helps a child to reach goals and developmental milestones that improve their daily life. It focuses on how child moves, plays and communicates with the world around them.</p>
        </div>
    </div>

    <div style="flex-basis: 48%; margin-bottom: 20px; display: flex; align-items: flex-start;">
    <div></div><img src="../images/education.png" style="max-width: 80px; height: auto; margin-right: 100px; margin-top: 50px;">
        <div>
            <h5 style="font-size: 16px; font-weight: 600; margin-bottom: 5px; margin-right: 115px; margin-top:50px; ">Educational Therapy</h5>
            <p style="font-size: 14px; line-height: 1.4; text-align: left;"> A program take a comprehensive approach, looking beyond academics to consider the psychological, emotional, and social factors that affect a child's ability to learn.</p>
        </div>
    </div>

           <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
    <div style="flex-basis: 48%; margin-bottom: 20px; display: flex; align-items: flex-start;">
        <img src="../images/soft-skills.png" style="max-width: 100px; margin-right: 70px; margin-top: 50px;">
        <div>
            <h5 style="font-size: 16px; font-weight: 600; margin-bottom: 5px; margin-right: 118px; margin-top:50px;">Social Skills Training </h5>
            <p style="font-size: 14px; line-height: 1.4; text-align: left;">A program helps a child to reach goals and developmental milestones that improve their daily life. It focuses on how child moves, plays and communicates with the world around them.</p>
        </div>
    </div>

    <div style="flex-basis: 48%; margin-bottom: 20px; display: flex; align-items: flex-start;">
    <div></div><img src="../images/preschool.png" style="max-width: 80px; height: auto; margin-right: 100px; margin-top: 50px;">
        <div>
            <h5 style="font-size: 16px; font-weight: 600; margin-bottom: 5px; margin-right: 105px; margin-top:50px; ">Pre School Readiness</h5>
            <p style="font-size: 14px; line-height: 1.4; text-align: left;"> A program take a comprehensive approach, looking beyond academics to consider the psychological, emotional, and social factors that affect a child's ability to learn.</p>
        </div>
    </div>
    </div>
</div>
<div class="row" style="align-items: center;">
    <div class="col-md-4 text-center" style="padding-left: 0;"> 
        <img src="../images/detection.png" alt="Early Intervention Program" style="max-width: 150px; height: auto; margin-left: -180px; margin-top: 50px">
    </div>
    <div class="col-md-8" style="padding: 0; text-align: left;"> 
       <h5 style = "margin-left: -170px; font-size: 15px; font-weight: 500px; margin-top: 50px;"><strong>Early Detection</strong></h5>
        <p style="margin-left: -170px; margin-top: 15px">A program promotes early detection to provides an opportunity for families to receive support and guidance in understanding their child's needs. It enables professionals to develop appropriate 
            individualized program plan tailored to the child's unique strengths and challenges. This can facilitate a more inclusive educational experience and ensures the child receives the necessary accommodations and supports.</p> 
    </div>
            

    <!-- Privacy Notice Section -->
     
    <div class="line" style="background-color: #CACACA; height: 1px; width: 76%; margin-top: 60px; margin-left: 100px;"></div>


    <div class="col-md-12 text-center">
                <h5 class="fw-bold" style="margin-top:50px; margin-right: center; margin-bottom: 10px; font-size: 30px;">Privacy Notice</h5>
            </div>

            <div class="container mt-2">
        <p class="mt-2 ms-3">
            By clicking "I agree" you consent to send your information to Biñan City Development Center, who agrees to use it in accordance with their Privacy Policy. This includes the collection, use, and processing of your information as outlined in the policy, ensuring responsible handling of your data.
        </p>
    </div>

        <p>
        Biñan City Development Center will provide you with access to use the Personal Data under applicable data privacy and protection laws. It may also lodge a complaint with the National Privacy Commission (NPC) if Biñan City Development Center, fails to respond in a timely or acceptable manner. For more details, visit the NPC's website: 
            <a href="https://privacy.gov.ph/mechanics-for-complaints/" target="_blank">https://privacy.gov.ph/mechanics-for-complaints/</a>.
        </p>
        <div class="d-flex justify-content-center">
        <label class="d-flex align-items-center px-4 py-2 rounded-3 font-weight-bold bg-primary text-white w-auto" for="acceptTerms">
            <input type="checkbox" id="acceptTerms" class="form-check-input me-3" onchange="showModal()">
            <span class="ml-2">I Agree</span>
        </label>
    </div>
    <!-- Full screen modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="termsModalLabel">Important Reminders: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <!-- Modal content goes here -->
                    <p>Before availing of the program, the child must first be diagnosed by a Behavioral and Developmental Pediatrician to determine which program is applicable to them.
                    </p>
                    <p> To diagnose the child, the parents must register their child and schedule an appointment with the Developmental and Behavioral Pediatrician.
                    </p>
                    <p>Strictly follow the step by step procedure to avoid any delays or issues with the registration and appointment.</p>
                   </div>
                <div class="modal-footer">
                    <a href="step1.php" class="btn btn-primary">Next</a>
                </div>
            </div>
        </div>
    </div>
    </section>

        <script>
            function showModal() {
                const checkbox = document.getElementById('acceptTerms');

                if (checkbox.checked) {
                   
                    const modal = new bootstrap.Modal(document.getElementById('termsModal'));
                    modal.show();
                }
            }
        </script>





 

<!-- Footer Section -->
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>

<?php
include('../admin/includes/footer.php');
?>
