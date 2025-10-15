<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="progress";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
?>

<style>
.active-btn1 {
  background-color: rgba(63, 147, 245, 1);
  color: white; /* Text color for contrast */
  border: none; /* Remove default border */
  padding: 10px 20px; /* Add padding for better appearance */
  border-radius: 5px; /* Rounded corners */
  font-size: 16px; /* Font size */
  font-weight: bold; /* Bold text */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow for 3D effect */
  transition: all 0.3s ease; /* Smooth transition for hover effects */
}

.active-btn1:hover {
  background-color: rgba(63, 147, 245, 0.9); /* Slightly lighter color on hover */
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3), 0 3px 6px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
  transform: translateY(-2px); /* Slight lift effect on hover */
}

.active-btn:active {
  background-color: rgba(63, 147, 245, 0.8); /* Darker color when button is pressed */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 1px 2px rgba(0, 0, 0, 0.1); /* Reduced shadow when pressed */
  transform: translateY(0); /* Reset lift effect when button is pressed */
}

.not-active-btn {
  background-color: rgba(239, 237, 237, 1);
  color: black; /* Text color for contrast */
  border: none; /* Remove default border */
  padding: 10px 20px; /* Add padding for better appearance */
  border-radius: 5px; /* Rounded corners */
  font-size: 16px; /* Font size */
  font-weight: bold; /* Bold text */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow for 3D effect */
  transition: all 0.3s ease; /* Smooth transition for hover effects */
}
.not-active-btn:hover {
  background-color: rgba(239, 237, 237, 0.9); /* Slightly lighter color on hover */
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3), 0 3px 6px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
  transform: translateY(-2px); /* Slight lift effect on hover */
}
</style>
<div class="container mw-100 p-3 m-0 bg-white" style="width:100%;height:100%;">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h2>FORMS AND REPORTS</h2>
          </div>
          <div class="col-md-6 text-end">
            <?php
              if(isset($_POST['submit_date'])){
                $learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
                $date_ = mysqli_real_escape_string($con, $_POST['date_']);
                $emotion_reg = mysqli_real_escape_string($con, $_POST['emotion_reg']);
                $sensitivity = mysqli_real_escape_string($con, $_POST['sensitivity']);
                $body = mysqli_real_escape_string($con, $_POST['body']);
                $confidence = mysqli_real_escape_string($con, $_POST['confidence']);
                $sound = mysqli_real_escape_string($con, $_POST['sound']);
                $gross = mysqli_real_escape_string($con, $_POST['gross']);

                $walking = mysqli_real_escape_string($con, $_POST['walking']);
                $jumping = mysqli_real_escape_string($con, $_POST['jumping']);
                $crawling = mysqli_real_escape_string($con, $_POST['crawling']);
                $hopping = mysqli_real_escape_string($con, $_POST['hopping']);
                $muscle_strength = mysqli_real_escape_string($con, $_POST['muscle_strength']);
                $muscle_endurance = mysqli_real_escape_string($con, $_POST['muscle_endurance']);
                $balance = mysqli_real_escape_string($con, $_POST['balance']);
                $bilateral = mysqli_real_escape_string($con, $_POST['bilateral']);
              
                
                $search = "SELECT * FROM learner_progress WHERE learnerID='$learnerID' AND date_ = '$date_' ";
                $result_run = mysqli_query($con, $search);
                if($result_run){
                  if(mysqli_num_rows($result_run) > 0){
                    echo '
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger" style="">
                          <div class="modal-body text-center">
                            <h5 class="text-white">Date already existed!</h5>
                          </div>
                          <div class="modal-footer">
                            <a href="progress-report.php?id='.$learnerID.'" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                          </div>
                        </div>
                      </div>
                    </div>';
                  }
                  else{
                    $query = "INSERT INTO `learner_progress`(`learnerID`, `date_`, `emotion`, `sensitivity`, `body`, `confidence`, `sound`,  `gross`, `walking`, `jumping`, `crawling`, `hopping`, `muscle_strength`, `muscle`, `balance`, `bilateral`) VALUES ('$learnerID','$date_','$emotion_reg','$sensitivity','$body','$confidence','$sound', '$gross','$walking','$jumping','$crawling','$hopping','$muscle_strength','$muscle_endurance','$balance','$bilateral')";
                    $result = mysqli_query($con, $query);
                    if($result){
                      echo '
                      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="background-color:rgba(56, 174, 89);">
                            <div class="modal-body text-center">
                              <h5 class="text-white">Added Successfully!</h5>
                            </div>
                            <div class="modal-footer">
                              <a href="progress-report.php?id='.$learnerID.'" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                            </div>
                          </div>
                        </div>
                      </div>';
                    }
                    else{
                      echo '
                      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content bg-danger" style="">
                            <div class="modal-body text-center">
                              <h5 class="text-white">Something Went Wrong!</h5>
                            </div>
                            <div class="modal-footer">
                              <a href="progress-report.php?id='.$learnerID.'" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                            </div>
                          </div>
                        </div>
                      </div>';
                    }
                  }
                }
                
             }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr class="text-dark" style="border-bottom: 2px solid black;">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5>Learner Information</h5>
          </div>
        </div>
        <div class="row pb-3">
          <!-- LEFT -->
          <?php
            $learnerID = $_GET['id'];
            $query = "SELECT * FROM `learner` WHERE archive='0' ";
            $query_run = mysqli_query($con,$query);
            if($query_run){
              if(mysqli_num_rows($query_run) > 0){
                foreach($query_run as $row){
                  $name = $row['name'];
                  $address = $row['address'];
                  $age = $row['age'];
                  $diagnosis = $row['diagnosis'];
                  $teacher_incharge = $row['teacher_incharge'];
                }
              }
            }
          ?>
          <div class="col-md-3">
            <div class="container card pt-3 pb-3 shadow">
              <div class="row">
                <div class="col-md-12 text-center pb-3">
                  <img src="../images/girl.png" alt="" style="width:150px;height:150px;">
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Student Name</label>
                  <input type="text" name="student_name" class="form-control black-border" value="<?= $name; ?>" readonly>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Address</label>
                  <input type="text" name="address" class="form-control black-border" value="<?= $address; ?>" readonly>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Age</label>
                  <input type="number" name="age" class="form-control black-border" value="<?= $age; ?>" readonly>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Diagnosis</label>
                  <input type="text" name="diagnosis" class="form-control black-border" value="<?= $diagnosis; ?>" readonly>
                </div>
              </div>
              <div class="row pb-3">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Teacher In-charge</label>
                  <input type="text" name="teacher_incharge" class="form-control black-border" value="<?= $teacher_incharge; ?>" required>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Overall Result: <label for="" class="" style="color:rgba(80, 179, 71);">GOOD</label></label>
                </div>
              </div>
            </div>
          </div>
          <!-- RIGHT -->
          <div class="col-md-9">
            <div class="container">
              <div class="row">
                <div class="col-md-12 d-flex">
                  <nav class="navbar navbar-expand-lg navbar-light pb-0">
                      <div class="container-fluid ps-0 ms-0">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                              <a href="ass-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Assessment Report</a>
                            </li>
                            <li class="nav-item">
                              <a href="ipp.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Individualized Program Plan (IPP)</a>
                            </li>
                            <li class="nav-item">
                              <a href="progress-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link active active-btn1 text-white">Progress Report (running notes)</a>
                            </li>
                            <li class="nav-item">
                              <a href="narrative-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Narrative Progress Report</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                  </nav>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="container-fluid card mt-2 p-3">
                  


                        <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn active-btn active-btn1" data-bs-toggle="modal" data-bs-target="#adddate">
                                Add Date
                            </button>
                            <div class="row">
                                <div class="col-md-12">



                                <div class="col-md-8">

                                <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="subjects-tab" data-bs-toggle="tab" data-bs-target="#subjects" type="button" role="tab">My Subjects List</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="registration-tab" data-bs-toggle="tab" data-bs-target="#registration" type="button" role="tab">Registration</button>
                                  </li>
                                </ul> -->

                                    <!-- Tabs for Daily, Weekly, and Monthly -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="daily-tab" data-bs-toggle="tab" href="#daily" role="tab" aria-controls="daily" aria-selected="true">Daily</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="monthly-tab" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="yearly-tab" data-bs-toggle="tab" href="#yearly" role="tab" aria-controls="yearly" aria-selected="false">Overall Progress</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>








                        <div class="modal fade" id="adddate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <form action="" method="post">
                              <input type="hidden" name="learnerID" value="<?= $_GET['id'];?>">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">ADD DATE</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                  <div class="container-fluid p-2">
                                    <div class="row">
                                   <div class="col-md-6 text-start">
                                        <label for="">PROGRESS REPORT DATE:</label>
                                        <input type="date" class="form-control border-dark" name="date_" required>
                                      </div>
                                    </div>
                                    <div class="card p-2 mb-2 mt-2">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <h3 class="text-primary">A. MASSAGE</h3>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="">Emotion Regulation</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="emotion_reg" required>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="">Sensitivity to touch</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="sensitivity" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card p-2 mb-2">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <h3 class="text-primary">B. ACTION SONG</h3>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="">Body Awareness</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="body" required>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="">Confidence</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="confidence" required>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="">Sound Tolerance</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="sound" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card p-2 mb-2">
                                      <div class="row mt-3">
                                        <div class="col-md-12">
                                          <h3 class="text-primary">C. SENSORY INTEGRATION</h3>
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <div class="col-md-12">
                                        <label for="">I. Gross Motor Skills</label>
                                        <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="gross" required>
                                        </div>
                                      </div>
                                      <div class="row mb-2">
                                        <div class="col-md-3">
                                          <label for="">I.I. Walking</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="walking" required>
                                        </div>
                                        <div class="col-md-3">
                                          <label for="">I.II. Jumping</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="jumping" required>
                                        </div>
                                        <div class="col-md-3">
                                          <label for="">I.III Crawling</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="crawling" required>
                                        </div>
                                        <div class="col-md-3">
                                          <label for="">I.IV Hopping</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="hopping" required>
                                        </div>
                                      </div>
                                      <div class="row mb-2">
                                        <div class="col-md-4">
                                          <label for="" class="fw-bold"  style="font-size:13px;">II. Muscle Strength</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="muscle_strength" required>
                                        </div>
                                        <div class="col-md-4" style="font-size:12px;">
                                          <label for="" class="fw-bold">III. Muscle Endurance</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="muscle_endurance" required>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="" class="fw-bold">IV. Balance</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="balance" required>
                                        </div>
                                      </div>
                                      <div class="row mb-2">
                                        <div class="col-md-4">
                                          <label for="" class="fw-bold" style="font-size:10px;">V. Bilateral Coordination</label>
                                          <input type="number" class="form-control border-dark" max="3" min="1" placeholder="0" name="bilateral" required>
                                        </div>
                                      </div>
                                    </div>
                                    






                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" name="submit_date" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">



                       <!-- Tab Contents -->
                          <div class="tab-content" id="myTabContent">

                          <!-- Daily Tab -->
                          <div class="tab-pane fade show active border" id="daily" role="tabpanel" aria-labelledby="daily-tab">
                            <table id="example" class="table table-striped border" style="width:100%;font-size:12px;">
                              <thead>
                                <tr>
                                  <th class="text-center">DAILY DATE</th>
                                  <th class="text-center">ACTION</th>
                                </tr>
                              </thead> 
                              <tbody>
                                  <?php
                              $count=1;
                              $learnerID=$_GET['id'];
                              $query = "SELECT * FROM `learner_progress` WHERE learnerID='$learnerID'";
                              $query_run = mysqli_query($con,$query);
                              if($query_run){
                                if(mysqli_num_rows($query_run) > 0){
                                  foreach($query_run as $row){
                            ?>
                                    <tr>
                                      <td class="text-center text-dark"><?= $row['date_']; ?></td>
                                      <td class="text-center"><a href="progress-report-view.php?id=<?= $row['learnerID']; ?>&d=<?= $row['date_']; ?>" class="btn btn-sm btn-primary">VIEW SUMMARY</a></td>
                                    </tr>          
                            <?php
                                  }
                                }
                              }
                              ?>
                          </tbody>
                          </table>
                        </div>


                        <!-- Weekly Tab Content -->
                        <div class="tab-pane fade border" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                        <table id="weeklyTable" class="table table-striped border" style="width:100%;font-size:12px;">
                        <thead>
                          <tr>
                            <th class="text-center">WEEKLY DATE </th>
                            <th class="text-center">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $learnerID = $_GET['id'];
                            $query = "SELECT DISTINCT date_ FROM learner_progress WHERE learnerID='$learnerID'";
                            $query_run = mysqli_query($con, $query);

                            $weekly_ranges = [];

                            if ($query_run && mysqli_num_rows($query_run) > 0) {
                              $dates = [];


                              while ($row = mysqli_fetch_assoc($query_run)) {
                                $dates[] = $row['date_'];
                              }

                              // Step 2: Sort ascending
                              usort($dates, function($a, $b) {
                                return strtotime($a) - strtotime($b);
                              });

                              // Step 3: Group into weekly ranges
                              foreach ($dates as $date) {
                                $timestamp = strtotime($date);
                                $week_start = date('Y-m-d', strtotime('monday this week', $timestamp));
                                $week_end = date('Y-m-d', strtotime('sunday this week', $timestamp));

                                $range_key = $week_start . '|' . $week_end;
                                $weekly_ranges[$range_key] = [
                                  'start' => $week_start,
                                  'end' => $week_end
                                ];
                              }

                              // Step 4: Sort ranges by week_start
                              usort($weekly_ranges, function($a, $b) {
                                return strtotime($a['start']) - strtotime($b['start']);
                              });

                              // Step 5: Display rows
                              foreach ($weekly_ranges as $range) {
                                $formatted_start = date('F d, Y', strtotime($range['start']));
                                $formatted_end = date('F d, Y', strtotime($range['end']));
                          ?>
                                <tr>
                                  <td class="text-center text-dark"><?= $formatted_start . ' - ' . $formatted_end; ?></td>
                                  <td class="text-center">
                                    <a href="weekly-progress.php?id=<?= $learnerID; ?>&start=<?= $range['start']; ?>&end=<?= $range['end']; ?>" class="btn btn-sm btn-primary">VIEW SUMMARY</a>
                                  </td>
                                </tr>
                          <?php
                              }
                            }
                          ?>
                        </tbody>
                      </table>

                        </div>
                        <!-- monthly Tab Content -->
                        <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                       <div class="tab-content" id="myTabContent">
                        <!-- Daily Tab Content -->
                        <div class="tab-pane fade show active border" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                        <!-- Table for Daily Progress -->
                        <table id="monthlyTable" class="table table-striped border" style="width:100%;font-size:12px;">
 
    <thead>
    <tr>
      <th class="text-center">MONTHLY DATE</th>
      <th class="text-center">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $learnerID = $_GET['id'];
      $query = "SELECT DISTINCT date_ FROM learner_progress WHERE learnerID='$learnerID'";
      $query_run = mysqli_query($con, $query);

      $monthly_summary = [];

      if ($query_run && mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
          $date = $row['date_'];
          $month_key = date('Y-m', strtotime($date)); // e.g. "2025-01"

          if (!isset($monthly_summary[$month_key])) {
            $monthly_summary[$month_key] = [
              'start' => date('Y-m-01', strtotime($date)),
              'end' => date('Y-m-t', strtotime($date)),
              'label' => date('F Y', strtotime($date))
            ];
          }
        }

        // Sort by key (month)
        ksort($monthly_summary);

        foreach ($monthly_summary as $month_data) {
          ?>
          <tr>
            <td class="text-center text-dark"><?= $month_data['label']; ?></td>
            <td class="text-center">
              <a href="monthly-progress.php?id=<?= $learnerID; ?>&start=<?= $month_data['start']; ?>&end=<?= $month_data['end']; ?>" class="btn btn-sm btn-primary">VIEW SUMMARY</a>
            </td>
          </tr>
          <?php
        }
      }
    ?>
  </tbody>
  </table>



                        </div>
                           
                        </div>
                        </div>

                        <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                       <div class="tab-content" id="myTabContent">
                        <!-- Daily Tab Content -->
                        <div class="tab-pane fade show active border" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                            <!-- Table for Daily Progress -->
                            <table id="yearlyTable" class="table table-striped border" style="width:100%;font-size:12px;">
  <thead>
    <tr>
      <th class="text-center">DATE</th>
      <th class="text-center">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $learnerID = $_GET['id'];
      $query = "SELECT DISTINCT date_ FROM learner_progress WHERE learnerID='$learnerID'";
      $query_run = mysqli_query($con, $query);

      $yearly_summary = [];

      if ($query_run && mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
          $date = $row['date_'];
          $year_key = date('Y', strtotime($date)); // e.g. "2025"

          if (!isset($yearly_summary[$year_key])) {
            $yearly_summary[$year_key] = [
              'start' => $year_key . '-01-01',
              'end' => $year_key . '-12-31',
              'label' => $year_key
            ];
          }
        }

        // Sort by year
        ksort($yearly_summary);

        foreach ($yearly_summary as $year_data) {
          ?>
          <tr>
            <td class="text-center text-dark"><?= $year_data['label']; ?></td>
            <td class="text-center">
              <a href="yearly-progress.php?id=<?= $learnerID; ?>&start=<?= $year_data['start']; ?>&end=<?= $year_data['end']; ?>" class="btn btn-sm btn-primary">VIEW SUMMARY</a>
            </td>
          </tr>
          <?php
        }
      }
    ?>
  </tbody>
  </table>




                        </div>
                           
                        </div>
                        </div>
                       
                        

                        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  new DataTable('#example');
</script>
<script>
    // PARA LUMABAS AGAD YUNG MODAL
    //document.addEventListener('DOMContentLoaded', function () {
    //  var myModal = new bootstrap.Modal(document.getElementById('addstudent'));
    //  myModal.show();
    //});

    function showRegistration() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'block'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname1'));
        myModal.show();
      });
    }
    function showParent() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname2'));
        myModal.show();
      });
    }
    function showUpdated() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.classname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.classname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      var elementsToHide = document.querySelectorAll('.classname3');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.classname3'));
        myModal.show();
      });
    }
    function viewshowRegistration() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.viewclassname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'block'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.viewclassname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'none'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.viewclassname1'));
        myModal.show();
      });
    }
    function viewshowParent() {
      // Select all elements with the class 'classname1' and show them
      var elementsToShow = document.querySelectorAll('.viewclassname1');
      elementsToShow.forEach(function(element) {
        element.style.display = 'none'; // Show element
      });

      var elementsToHide = document.querySelectorAll('.viewclassname2');
      elementsToHide.forEach(function(element) {
        element.style.display = 'block'; // Hide element
      });
      document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelectorAll('.viewclassname2'));
        myModal.show();
      });
    }
  </script>
  <script>
window.onload = function () {
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Intervention Process (Average)"
	},
	axisX: {
		interval: 1
	},
	axisY: {
		title: "",
		includeZero: true,
		scaleBreaks: {
			type: "wavy",
			customBreaks: [{
				startValue: 80,
				endValue: 210
				},
				{
					startValue: 230,
					endValue: 600
				}
		]}
	},
	data: [{
		type: "bar",
		toolTipContent: "<b>{label}</b><br>Average: {y}",
		dataPoints: [
			{ label: "Massage", y: 1.18},
			{ label: "Action Song", y: 1.39},
			{ label: "Sensory Integration", y: 2.17},
			{ label: "One on One", y: 1.81},
			{ label: "Overall Socialization and Communication", y: 3.00}
		]
	}]
});
chart.render();

}

$(document).ready(function() {
    $('#weeklyTable').DataTable();
});

$(document).ready(function() {
    $('#monthlyTable').DataTable();
});


$(document).ready(function() {
    $('#yearlyTable').DataTable();
});

</script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
