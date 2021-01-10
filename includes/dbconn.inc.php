<?php
    GLOBAL $conn;
    $dbServername = "localhost";
    $dbUsername = "u0518487_carwash";
    $dbPassword = "sir982172";
    $dbName = "u0518487_db";
    
    //echo phpinfo();
    //$con = mysql_connect($dbServername, $dbUsername, $dbPassword);
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    
    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno . ")");
    //echo "Connection to Database was not established";

    } else {
        
        //echo "Connection to Database was established";
        
    }
?>