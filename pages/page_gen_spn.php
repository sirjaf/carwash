<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'La liga','Spain');
    page_generate3($result1,'La Liga');

    $result2=page_generation_dataset($conn,'Copa del rey','Spain');
    page_generate3($result2,'COPA DEL REY');

    $result3=page_generation_dataset($conn,'super copa','Spain');
    page_generate3($result3,'SUPER COPA');
    
?>