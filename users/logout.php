<?php
session_start();
if (isset($_SESSION['logged_in'])){
    $_SESSION['logged_in']=false;
    session_destroy();
    header("Location: https://carwash.jaafarprojects.website/index.php");
}
?>