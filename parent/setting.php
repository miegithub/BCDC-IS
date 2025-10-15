<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="setting";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');



if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    $type = $_SESSION['status_type'];
    echo "
    <div class='modal fade' id='statusModal' tabindex='-1' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content bg-$type'>
                <div class='modal-body text-center'>
                    <h5 class='text-white'>$status</h5>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-transparent border text-white' data-bs-dismiss='modal'>Done</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('statusModal'));
        myModal.show();
    </script>
    ";
    unset($_SESSION['status']);
    unset($_SESSION['status_type']);
}
?>



<!-- 
<style>
</style> -->







<div class="container mw-100 p-3 m-0 bg-white" style="width:100%;height:100vh;">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
      <div class="container card pt-3 mw-100 m-0" style="width:99%;">
        <div class="row">
          <div class="col-md-6">
            <h2>Account Settings</h2>
          </div>
          <div class="col-md-6 text-end">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-12">
            <hr class="text-dark" style="border-bottom: 2px solid black;">
          </div>
        </div>



        <div class="row">
          <div class="col-md-12">



            <div class="container">
              <div class="row mb-2">
                <div class="col-md-6">
                   <form action="setting-process.php" method="post">
                  <div class="container card">
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <label for="" class="fw-bold mb-2">Change your username</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 mb-2">
                        <label for="">To ensure your security, please enter your password before updating your username</label>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-12">
                        <!-- Hidden input for the user ID -->
                        <input type="hidden" name="ID" value="<?= $userID ?>" class="form-control black-border" readonly>
                        <label class="form-label fw-bold">Username</label>
                        <input type="text" name="username" value="" placeholder="Enter your new username" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-12">
                        <label class="form-label fw-bold">Current Password</label>
                        <input type="password" name="current_password" placeholder="Enter your current password" class="form-control black-border" required>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-12 text-end">
                        <button type="submit" name="update_username" class="btn text-white" style="background-color: rgba(4, 3, 70);">Update Username</button>
                      </div>
                    </div>
                  </div>
                </form>
                </div> 







                <div class="col-md-6">
                  <form action="setting-process.php" method="post">
                    
                    <div class="container card">
                      <div class="row mt-2">
                        <div class="col-md-12">
                          <label for="" class="fw-bold mb-2">Change your account password</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12  mb-2">
                          <label for="">To ensure your security, please enter your current password before updating your password</label>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12">
                        <input type="hidden" name="ID" value="<?= $userID ?>" placeholder="" class="form-control black-border" readonly>
                      
                          <label class="form-label fw-bold">Current Password</label>
                          <input type="password" name="current_password" value="" placeholder="Enter your current password" class="form-control black-border" required>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12">
                          <label class="form-label fw-bold">New Password</label>
                          <input type="password" name="new_password" placeholder="Enter your new password" class="form-control black-border" required>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Confirm New Password</label>
                          <input type="password" name="confirm_new_password" placeholder="Confirm new password" class="form-control black-border" required>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12 text-end">
                          <button type="submit" name="update_password" class="btn text-white" style="background-color: rgba(4, 3, 70);">Update Password</button>
                        </div>
                      </div>
                    </div>
                  </form>
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
document.addEventListener('DOMContentLoaded', function() {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  myModal.show();
});
</script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
  <!-- header("Location: setting.php?setting=$userID"); -->