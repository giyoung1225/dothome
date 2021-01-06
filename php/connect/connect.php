<?php
    $host = "localhost";
    $user = "hgy5710";
    $pw = "rldud5710!";
    $dbName = "hgy5710";
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "database connect false";
    } else {
        //echo "database connect true";
    }
?>