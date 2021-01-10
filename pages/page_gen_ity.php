<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'Serie A','Italy');
    page_generate3($result1,'SERIE A');

    $result2=page_generation_dataset($conn,'Coppa Italia','Italy');
    page_generate3($result2,'COPPA ITALIA');

    $result3=page_generation_dataset($conn,'super cup italy','Italy');
    page_generate3($result3,'SUPER CUP ITALIA');
    

?>