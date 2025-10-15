<?php

session_start();
include('../admin/config/dbcon.php');
$currentPage="setting";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

 


if(isset($_POST['update_username'])){
  $userID = $_SESSION['auth_user']['userID'];
  $username = mysqli_real_escape_string($con, $_POST['username1']);
  $current_password = mysqli_real_escape_string($con, $_POST['current_password']);

  $query_current_pass = "SELECT * FROM user WHERE ID='$userID' and PASSWORD='$current_password'";
  $query_current_pass_run = mysqli_query($con, $query_current_pass);

  if($query_current_pass_run){
    if(mysqli_num_rows($query_current_pass_run) > 0){
      $query_update = "UPDATE `user` SET USERNAME='$username' WHERE ID='$userID' ";
      $query_update_run = mysqli_query($con, $query_update);
      
      //echo '<script>alert("'.$userID.'")</script>';
      if($query_update_run){
        echo '
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="background-color:rgba(56, 174, 89);">
            <div class="modal-body text-center">
              <h5 class="text-white">Username Updated Successfully!</h5>
            </div>
            <div class="modal-footer">
              <a href="setting.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
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
                <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
              </div>
            </div>
          </div>
        </div>';
      }
    }
    else{
      echo '
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-danger" style="">
            <div class="modal-body text-center">
              <h5 class="text-white">Password is incorrect!</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
            </div>
          </div>
        </div>
      </div>';
    }
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
            <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
          </div>
        </div>
      </div>
    </div>';
  }
}

$current_password1=null;
if(isset($_POST['update_password'])){
  $userID = $_SESSION['auth_user']['user_id'];
  $current_password1 = mysqli_real_escape_string($con, $_POST['current_password']);
  $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
  $confirm_new_password = mysqli_real_escape_string($con, $_POST['confirm_new_password']);

  $query_current_pass = "SELECT * FROM user WHERE ID='$userID' and PASSWORD='$current_password1'";
  $query_current_pass_run = mysqli_query($con, $query_current_pass);

  if($query_current_pass_run){
    if(mysqli_num_rows($query_current_pass_run) > 0){

      if($new_password == $confirm_new_password){
        $query_update_password = "UPDATE `user` SET `PASSWORD`='$confirm_new_password' WHERE ID='$userID'";
        $query_update_password_run = mysqli_query($con, $query_update_password);

        if($query_update_password_run){
          echo '
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="background-color:rgba(56, 174, 89);">
                <div class="modal-body text-center">
                  <h5 class="text-white">Password updated Successfully!</h5>
                </div>
                <div class="modal-footer">
                  <a href="setting.php" class="btn btn-secondary text-white border border-white" style="background-color:rgba(56, 174, 89);">Done</a>
                </div>
              </div>
            </div>
          </div>';
        }
      }
      else{
        $current_password1=null;
        echo '
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content bg-danger" style="">
              <div class="modal-body text-center">
                <h5 class="text-white">New password and confirm password is not match!</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
              </div>
            </div>
          </div>
        </div>';
      }

    }
    else{
      
      echo '
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-danger" style="">
            <div class="modal-body text-center">
              <h5 class="text-white">Current Password is incorrect!</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary text-white border border-white bg-danger" data-bs-dismiss="modal" style="">Done</button>
            </div>
          </div>
        </div>
      </div>';
    }
  }
}
?>
<style>
</style>
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
                  <form action="" method="post">
                    <div class="container card">
                      <div class="row mt-2">
                        <div class="col-md-12">
                          <label for="" class="fw-bold mb-2">Change your username</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12  mb-2">
                          <label for="">To ensure your security, please enter your password before updating your username</label>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Username</label>
                          <input type="text" name="username1" value="<?= $username; ?>" placeholder="Enter your preferred username" class="form-control black-border" required>
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
                  <form action="" method="post">
                    
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
                          <label class="form-label fw-bold">Current Password</label>
                          <input type="text" name="current_password" value="<?= $current_password1; ?>" placeholder="Enter your current password" class="form-control black-border" required>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12">
                          <label class="form-label fw-bold">New Password</label>
                          <input type="text" name="new_password" placeholder="Enter your new password" class="form-control black-border" required>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Confirm New Password</label>
                          <input type="text" name="confirm_new_password" placeholder="Confirm new password" class="form-control black-border" required>
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
