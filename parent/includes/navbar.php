<?php
    ob_start();
    if(!isset($_SESSION['auth'])){
      header("location: ../index.php");
      exit(0);
    }
    else{
      $userID = $_SESSION['auth_user']['userID'];
      $login = "SELECT position FROM `user` WHERE ID='$userID'";
      $login_run = mysqli_query($con,$login);
      if($login_run){
        if(mysqli_num_rows($login_run) > 0){
          foreach($login_run as $row){
            if($row['position']!="Parent"){
              header("location: ../index.php");
              exit(0);
            }
          }
        }
      }
    }
    if($currentPage == "login"){

    }
    else{
?>
        <!-- Sidebar Section -->
  <div class="container aside" style="background-color:rgba(4, 3, 70); top:0; left:0; width:250px;">
    <div class="row toggle pt-3 d-flex justify-content-between">
  <div class="col-xl-12 col-md-12 col-sm-12 col logo d-flex justify-content-center">
    
    <img src="../images/LOGO1.png" class="rounded-circle border" style="width:8rem;height:8rem;
            transform: rotate(90deg);">
  </div>
  <div class="col-xl-2 col-md-2 col-sm-2 col">
    <div class="close" id="close-btn">
      <span class="material-symbols-outlined">
        close
      </span>
    </div>
  </div>
</div>

    <div class="row sidebar hv-100" style="background-color:rgba(4, 3, 70);">
      <div class="col-md-12 p-0 m-0">
        <a class="text-white pb-0 mb-0 mt-4" style="height:1rem;" readonly>
          <p class="fw-bold" style="font-size: 12px;">OVERVIEW</p>
        </a>
        <a href="index.php" <?php echo ($currentPage == "index") ? 'class="active"' : 'class=""'; ?>>
          <span class="material-symbols-outlined">
          dashboard
          </span>
          <h3>HOME</h3>
        </a>
        <?php
          $userID = $_SESSION['auth_user']['userID'];
          $query = "SELECT approved,learnerID FROM learner WHERE userID='$userID'";
          $query_run = mysqli_query($con,$query);
          if($query_run){
            if(mysqli_num_rows($query_run) > 0){
              foreach($query_run as $row){
                if($row['approved']!='0'){
                  ?>
                  <a class="text-white pb-0 mb-0 mt-4" style="height:1rem;" readonly>
                    <p class="fw-bold" style="font-size: 12px;">FORMS AND REPORT</p>
                  </a>
                  <a href="ass-report.php?id=<?= $row['learnerID']; ?>" <?php echo ($currentPage == "assessment") ? 'class="active"' : 'class=""'; ?>>
                    <span class="material-symbols-outlined">
                    </span>
                    <h3>ASSESSMENT REPORT</h3>
                  </a>
                  <a href="ipp.php?id=<?= $row['learnerID']; ?>" <?php echo ($currentPage == "ipp") ? 'class="active"' : 'class=""'; ?>>
                    <span class="material-symbols-outlined">
                    </span>
                    <h3>INDIVIDUALIZED PROGRAM PLAN</h3>
                  </a>
                  <a href="progress-report.php?id=<?= $row['learnerID']; ?>" <?php echo ($currentPage == "progress") ? 'class="active"' : 'class=""'; ?>>
                    <span class="material-symbols-outlined">
                    </span>
                    <h3>PROGRESS REPORT (RUNNING NOTES)</h3>
                  </a>
                  <a href="narrative-report.php?id=<?= $row['learnerID']; ?>" <?php echo ($currentPage == "narrative") ? 'class="active"' : 'class=""'; ?>>
                    <span class="material-symbols-outlined">
                    </span>
                    <h3>NARRATIVE PROGRESS REPORT</h3>
                  </a>
                  <?php
                }
              }
            }
          }
        ?>
       
      </div>
    </div>
    <div class="row sidebar pb-3" style="background-color:rgba(47, 47, 47);height:auto">
      <div class="col-md-12 p-0 m-0 text-white">
        <a class="text-white pt-4" style="height:1rem;" readonly>
          <p class="fw-bold">Logged in as:</p>
        </a>
        <a class="text-white pt-4" style="height:1rem;" readonly>
          <p class="fw-bold">Parent</p>
        </a>
      </div>
    </div>
  </div>
</div>
        <!-- End of Sidebar Section -->
        <!-- Main Content -->
<div class="<?= $column_whole_main; ?> main bg-white" style="padding-left: 255px;">

  <div class="container border-start border-white d-flex justify-content-end m-0 mw-100 pt-1" style="background-color:rgba(4, 3, 70);width:auto;height:50px;">
    <!-- <label class="fs-5 text-white pt-1 pe-2" for=""><//?= $_SESSION['username']; ?></label>
    <img src="../images/profile.png" class="rounded-pill" alt="" style="width:40px;height:40px;"> -->
    <div class="dropdown">
      <button class="btn dropdown-toggle text-white me-4 logout-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
        
      </button>
      <ul class="dropdown-menu dropdown-menu-dark opacity-75 border border-white pt-0 pb-0" aria-labelledby="dropdownMenuButton2">
        <li class=" text-center">
          <form action="logout.php" method="post">
            <button type="submit" name="logout_btn" class="text-white dropdown-item logout border-bottom border-white" href="#">Log out <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
          </form>
        </li>
        <li class=" text-center">
        <?php
        $query = "SELECT * FROM user WHERE ID = '$userID'";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
        
        ?>
       <a class="dropdown-item text-white text-decoration-none " href="setting.php?setting=<?= $userID; ?>">Settings <i class="fa-solid fa-user-gear"></i>
</a>

        </li>
      </ul>
    </div>
  </div>
<script>
    
  const sideMenu = document.querySelector('.aside');
  const menuBtn = document.getElementById('menu-btn');
  const closeBtn = document.getElementById('close-btn');

  const darkMode = document.querySelector('.dark-mode');

  menuBtn.addEventListener('click', () => {
      sideMenu.style.display = 'block';
  });

  closeBtn.addEventListener('click', () => {
      sideMenu.style.display = 'none';
  });
</script>
<?php
    
  }
?>