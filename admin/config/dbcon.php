<?php

    $host = "localhost";

    # IF ONLINE
    #$username = "id22404597_dbcaiwl";
    #$password = "Bryan@2468";
    #$database = "id22404597_dbcaiwl";
    
    # IF LOCALHOST
    $username = "root";
    $password = "";
    $database = "dev";

    $con = mysqli_connect("$host","$username","$password","$database");

    if(!$con){
        header("Location: ../errors/dberror.php");
        die();
    }

?>