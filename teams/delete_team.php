<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

if (session_id()=='') {
session_start();}
    if (isset($_SESSION['logged_in'])) {    
        $sql = "DELETE FROM teams where id=". (int)$_POST['id'];
        $result = mysqli_query($conn,$sql);
        echo getMessageDeleted("Team Deleted.","Delete");
    }else {
       header("Location: /users/login.php");
    }     
?>