<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="progress";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 
?>
<style>
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
                              <a href="progress-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link active active-btn text-white">Progress Report (running notes)</a>
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
              <div class="row">
                <div class="col-md-12 hv-100">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12 d-flex">
                        <label for="" class="pt-0">
                          <i class="fa-solid fa-circle-info"></i> LEGENDS: 
                          <label for="" class="text-danger fs-3"><div style="width:15px;height:10px;background-color:rgba(187, 107, 217);"></div> </label> 0(POOR) 
                          <label for="" class="text-danger fs-3">•</label>1(POOR) 
                          <label for="" class="text-warning fs-3">•</label>2(FAIR) 
                          <label for="" class="text-success fs-3">•</label>3(GOOD)
                        </label>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-12">
                        <div class="container p-3 card shadow-sm">
                          <div class="row">
                            <div class="col-md-6">
                            <?php
$start_date = $_GET['start'];
$end_date = $_GET['end'];
$learnerID = $_GET['id'];

// Kunin lahat ng records sa buong taon
$query = "SELECT * FROM learner_progress 
          WHERE learnerID='$learnerID' 
          AND date_ BETWEEN '$start_date' AND '$end_date'";
$query_run = mysqli_query($con, $query);

// Group by month number
$monthly_data = [];
while ($row = mysqli_fetch_assoc($query_run)) {
    $month = date('F', strtotime($row['date_'])); // January, February, etc.
    $monthly_data[$month][] = $row;
}
?>

                            <!-- HTML Output ng Weekly Data -->
                            <div class="container">
                            <div class="row">
                                <div class="col-md-12 d-flex">
                                <label for="" class="fs-3 fw-light"><strong>DATE:</strong></label>
                                <input type="text" class="form-control text-danger" value="<?= $start_date . ' - ' . $end_date; ?>" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                <table class="table table-bordered bg-white">
        <thead class="table-light">
          <tr>
            <th>INTERVENTION PROCESS</th>
            <?php foreach ($monthly_data as $month_name => $entries): ?>
              <th class="text-center"><?= $month_name; ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <!-- MASSAGE AVERAGE -->
          <tr>
            <td class="subheader"><a href="#">A. MASSAGE</a></td>
            <?php foreach ($monthly_data as $entries): 
              $avg = array_reduce($entries, function($carry, $row) {
                return $carry + (($row['emotion'] + $row['sensitivity']) / 2);
              }, 0) / count($entries);
            ?>
              <td class="text-center"><strong><?= round($avg, 2); ?></strong></td>
            <?php endforeach; ?>
          </tr>
          <tr><td class="ps-4">Emotion Regulation</td>
            <?php foreach ($monthly_data as $entries): 
              echo "<td class='text-center'>" . round(array_sum(array_column($entries, 'emotion')) / count($entries), 2) . "</td>";
            endforeach; ?>
          </tr>
          <tr><td class="ps-4">Sensitivity to Touch</td>
            <?php foreach ($monthly_data as $entries): 
              echo "<td class='text-center'>" . round(array_sum(array_column($entries, 'sensitivity')) / count($entries), 2) . "</td>";
            endforeach; ?>
          </tr>

          <!-- ACTION SONG -->
          <tr>
            <td class="subheader"><a href="#">B. ACTION SONG</a></td>
            <?php foreach ($monthly_data as $entries): 
              $avg = array_reduce($entries, function($carry, $row) {
                return $carry + (($row['body'] + $row['confidence'] + $row['sound']) / 3);
              }, 0) / count($entries);
            ?>
              <td class="text-center"><strong><?= round($avg, 2); ?></strong></td>
            <?php endforeach; ?>
          </tr>
          <tr><td class="ps-4">Body Awareness</td>
            <?php foreach ($monthly_data as $entries): 
              echo "<td class='text-center'>" . round(array_sum(array_column($entries, 'body')) / count($entries), 2) . "</td>";
            endforeach; ?>
          </tr>
          <tr><td class="ps-4">Confidence</td>
            <?php foreach ($monthly_data as $entries): 
              echo "<td class='text-center'>" . round(array_sum(array_column($entries, 'confidence')) / count($entries), 2) . "</td>";
            endforeach; ?>
          </tr>
          <tr><td class="ps-4">Sound Tolerance</td>
            <?php foreach ($monthly_data as $entries): 
              echo "<td class='text-center'>" . round(array_sum(array_column($entries, 'sound')) / count($entries), 2) . "</td>";
            endforeach; ?>
          </tr>

          <tr>
            <!-- <td class="subheader"><a href="#">C. ACTION SONG</a></td>
            <//?php foreach ($monthly_data as $entries): 
              $avg = array_reduce($entries, function($carry, $row) {
                return $carry + (($row['body'] + $row['confidence'] + $row['sound']) / 3);
              }, 0) / count($entries);
            ?>
              <td class="text-center"><strong><//?= round($avg, 2); ?></strong></td>
            <//?php endforeach; ?>
          </tr> -->

          <td class="subheader"><a href="#">C. SENSORY INTEGRATION</a></td>
                    <?php foreach ($monthly_data as $entries): 
                        $avg = array_reduce($entries, function($carry, $row) {
                            return $carry + (($row['walking'] + $row['jumping']+ $row['crawling']+ $row['hopping']+ $row['muscle_strength']+ $row['muscle']+ $row['balance']+ $row['bilateral']+ $row['gross']) / 9);
                        }, 0) / count($entries);
                    ?>
                        <td class="text-center"><strong><?= round($avg, 2); ?></strong></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                 <td class="ps-4">I. Gross Motor Skills</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'gross'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <tr>
                 <td class="ps-5">I.I. Walking</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'walking'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <tr>
                 <td class="ps-5">I.II. Jumping</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'jumping'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <tr>
                 <td class="ps-5">I.III. Crawling</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'crawling'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <td class="ps-5">I.IV. Hopping</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'hopping'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <tr>
                 <td class="ps-4">II. Muscle Strength</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'muscle_strength'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <tr>
                 <td class="ps-4">III. Muscle Endurance</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'muscle'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <tr>
                 <td class="ps-4">IIV. Balance</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'balance'));
                        echo "<td class='text-center'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>
                 <tr>
                 <td class="ps-4 border">IV. Bilateral Coordination</td>
                 <?php foreach ($monthly_data as $entries): 
                        $sum = array_sum(array_column($entries, 'bilateral'));
                        echo "<td class='text-center border'>" . round($sum / count($entries), 2) . "</td>";
                    endforeach; ?>
                 </tr>













          <!-- SENSORY INTEGRATION (gaya ng dati mong structure, inadjust lang per month) -->
          <!-- Pwede ko rin itong i-adjust if gusto mong gawing expandable per category -->
          
          <!-- Ilalagay ko rin dito ang remaining rows kung gusto mo, pero pareho lang logic ng rounding per month -->

        </tbody>
      </table>

                              
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                              <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                              <div class="row">
                              <div class="col-md-12">
                              <div class="m-3 text-end mx-3 me-4">
                                    <?php
                                    $start_date = $_GET['start'] ?? null;
                                    $end_date = $_GET['end'] ?? null;
                                    $learnerID = $_GET['id'] ?? null;
                                    
                                    if (!$start_date || !$end_date || !$learnerID) {
                                        echo "<div class='alert alert-warning'>No date range available for PDF generation.</div>";
                                    } else {
                                        // Modal trigger button
                                        echo '<button type="button" class="btn active-btn btn-primary" data-bs-toggle="modal" data-bs-target="#weeklyPdfModal">
                                                Generate PDF
                                              </button>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Weekly PDF Modal -->
                        <div class="modal fade" id="weeklyPdfModal" tabindex="-1" aria-labelledby="weeklyPdfModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="weeklyPdfModalLabel">Monthly Progress Report Running Notes</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="pdf-yearly.php?id=<?= htmlspecialchars($learnerID) ?>&start=<?= htmlspecialchars($start_date) ?>&end=<?= htmlspecialchars($end_date) ?>" 
                                                width="100%" 
                                                height="600px" 
                                                style="border:none;"></iframe>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>

                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-1"></div>
                      <div class="col-md-11">
                        <label for="" class="text-primary">REMARKS:</label>
                        <textarea name="" id="" class="form-control" style="height:100px;"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-end">
                        <a href="progress-report.php?id=<?= $learnerID; ?>" class="btn text-white" style="background:rgba(31, 93, 167)">Back</a>
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

<style>
.active-btn {
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

.active-btn:hover {
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
      // tentative palang ito hindi lahat nakukuha eh
			{ label: "Sensory Integration", y: 1.00},
            { label: "One on One", y: 1.39 },
			{ label: "Overall Socialization and Communication", y: 3.00}
			// <//?= number_format((($emotion + $sensitivity) / 2), 2);?>
		]
	}]
});
chart.render();

}
</script>

</script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>


