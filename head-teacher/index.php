<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="index";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
?>
<style>
</style>
<div class="container mw-100 p-3 m-0 bg-white" style="width:100%;height:auto;">
  <div class="row ">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <h2>Head Teacher Dashboard</h>
    </div>
  </div>
  <div class="row ">
    <div class="col-xxl-3 col-xl-3 col-md-3 col-sm-12 col-12">
      <div class="container-fluid" style="background-color:rgba(217, 217, 217);height:140px;">
        <div class="row">
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-content-center flex-wrap">
            <i class="fa-solid fa-graduation-cap fs-1"></i>
          </div>
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 text-center pt-4">
            <?php
              $patient_count = "SELECT * FROM `learner` WHERE archive='0' and trigger_ht='0'";
              $patient_count_run = mysqli_query($con,$patient_count);
            ?>
            <p class="mb-0 pb-0 fs-2"><?= mysqli_num_rows($patient_count_run); ?></p>
            <p class="mt-0 pt-0 fs-5">Patient</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center p-0">
            <a href="learner.php" class="btn w-100 p-0 m-0" style="background-color:rgba(190, 190, 190);">View</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xxl-3 col-xl-3 col-md-3 col-sm-12 col-12">
      <div class="container-fluid" style="background-color:rgba(217, 217, 217);height:140px;">
        <div class="row">
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-content-center flex-wrap">
            <i class="fa-solid fa-users fs-1"></i>
          </div>
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 text-center pt-4">
            <?php
              $enrollee_count = "SELECT * FROM `learner` WHERE archive='0' and trigger_ht='1' and trigger_dr_ass='1' and (approved='0' || approved='1')";
                $enrollee_count_run = mysqli_query($con,$enrollee_count);
            ?>
            <p class="mb-0 pb-0 fs-2"><?= mysqli_num_rows($enrollee_count_run); ?></p>
            <p class="mt-0 pt-0 fs-5">Enrollee</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center p-0">
            <a href="learner-p-enrollee.php" class="btn w-100 p-0 m-0" style="background-color:rgba(190, 190, 190);">View</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xxl-3 col-xl-3 col-md-3 col-sm-12 col-12">
      <div class="container-fluid" style="background-color:rgba(217, 217, 217);height:140px;">
        <div class="row">
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-content-center flex-wrap">
            <i class="fa-solid fa-users fs-1"></i>
          </div>
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 text-center pt-4">
            
            <?php
              $learner_count = "SELECT * FROM `learner_batch` WHERE archive='0'";
              $learner_count_run = mysqli_query($con,$learner_count);
            ?>
            <p class="mb-0 pb-0 fs-2"><?= mysqli_num_rows($learner_count_run); ?></p>
            <p class="mt-0 pt-0 fs-5">Learner</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center p-0">
            <a href="learner-batch.php" class="btn w-100 p-0 m-0" style="background-color:rgba(190, 190, 190);">View</a>
          </div>
        </div>
      </div>
    </div>




    <div class="col-xxl-3 col-xl-3 col-md-3 col-sm-12 col-12">
      <div class="container-fluid" style="background-color:rgba(217, 217, 217);height:140px;">
        <div class="row">
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-content-center flex-wrap">
            <i class="fa-solid fa-users fs-1"></i>
          </div>
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 text-center pt-4">
            
            <?php
              $user_count = "SELECT * FROM `user` WHERE archive='0' and type!='Admin' and type!='parent'";
              $user_count_run = mysqli_query($con,$user_count);
            ?>
            <p class="mb-0 pb-0 fs-2"><?= mysqli_num_rows($user_count_run); ?></p>
            <p class="mt-0 pt-0 fs-5">Employee</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center p-0">
            <a href="spl.php" class="btn w-100 p-0 m-0" style="background-color:rgba(190, 190, 190);">View</a>
          </div>
        </div>

      </div>
    </div>
  </div>




  

  <div class="container">
    <h1 class="text-center text-secondary m-5"><strong>Calendar of Events </strong> </h1>
    <div class="line" style="background-color: black; height: 1px; width: 100%; margin-top: 10px;"></div>
    <div class="" id="calendar">

    </div>
  </div>
</div>
</div>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  #calendar {
    max-width: 1200px;
    margin: 40px auto;
    height: 650px;
  }
  .fc {
    margin: 0 auto;
  }
  .fc-daygrid-day-number,
  .fc-toolbar-title,
  .fc-button,
  .fc-event-title,
  .fc-col-header-cell-cushion {
    color: black;
  }
  .fc-daygrid-day {
    border: 1px solid #ddd;
    box-sizing: border-box; 
  }
  .fc-toolbar-title {
    font-weight: bold; 
  }
  
/* Fix for missing right and bottom borders */
.fc-scrollgrid {
  border-right: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
</style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: [
        {
          title: 'Event 1',
          start: '2023-10-01'
        },
        {
          title: 'Event 2',
          start: '2023-10-05',
          end: '2023-10-07'
        },
        {
          title: 'Event 3',
          start: '2023-10-09T12:30:00',
          allDay: false 
        }
      ]
    });
    calendar.render();
  });
</script>



  
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>

<?php
  include('../admin/includes/footer.php');
?>