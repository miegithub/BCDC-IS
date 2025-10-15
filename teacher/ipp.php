<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="ipp";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');


 
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
          <!-- LEFT -->
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
                  <input type="text" name="student_name" class="form-control black-border" value="<?= $name ?>" readonly>
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
                  <input type="text" name="teacher_incharge" class="form-control black-border" value="<?= $teacher_incharge; ?>" readonly>
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
                              <a href="ipp.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link active active-btn text-white">Individualized Program Plan (IPP)</a>
                            </li>
                            <li class="nav-item">
                              <a href="progress-report.php?id=<?= $_GET['id']; ?>" class="me-1 nav-link not-active-btn">Progress Report (running notes)</a>
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
                  <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                    <div class="container pt-3 mw-100 m-0" style="width:99%;">
                      <div class="row">
                        <div class="col-md-12">
                          
                        <?php

                              $date=null;
                              if (isset($_POST['submit_longtermtarget'])) {
                                   
                                //$learnerID = mysqli_real_escape_string($con, $_POST['learnerID']);
                                $ipp_date = $_POST['ipp_date'] ?? '';
                                $long_term_target = $_POST['long_term_target'] ?? '';

                              
                                $sql = "UPDATE learner 
                                        SET ipp_date = '$ipp_date', long_term_target = '$long_term_target' 
                                        WHERE learnerID = '$learnerID'";

                                
                                $query_run = mysqli_query($con, $sql);

                                
                                if ($query_run) {
                                    $_SESSION['message'] = "Long-term target added successfully";
                                    
                                } else {
                                    $_SESSION['error'] = "Long-term target added failed";
                                   
                                }
                            }

                            //para nakasave lang yung data kahit irefresh
                        
                            // if ($learnerID) {
                            //     $sql_get = "SELECT ipp_date, long_term_target FROM learner WHERE learnerID = '$learnerID'";
                            //     $result = mysqli_query($con, $sql_get);

                            //     if ($result && mysqli_num_rows($result) > 0) {
                            //         $row = mysqli_fetch_assoc($result);
                            //         $ipp_date = $row['ipp_date'];
                            //         $long_term_target = $row['long_term_target'];
                                    
                            //     }
                            // }
                              
                              if(isset($_POST['submit_program'])){
                                
                                $program = mysqli_real_escape_string($con, $_POST['program']);
                                $month1 = mysqli_real_escape_string($con, $_POST['month1']);
                                $month2 = mysqli_real_escape_string($con, $_POST['month2']);
                                $month3 = mysqli_real_escape_string($con, $_POST['month3']);
                                $ipp_date = mysqli_real_escape_string($con, $_POST['ipp_date']);
                                $long_term_target = mysqli_real_escape_string($con, $_POST['long_term_target']);

                                
                                echo '<script>alert("'.$long_term_target.'")</script>';
                                $INSERT = "INSERT INTO learner_program (learnerID,`program`, `month_1`, `month_2`, `month_3`) VALUES ('$learnerID','$program','$month1','$month2','$month3')";
                                mysqli_query($con, $INSERT);

                                
                                
                              }



                              if ($learnerID) {
                                $sql_get = "SELECT ipp_date, long_term_target FROM learner WHERE learnerID = '$learnerID'";
                                $result = mysqli_query($con, $sql_get);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $ipp_date = $row['ipp_date'];
                                    $long_term_target = $row['long_term_target'];
                                    
                                }
                            }

                              if(isset($_POST['submit_targetprogram'])){
                                $month1_target_program = mysqli_real_escape_string($con, $_POST['month1_target_program']);
                                $month2_target_program = mysqli_real_escape_string($con, $_POST['month2_target_program']);
                                $month3_target_program = mysqli_real_escape_string($con, $_POST['month3_target_program']);

                                $month1_date_from = mysqli_real_escape_string($con, $_POST['month1_date_from']);
                                $month1_date_to = mysqli_real_escape_string($con, $_POST['month1_date_to']);
                                $month2_date_from = mysqli_real_escape_string($con, $_POST['month2_date_from']);
                                $month2_date_to = mysqli_real_escape_string($con, $_POST['month2_date_to']);
                                $month3_date_from = mysqli_real_escape_string($con, $_POST['month3_date_from']);
                                $month3_date_to = mysqli_real_escape_string($con, $_POST['month3_date_to']);

                                $month1_week1 = mysqli_real_escape_string($con, $_POST['month1_week1']);
                                $month1_week2 = mysqli_real_escape_string($con, $_POST['month1_week2']);
                                $month1_week3 = mysqli_real_escape_string($con, $_POST['month1_week3']);
                                $month1_week4 = mysqli_real_escape_string($con, $_POST['month1_week4']);
                                
                                $month2_week1 = mysqli_real_escape_string($con, $_POST['month2_week1']);
                                $month2_week2 = mysqli_real_escape_string($con, $_POST['month2_week2']);
                                $month2_week3 = mysqli_real_escape_string($con, $_POST['month2_week3']);
                                $month2_week4 = mysqli_real_escape_string($con, $_POST['month2_week4']);
                                
                                $month3_week1 = mysqli_real_escape_string($con, $_POST['month3_week1']);
                                $month3_week2 = mysqli_real_escape_string($con, $_POST['month3_week2']);
                                $month3_week3 = mysqli_real_escape_string($con, $_POST['month3_week3']);
                                $month3_week4 = mysqli_real_escape_string($con, $_POST['month3_week4']);


                                echo '<script>alert("'.$long_term_target.'")</script>';
                                $INSERT = "INSERT INTO `learner_targetprogram`(`learnerID`, month1_targetprogram, month2_targetprogram, month3_targetprogram, `month1_date_from`, `month1_date_to`, `month2_date_from`, `month2_date_to`, `month3_date_from`, `month3_date_to`, `month1_week1`, `month1_week2`, `month1_week3`, `month1_week4`, `month2_week1`, `month2_week2`, `month2_week3`, `month2_week4`, `month3_week1`, `month3_week2`, `month3_week3`, `month3_week4`) VALUES ('$learnerID', '$month1_target_program', '$month2_target_program', '$month3_target_program' ,'$month1_date_from','$month1_date_to','$month2_date_from','$month2_date_to','$month3_date_from','$month3_date_to','$month1_week1','$month1_week2','$month1_week3','$month1_week4','$month2_week1','$month2_week2','$month2_week3','$month2_week4','$month3_week1','$month3_week2','$month3_week3','$month3_week4')";
                                
                                mysqli_query($con, $INSERT);

                                
                               
                              }
                              
                            ?>

                            
                                <div class="col-md-12 hv-100">
                                  


                                 
                                    <div class="card">
                                      <div class="card-body">
                                      <div><p class="text-danger">Learner's Program Plan Details</p> <hr></div>



                                      <div class="row">
                                    
                                      <div class="col-md-6">
                                        <div class="m-3" >
                                        <label class="m-2" for="">Name of Learner:</label>
                                        <input type="text" class="form-control" value="<?= $name; ?>" readonly>
                                      
                                    </div>

                                    <div class="m-3">
                                      <label class="m-2" for="">Age:</label>
                                        <input type="hidden" name="learnerID" value="<?= $learnerID; ?>">
                                        <input type="text" class="form-control" value="<?= $age; ?>" readonly>
                                      
                                    </div>
                                    </div>
                                  
                                      <div class="col-md-6">
                                        <div class="m-3">
                                        <label class="m-2" for="">Therapist:</label>
                                        <input type="text" class="form-control" value="<?= $teacher_incharge; ?>" readonly>
                                        </div>
                                   

                                    
                                    <form action="" method="post" onsubmit="setHiddenValue()">
                                   
                                      <div class="m-3">
                                        <label class="m-2" for="">Date:</label>
                                        <input type="date" name="ipp_date" class="form-control" value="<?= htmlspecialchars($ipp_date ?? '') ?>" required>
                                      </div>

                                      </div>
                                   

                                    </div>
                                    </div>
                                    </div>

















                                    <div class="m-3 my-4 "></div>
                                    <div class="row mb-2">
                                      
                                   

                                    <div class="col-md-12 text-end">
                                      <div class="text-start">
                                    <label class="mt-5"  for=""><strong>LONG-TERM TARGET</strong></label></div>
                                        <button type="submit" name="submit_longtermtarget" data-bs-toggle="tooltip" title="Submit Long Term-Target" class="btn btn-light"><i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                    <div class="row mb-2">
                                      <div class="col-md-12">
                                      
                                        <!-- <textarea name="long_term_target" id="long_term_target" class="form-control border-dark" style="width:100%; height:300px;">value=""</textarea> -->
                                        <textarea name="long_term_target" class="form-control " style="width:100%; height:300px;"><?= htmlspecialchars($long_term_target ?? '') ?></textarea>
                                     
                                    </div>
                                    </div>

                               
                                    <div class="row mb-2">
                                      <div class="col-md-12 text-end">
                                        <div class="text-start">
                                      <label class="mt-5"  for=""><strong>DETAILED ACTIVITIES (MONTHS TARGET)</strong></label></div>
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addprogram"  data-bs-toggle="tooltip" title="Add Program"><i class="bi bi-plus"></i></button>
                                        <div class="modal fade" id="addprogram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                         
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">ADD PROGRAM</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="container text-start">
                                                  <div class="row mb-2">
                                                    <div class="col-md-12">
                                                      <label for="">Program:</label>
                                                      <input type="text" class="form-control" name="program" >
                                                    </div>
                                                  </div>
                                                  <div class="row mb-2">
                                                    <div class="col-md-12">
                                                      <label for="">1st Month:</label>
                                                      <textarea  name="month1"  id="" class="form-control" style="width:100%; height:300px;"></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="row mb-2">
                                                    <div class="col-md-12">
                                                      <label for="">2nd Month:</label>
                                                      <textarea  name="month2"  id="" class="form-control" style="width:100%; height:300px;"></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="row mb-2">
                                                    <div class="col-md-12">
                                                      <label for="">3rd Month:</label>
                                                      <textarea  name="month3" id="" class="form-control" style="width:100%; height:300px;"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="submit" name="submit_program" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                              </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    


                                    
                                    <div class="row mb-3">
                                      <div class="col-md-12">
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th class="text-center"></th>
                                              <th class="text-center" colspan="3">MONTH</th>
                                            </tr>
                                            <tr>
                                              <th class="text-center">PROGRAM</th>
                                              <th class="text-center">1st Month</th>
                                              <th class="text-center">2nd Month</th>
                                              <th class="text-center">3rd Month</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $query = "SELECT * FROM `learner_program` WHERE learnerID='$learnerID'";
                                              $query_run = mysqli_query($con,$query);
                                              if($query_run){
                                                if(mysqli_num_rows($query_run) > 0){
                                                  foreach($query_run as $row){
                                            ?>
                                                    
                                                      <tr>
                                                        <td class="border text-center"><?= $row['program']; ?></td>
                                                        <td class="border text-center"><?= $row['month_1']; ?></td>
                                                        <td class="border text-center"><?= $row['month_2']; ?></td>
                                                        <td class="border text-center"><?= $row['month_3']; ?></td>
                                                      </tr>
                                            <?php
                                                  }
                                                }
                                                else{
                                            ?>
                                                      <tr><td colspan="4" class="text-center border">NO RECORD FOUND</td></tr>
                                            <?php
                                                }
                                              }
                                            ?>













                                          </tbody>
                                        </table>
                                      </div>
                                    </div>

                                 

                                    <div class="row mb-2 ">
                                      <div class="col-md-12 ">
                                        <div class="text-start ">
                                      <label class="mt-5" for=""><strong>DETAILED ACTIVITIES (WEEKLY TARGETS)</strong></label></div>
                                        <!-- <label for="">Detailed Activities (Weekly Targets)</label> -->
                                      </div>
                                      <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal"  data-bs-toggle="tooltip" title="Add Target Program" data-bs-target="#addtargetprogram"><i class="bi bi-plus"></i></button>
                                        <div class="modal fade" id="addtargetprogram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <form action="" method="post" onsubmit="setHiddenValue()">
                                                
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="staticBackdropLabel">ADD TARGET PROGRAM</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="container text-start card px-3 py-2 mb-2">
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        
                                                <!-- <input type="hidden" name="long_term_target" id="hidden_long_term_target1" readonly>
                                                <input type="hidden" name="ipp_date" id="hidden_ipp_date1" readonly> -->
                                                        <label for="" class="text-decoration-underline"><strong>1st MONTH</strong></label>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-6">
                                                        <label for="">Date From:</label>
                                                        <input type="date" class="form-control" name="month1_date_from" required>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <label for="">Date To:</label>
                                                        <input type="date" class="form-control" name="month1_date_to" required>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                      <div class="col-md-12">
                                                        <label for="">Target Program:</label>
                                                        <textarea  name="month1_target_program" required id="" class="form-control" style="width:100%;height:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 1:</label>
                                                        <textarea  name="month1_week1" requisred id="" class="form-control" style="width:100%;height:300px;"></textarea>
                                                      </div>       
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 2:</label>
                                                        <textarea  name="month1_week2" required id="" class="form-control" style="width:100%;height:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 3:</label>
                                                        <textarea  name="month1_week3" required id="" class="form-control" style="width:100%;height:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                      <div class="col-md-12">
                                                        <label for="">Week 4:</label>
                                                        <textarea  name="month1_week4" required id="" class="form-control" style="width:100%;height:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                  </div> 
                                                  <div class="container text-start card px-3 py-2 mb-2">
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <label for="" class="text-decoration-underline"><strong>2nd MONTH</strong></label>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-6">
                                                        <label for="">Date From:</label>
                                                        <input type="date" class="form-control" name="month2_date_from" required>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <label for="">Date To:</label>
                                                        <input type="date" class="form-control" name="month2_date_to" required>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                      <div class="col-md-12">
                                                        <label for="">Target Program:</label>
                                                        <textarea  name="month2_target_program" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 1:</label>
                                                        <textarea  name="month2_week1" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 2:</label>
                                                        <textarea  name="month2_week2" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 3:</label>
                                                        <textarea  name="month2_week3" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                      <div class="col-md-12">
                                                        <label for="">Week 4:</label>
                                                        <textarea  name="month2_week4" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                  </div> 
                                                  <div class="container text-start card px-3 py-2">
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <label for="" class="text-decoration-underline"><strong>3rd MONTH</strong></label>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-6">
                                                        <label for="">Date From:</label>
                                                        <input type="date" class="form-control" name="month3_date_from" required>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <label for="">Date To:</label>
                                                        <input type="date" class="form-control" name="month3_date_to" required>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="row mb-2">
                                                      <div class="col-md-12">
                                                        <label for="">Target Program:</label>
                                                        <textarea  name="month3_target_program" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 1:</label>
                                                        <textarea  name="month3_week1" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 2:</label>
                                                        <textarea  name="month3_week2" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                      <div class="col-md-12">
                                                        <label for="">Week 3:</label>
                                                        <textarea  name="month3_week3" required id="" class="form-control" style="width:100%;heigth:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                      <div class="col-md-12">
                                                        <label for="">Week 4:</label>
                                                        <textarea  name="month3_week4" required id="" class="form-control" style="width:100%;height:300px;"></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="submit" name="submit_targetprogram" class="btn btn-primary">Submit</button>
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th class="text-center">Target Program</th>
                                              <th class="text-center" colspan="4">Month Duration: 3 months</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            


                                          
                                            <?php
                                                $query = "SELECT * FROM `learner_targetprogram` WHERE learnerID='$learnerID'";
                                                $query_run = mysqli_query($con,$query);
                                                if($query_run){
                                                  if(mysqli_num_rows($query_run) > 0){
                                                    foreach($query_run as $row){
                                              ?>
                                                      <tr>
                                                        <td></td>
                                                        <td class="text-center" colspan="4">1st Month (Date: <?= date('F j, Y', strtotime($row['month1_date_from'])) ?> to <?= date('F j, Y', strtotime($row['month1_date_to'])) ?>)</td>
                                                      </tr>
                                                      <tr>
                                                        <td class="text-center border align-item-center justify-content-center"><?= $row['month1_targetprogram']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 1 <br><br></strong><?= $row['month1_week1']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 2 <br><br></strong><?= $row['month1_week2']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 3 <br><br></strong><?= $row['month1_week3']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 4 <br><br></strong><?= $row['month1_week4']; ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td></td>
                                                        <td class="text-center" colspan="4">2nd Month (Date: <?= date('F j, Y', strtotime($row['month2_date_from'])) ?> to <?= date('F j, Y', strtotime($row['month2_date_to'])) ?>)</td>
                                                      </tr>
                                                      <tr>
                                                        <td class="text-center border"><?= $row['month2_targetprogram']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 1 <br><br></strong><?= $row['month2_week1']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 2 <br><br></strong><?= $row['month2_week2']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 3 <br><br></strong><?= $row['month2_week3']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 4 <br><br></strong><?= $row['month2_week4']; ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td></td>
                                                        <td class="text-center" colspan="4">3rd Month (Date: <?= date('F j, Y', strtotime($row['month3_date_from'])) ?> to <?= date('F j, Y', strtotime($row['month3_date_to'])) ?>)</td>
                                                      </tr>
                                                      <tr>
                                                        <td class="text-center border"><?= $row['month3_targetprogram']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 1 <br><br></strong><?= $row['month3_week1']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 2 <br><br></strong><?= $row['month3_week2']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 3 <br><br></strong><?= $row['month3_week3']; ?></td>
                                                        <td class="text-center border"><strong class="text-dark">Week 4 <br><br></strong><?= $row['month3_week4']; ?></td>
                                                      </tr>
                                              <?php
                                                    }
                                                  }
                                                  else{
                                              ?>
                                                        <tr><td colspan="4" class="text-center border">NO RECORD FOUND</td></tr>
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
                              <!-- <div class="row mb-2">
                                <div class="col-md-12 text-end">
                                    <button type="submit" name="submit_ipp" class="btn btn-primary">Submit</button>
                                </div>
                              </div> -->
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
<!-- REGISTRATION DETAIL -->
<div class="modal fade classname1" id="editstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:695px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addstudentlabel">Student Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
              <nav class="navbar navbar-expand-lg navbar-light pb-0">
                  <div class="container-fluid ps-0 ms-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#editstudent2" onclick="showParent()">Parent Information</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn" data-bs-toggle="modal" data-bs-target="#editstudent3" onclick="showUpdated()">Updated Image</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
            </div>
          </div>
          <div class="row card">
            <div class="container pt-2">
              <div class="row">
                <!-- LEFT HALF -->
                <div class="col-md-3 p-0 ps-1">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-12">
                        <img src="../images/admin.jpg" alt="" style="height:135px;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RIGHT HALF -->
                <div class="col-md-9">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Student Name</label>
                        <input type="text" name="student_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label fw-light">Age</label>
                        <input type="number" name="age" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-3">
                        <label class="form-label fw-light">Sex</label>
                        <select class="form-select form-select-sm" name="sex" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Diagnosis</label>
                        <select class="form-select form-select-sm" name="diagnosis" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="diagnosis_1">Diagnosis 1</option>
                          <option value="diagnosis_2">Diagnosis 2</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-7">
                        <label class="form-label fw-light">Registration No.</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date Enrolled</label>
                        <input type="date" name="name" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- PARENT INFORMATION -->
<div class="modal fade classname2" id="editstudent2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:695px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addstudentlabel">Student Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
              <nav class="navbar navbar-expand-lg navbar-light pb-0">
                  <div class="container-fluid ps-0 ms-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                      <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#editstudent" onclick="showRegistration()">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn ">Parent Information</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn" data-bs-toggle="modal" data-bs-target="#editstudent3" onclick="showUpdated()">Updated Image</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
            </div>
          </div>
          <div class="row card">
            <div class="container pt-2">
              <div class="row">
                <!-- LEFT HALF -->
                <div class="col-md-3 p-0 ps-1">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-12">
                        <img src="../images/admin.jpg" alt="" style="height:142px;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RIGHT HALF -->
                <div class="col-md-9">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Guardian Name</label>
                        <input type="text" name="guardian_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Relationship</label>
                        <input type="text" name="relationship" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Contact Number</label>
                        <input type="number" name="contact_no" class="form-control black-border" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Email</label>
                        <input type="email" name="guardian_email" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- UPDATED IMAGE -->
<div class="modal fade classname3" id="editstudent3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:695px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addstudentlabel">Student Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
              <nav class="navbar navbar-expand-lg navbar-light pb-0">
                  <div class="container-fluid ps-0 ms-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                      <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#editstudent" onclick="showRegistration()">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#editstudent2" onclick="showParent()">Parent Information</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn">Updated Image</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
            </div>
          </div>
          <div class="row card">
            <div class="container pt-2">
              <div class="row">
                <!-- LEFT HALF -->
                <div class="col-md-3 p-0 ps-1">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-12">
                        <img src="../images/admin.jpg" alt="" style="height:135px;">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RIGHT HALF -->
                <div class="col-md-9">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="fw-bold">Upload Image</label>
                        <input type="file" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr class="hr">
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- VIEW REGISTRATION DETAIL -->
<div class="modal fade viewclassname1" id="viewstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:695px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addstudentlabel">Student Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
              <nav class="navbar navbar-expand-lg navbar-light pb-0">
                  <div class="container-fluid ps-0 ms-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn " data-bs-toggle="modal" data-bs-target="#viewstudent1" onclick="viewshowParent()">Parent Information</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
            </div>
          </div>
          <div class="row card">
            <div class="container pt-2">
              <div class="row">
                <!-- LEFT HALF -->
                <div class="col-md-3 p-0 ps-1">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-12">
                        <img src="../images/admin.jpg" alt="" style="height:135px;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RIGHT HALF -->
                <div class="col-md-9">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Student Name</label>
                        <input type="text" name="student_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label fw-light">Age</label>
                        <input type="number" name="age" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-3">
                        <label class="form-label fw-light">Sex</label>
                        <select class="form-select form-select-sm" name="sex" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Diagnosis</label>
                        <select class="form-select form-select-sm" name="diagnosis" aria-label=".form-select-sm example" required>
                          <option selected hidden></option>
                          <option value="diagnosis_1">Diagnosis 1</option>
                          <option value="diagnosis_2">Diagnosis 2</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-7">
                        <label class="form-label fw-light">Registration No.</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Date Enrolled</label>
                        <input type="date" name="name" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr class="hr mb-1">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-12 text-end">
                        <button class="btn btn-primary">Learner Document Records</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- VIEW PARENT INFORMATION -->
<div class="modal fade viewclassname2" id="viewstudent1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addstudentlabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:695px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addstudentlabel">Student Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-start ps-0 ms-0 pb-0 mb-0">
              <nav class="navbar navbar-expand-lg navbar-light pb-0">
                  <div class="container-fluid ps-0 ms-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                      <li class="nav-item">
                          <button class="me-1 nav-link not-active-btn" aria-current="page" data-bs-toggle="modal" data-bs-target="#viewstudent" onclick="viewshowRegistration()">Registration Details</button>
                        </li>
                        <li class="nav-item">
                          <button class="me-1 nav-link active active-btn ">Parent Information</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
            </div>
          </div>
          <div class="row card">
            <div class="container pt-2">
              <div class="row">
                <!-- LEFT HALF -->
                <div class="col-md-3 p-0 ps-1">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-12">
                        <img src="../images/admin.jpg" alt="" style="height:142px;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="form-label fw-light">Teacher In-charge:</label>
                        <input type="text" name="teacher_in_charge" class="form-control black-border" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RIGHT HALF -->
                <div class="col-md-9">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Guardian Name</label>
                        <input type="text" name="guardian_name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-light">Relationship</label>
                        <input type="text" name="relationship" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1">
                      <div class="col-md-6">
                        <label class="form-label fw-light">Contact Number</label>
                        <input type="number" name="contact_no" class="form-control black-border" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-light">Email</label>
                        <input type="email" name="guardian_email" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mt-1 mb-2">
                      <div class="col-md-8">
                        <label class="form-label fw-light">Address</label>
                        <input type="text" name="name" class="form-control black-border" required>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
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
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>