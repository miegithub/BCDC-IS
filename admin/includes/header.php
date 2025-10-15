<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="https://i.imgur.com/9btmRSu.png" type="image/png">


  <title>BCDC</title>
    <?php
        
        if($currentPage=="login"){
    ?>
      
        <link rel="stylesheet" href="admin/css/bootstrap.min.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="admin/css/style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="admin/css/dataTables.bootstrap5.css?v=<?php echo time(); ?>">
        <script src="admin/js/all.js?v=<?php echo time(); ?>"></script>
        <script src="admin/js/jquery-3.7.1.js?v=<?php echo time(); ?>"></script>
        <script src="admin/js/bootstrap.bundle.min.js?v=<?php echo time(); ?>"></script>
        <script src="admin/js/dataTables.js?v=<?php echo time(); ?>"></script>
        <script src="admin/js/dataTables.buttons.js?v=<?php echo time(); ?>"></script>
        <script src="admin/js/dataTables.bootstrap5.js?v=<?php echo time(); ?>"></script>
        <link rel="stylesheet" href="admin/css/custom.css?v=<?php echo time(); ?>">
    <?php
        }
        else{
    ?>
            
       <link rel="shortcut icon" href="https://i.imgur.com/9btmRSu.png" type="image/png">


            <link rel="stylesheet" href="../admin/css/bootstrap.min.css?v=<?php echo time(); ?>">
            <link rel="stylesheet" href="../admin/css/style.css?v=<?php echo time(); ?>"><link rel="stylesheet" href="../admin/css/font-awesome.min.css?v=<?php echo time(); ?>">
            <link rel="stylesheet" href="../admin/css/dataTables.bootstrap5.css?v=<?php echo time(); ?>">
            <script src="../admin/js/all.js?v=<?php echo time(); ?>"></script>
            <script src="../admin/js/jquery-3.7.1.js?v=<?php echo time(); ?>"></script>
            <script src="../admin/js/bootstrap.bundle.min.js?v=<?php echo time(); ?>"></script>
            <script src="../admin/js/dataTables.js?v=<?php echo time(); ?>"></script>
            <script src="../admin/js/dataTables.buttons.js?v=<?php echo time(); ?>"></script>
            <script src="../admin/js/dataTables.bootstrap5.js?v=<?php echo time(); ?>"></script>
            <link rel="stylesheet" href="../admin/css/custom.css?v=<?php echo time(); ?>">
    <?php
        }
        
    ?>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/a5979f1047.js" crossorigin="anonymous"></script>
    <!-- https://code.jquery.com/jquery-3.7.1.js
    https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js
    https://cdn.datatables.net/2.1.4/js/dataTables.js
    https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js

    https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css
    https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css  
    -->

</head>
<style>
    
</style><body class="" style="background-image: url('admin/images/Background Photo (Edited).png');color:black;background-position:center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;min-height: 100%;height: 100vh;font-family:'Arimo', sans-serif;padding-right 0;">

<?php
if($currentPage=="login"){

}
else{

    $column_left = "col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-12";
    $column_main = "col-xxl-7 col-xl-7 col-md-7 col-sm-12 col-12";
    $column_right = "col-xxl-3 col-xl-3 col-md-3 col-sm-12 col-12";
    
    
    $column_whole_main = "col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 mt-0";
    $column_hide_right = "d-none";
    ?>
    <div class="container-fluid p-0" style="background-color:white;">
        <div class="row gx-3">
        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-2 col-12 pe-0 ps-0" style="position:fixed;top:0;left:0;width:250px;height: 100vh; overflow-y: auto;scroll; scrollbar-width: none; -ms-overflow-style: none;">
            <?php

}

    

    
