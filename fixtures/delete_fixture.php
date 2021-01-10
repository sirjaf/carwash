<?php
if (session_id()=='') {
session_start();}
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    if (isset($_SESSION['logged_in'])) { 
        
        $fixture_id = (int)$_POST['id'];
        //if (isset($_GET['id'])) {
        $sql = "DELETE FROM fixtures where id=".$fixture_id;
        $result = mysqli_query($conn,$sql);
        echo getMessageDeleted("Fixture Deleted.","Delete");
            //header("Location: /fixtures/index.php");
       // }  
    }else {
         //echo "logged out";
        header("Location: /users/login.php");
    }     
?>