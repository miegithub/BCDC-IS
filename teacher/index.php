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
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <h2>Teacher Dashboard</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xxl-3 col-xl-3 col-md-3 col-sm-12 col-12">
      <div class="container-fluid" style="background-color:rgba(217, 217, 217);height:140px;">
        <div class="row">
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-content-center flex-wrap">
            <i class="fa-solid fa-graduation-cap fs-1"></i>
          </div>
          <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12 text-center pt-4">
            <p class="mb-0 pb-0 fs-2">
              <?php
                $query = "SELECT * FROM learner WHERE archive='0'";
                $query_run = mysqli_query($con,$query);
                echo mysqli_num_rows($query_run);
              ?>
            </p>
            <p class="mt-0 pt-0 fs-5">Learner</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center p-0">
            <a href="learner.php" class="btn w-100 p-0 m-0" style="background-color:rgba(190, 190, 190);">View</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <div>

  <div class="container"></div>
    <h1 class="text-center text-secondary m-5"><strong>Calendar of Events </strong> </h1>
    <div class="line" style="background-color: black; height: 1px; width: 100%; margin-top: 10px;"></div>
    <div id="calendar"></div>
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
  }
  .fc-toolbar-title {
    font-weight: bold; 
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




</div>





<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
