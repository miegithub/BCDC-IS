<?php
    ob_start();

    
    if($currentPage == "login"){

    }
    else{
?>
<style>
  .logout:hover{
    background-color:rgba(4, 3, 70);
  }
  .btn:first-child:active{
    border-color:rgba(4, 3, 70);
  }
  .btn.show{
    border-color: rgba(4, 3, 70);
  }
</style>


        <!-- Sidebar Section -->
  <div class="container aside" style="background-color:rgba(4, 3, 70);">
    <div class="row toggle pt-3 d-flex justify-content-between">
      <div class="col-xl-12 col-md-12 col-sm-12 col logo d-flex justify-content-center">
          <img src="../images/LOGO1.png" class="rounded-circle border" style="width:8rem;height:8rem;transform: rotate(90deg);">
      </div>
      <div class="col-xl-2 col-md-2 col-sm-2 col">
        <div class="close" id="close-btn">
          <span class="material-symbols-outlined">
            close
          </span>
        </div>
      </div>
    </div>

    <div class="row sidebar" style="background-color:rgba(4, 3, 70);">
      <div class="col-md-12 p-0 m-0 mt-5">
        <a class="text-white pb-0 mb-0" style="height:1rem;" readonly>
          <p class="fw-bold">OVERVIEW</p>
        </a>
        <a href="index.php" <?php echo ($currentPage == "index") ? 'class="active"' : 'class=""'; ?>>
          <span class="material-symbols-outlined">
          dashboard
          </span>
          <h3>DASHBOARD</h3>
        </a>
        
        <a class="text-white pb-0 mb-0 mt-4" style="height:1rem;" readonly>
          <p class="fw-bold">MANAGEMENT</p>
        </a>
        <a href="learner.php" <?php echo ($currentPage == "learner") ? 'class="active"' : 'class=""'; ?>>
          <span class="material-symbols-outlined">
          local_library
          </span>
          <h3>LEARNER LIST</h3>
        </a>
        <a href="spl.php" <?php echo ($currentPage == "spl") ? 'class="active"' : 'class=""'; ?>>
          <span class="material-symbols-outlined">
          analytics
          </span>
          <h3>SERVICE PARTNER LIST</h3>
        </a>
       
         
        <a class="text-white pb-0 mb-0 mt-4" style="height:1rem;" readonly>
          <p class="fw-bold">SETTINGS AND SECURITY</p>
        </a>
        <a href="reg-user.php" <?php echo ($currentPage == "register") ? 'class="active"' : 'class=""'; ?>>
          <span class="material-symbols-outlined">
          how_to_reg
          </span>
          <h3>REGISTER USER</h3>
        </a>
        <a href="act-logs.php" <?php echo ($currentPage == "act_logs") ? 'class="active"' : 'class=""'; ?>>
          <span class="material-symbols-outlined">
          sprint
          </span>
          <h3>ACTIVITY LOGS</h3>
        </a>
      </div>
    </div>
    <div class="row sidebar pb-3 mt-5" style="background-color:rgba(47, 47, 47);height:auto">
      <div class="col-md-12 p-0 m-0 text-white">
        <a class="text-white pt-4" style="height:1rem;" readonly>
          <p class="fw-bold">Logged in as:</p>
        </a>
        <a class="text-white pt-4" style="height:1rem;" readonly>
          <p class="fw-bold">Administrator</p>
        </a>
      </div>
    </div>
  </div>
</div>
        <!-- End of Sidebar Section -->
        <!-- Main Content -->
<div class="<?= $column_whole_main; ?> main" style="padding-left: 255px;">

  <div class="container border-start border-white d-flex justify-content-end m-0 mw-100 pt-1" style="background-color:rgba(4, 3, 70);width:auto;height:50px;">
    <!--<label class="fs-5 text-white pt-1 pe-2" for=""><//?= $_SESSION['username'];  ?></label>
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
          <a class="dropdown-item text-white text-decoration-none logout" href="setting.php">Settings <i class="fa-solid fa-user-gear"></i></a>
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
  ob_end_flush();
?>