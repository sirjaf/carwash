<?php
if (session_id()=='') {
    session_start();}

    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
    if (isset($_SESSION['logged_in'])) {    
        
        $sql = "DELETE FROM seasons where id=". (int)$_POST['id'];
        $result = mysqli_query($conn,$sql);
        echo getMessageDeleted("Season Deleted.","Delete");
        die();
    }else {
        header("Location: /users/login.php");
        die();
    }     
?>