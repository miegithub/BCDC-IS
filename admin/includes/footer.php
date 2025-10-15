<?php
include('../admin/config/dbcon.php');
?>
</div>
<!-- End of Main Content -->

    <!-- Right Section -->
<div class="<?= ($hide_side == "True") ? $column_hide_right : $column_right; ?> right-section">
<div class="nav">
        <button id="menu-btn">
            <span class="material-icons-sharp">
                menu
            </span>
        </button>
        <!--
        <div class="dark-mode">
            <span class="material-icons-sharp active">
                light_mode
            </span>
            <span class="material-icons-sharp">
                dark_mode
            </span>
        </div>
        -->
         

</div>

<?php
    if($currentPage=="learning"){
        ?>
        <div class="reminders">
            <div class="header">
                <h2>Draft:</h2>
            </div>
            <?php
                $query = "SELECT * FROM tblcourse WHERE post='0'";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
            ?> 

            <div class="container notification" style="display:block;">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="info">
                            <h5 class="m-0 fw-bold">Course Title:</h5>
                            <h2 class="fw-light"><?= $row['course_title']; ?></h2>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <input type="hidden" name="user_id" value="<?= $row['courseID']; ?>">
                        <?php
                            if($currentPage=="index"){
                                ?>
                                <input type="hidden" name="table_name" value="index">
                                <?php
                            }
                            else if($currentPage=="learner"){
                                
                                ?>
                                <input type="hidden" name="table_name" value="learner">
                                <?php
                            }
                            else if($currentPage=="learning"){
                                
                                ?>
                                <input type="hidden" name="table_name" value="learning">
                                <?php
                            }
                        ?>
                        
                        <a href="edit_course.php?id=<?= $row['courseID'] ?>"  class="btn btn-success bg-gradient w-100 mt-4">Edit</a>
                        
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>

        </div>
        <?php
    }
    else{
        ?>
        <?php
    }

    
    ob_end_flush();
?>
    
    <!-- End of Nav -->
  

    
</div>
    
</div>
<footer class="py-1 bg-light mt-auto height-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; 2024 Biñan Center Development Center | Biñan, Laguna, Philippines</div>
            
        </div>
    </div>
</footer>
<script>
document.addEventListener('DOMContentLoaded', () => {
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

    darkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode-variables');
        darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
        darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
    })
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  myModal.show();
});
</script>
