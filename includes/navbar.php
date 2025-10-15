<?php 
  
?>

<style>
  .navbar {
    border: none;
    
  backdrop-filter: none; /* Remove the blur effect */
  }
  .row{
    padding-right: 3%;
  }
  .datestring {
    padding-top:18%;
    color:white;
  }
  .navbar{
    height:56px;
  }
  .nav_bar.hide {
    display: none;
}
  .navbar-nav>li:hover {
    
    border-bottom: 2px solid #ffffff;
  }
  .active-navbar {
    content: "";
    left: 0;
    right: 0;
    border-bottom: 2px solid #ffffff;
    background-color: rgba(0, 255, 0, 0.05);
  }

</style>
<?php
$specificDate = date("Y-m-d");
$timestamp = strtotime($specificDate);
$dateString = date('l, F j, Y', $timestamp);

?>
<nav class="navbar navbar-expand-lg fixed-top p-0 mt-2 " style="">
  <div class="container-fluid d-flex justify-content-start">
    <img src="images/logo.png" alt="" class="img-responsive img-fluid me-2" style="height:60px;">
    <?php
      if($currentPage=="index"){
        ?>
        <!--<img src="images/extension_logo.png" alt="" class="img-responsive img-fluid me-2" style="height:60px;"> -->
        <div class="btn rounded-pill pt-2 nav_bar" style="background-color:rgba(249, 211, 33);"><h1 class="text-success text-gradient fs-6 pt-1">Cavite State University - Carmona Campus</h1></div>
        <?php
      }
    ?>
  </div>
</nav>
<script>
  const navEl =document.querySelector('.nav_bar');

window.addEventListener('scroll', () => {
  if(window.scrollY >= 56){
    navEl.classList.add('hide');
  }
  else if(window.scrollY < 56){
    navEl.classList.remove('hide');
  }
});
</script>