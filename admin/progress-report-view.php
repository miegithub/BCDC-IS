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
                  <div class="container p-3 card shadow-sm mt-4">
                    <div class="row">
                    <div class="row ">
                          <div class="col-md-12 m-3  text-end">
                        
                          
                        </div>
                        </div>
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
                        
                       
                          <div class="row">
                            <div class="col-md-6">
                              
                              <?php
                                $date_ = $_GET['d'];
                                $learnerID = $_GET['id'];
                                $query = "SELECT * FROM learner_progress WHERE learnerID='$learnerID' and date_='$date_'";
                                $query_run = mysqli_query($con,$query);
                                if($query_run){
                                  if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $row){
                                      $date_ = $row['date_'];
                                      $emotion = $row['emotion'];
                                      $sensitivity = $row['sensitivity'];
                                      $body = $row['body'];
                                      $confidence = $row['confidence'];
                                      $sound = $row['sound'];
                                      $gross = $row['gross'];
                                      $walking = $row['walking'];
                                      $jumping = $row['jumping'];
                                      $crawling = $row['crawling'];
                                      $hopping = $row['hopping'];
                                      $muscle_strength = $row['muscle_strength'];
                                      $muscle = $row['muscle'];
                                      $balance = $row['balance'];
                                      $bilateral = $row['bilateral'];
                                    }
                                  }
                                }
                              ?>
                              <div class="container">
                                <div class="row">
                                  <div class="col-md-12 d-flex">
                                    <label for="" class="fs-3 fw-light"><strong>DATE:</strong></label>
                                    <input type="text" class="form-control text-danger" value="<?= $date_; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                  <table class="table table-bordered bg-white">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="align-middle">INTERVENTION PROCESS</th>
                                            <th scope="col" class="text-center week-header">Grade Scale</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="subheader"><a href="#">A. MASSAGE</a></td>
                                            <td class="text-center"><strong><?= number_format((($emotion + $sensitivity) / 2), 2); ?></strong></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Emotion Regulation</td>
                                            <td class="text-center"><?= $emotion; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Sensitivity to touch</td>
                                            <td class="text-center"><?= $sensitivity; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="subheader"><a href="#">B. ACTION SONG</a></td>
                                            <td class="text-center"><strong><?= number_format((($body + $confidence + $sound) / 3), 2); ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Body Awareness</td>
                                            <td class="text-center"><?= $body; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Confidence</td>
                                            <td class="text-center"><?= $confidence; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Sound Tolerance</td>
                                            <td class="text-center"><?= $sound; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="subheader"><a href="#">C. SENSORY INTEGRATION</a></td>
                                            <td class="text-center"><strong> <?= number_format((($walking + $jumping + $crawling + $hopping + $muscle_strength + $muscle + $balance + $bilateral + $gross) / 9), 2); ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">I. Gross Motor Skills</td>
                                            <td class="text-center"><?= $gross; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-5">I.I. Walking</td>
                                            <td class="text-center"><?= $walking; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-5">I.II. Jumping</td>
                                            <td class="text-center"><?= $jumping; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-5">I.III. Crawling</td>
                                            <td class="text-center"><?= $crawling; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-5">I.IV. Hopping</td>
                                            <td class="text-center"><?= $hopping; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">II. Muscle Strength</td>
                                            <td class="text-center"><?= $muscle_strength; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">III. Muscle Endurance</td>
                                            <td class="text-center"><?= $muscle; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">IV. Balance</td>
                                            <td class="text-center"><?= $balance; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 border">V. Bilateral Coordination</td>
                                            <td class="text-center border"><?= $bilateral; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                              <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                              <!-- <div>
                                <a href="" class="btn btn-primary">view reports</a>
                              </div> -->
                              
                              <div class="row">
                              <div class="col-md-12">
                              <div class=" m-3 text-end mx-3 me-4">
                              <!-- Trigger button -->
                              <button type="button" class="btn active-btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal" 
                                      onclick="loadPDF('<?= $row['learnerID']; ?>', '<?= $row['date_']; ?>')">
                                  Generate PDF
                              </button>
                              </div>
                               </div>

                              </div>



                              <!-- PDF Modal -->
                              <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl"> <!-- XL for wider PDF view -->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="pdfModalLabel">Daily Progress Report Running Notes</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <iframe id="pdfViewer" src="pdf-daily.php?id=<?= $row['learnerID']; ?>&d=<?= $row['date_']; ?>" width="100%" height="600px" style="border:none;"></iframe>
                                    </div>
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
			{ label: "Massage", y: <?= number_format((($emotion + $sensitivity) / 2), 2); ?>},
			{ label: "Action Song", y: <?= number_format((($body + $confidence + $sound) / 3), 2); ?>},
			{ label: "Sensory Integration", y:  <?= number_format((($walking + $jumping + $crawling + $hopping + $muscle_strength + $muscle + $balance + $bilateral + $gross) / 9), 2); ?>},
			{ label: "One on One", y: <?= number_format((($emotion + $sensitivity) / 2), 2); ?>},
			{ label: "Overall Socialization and Communication", y: <?= number_format((($emotion + $sensitivity) / 2), 2); ?>}
		]
	}]
});
chart.render();

}
</script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
