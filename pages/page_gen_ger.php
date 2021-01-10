<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'Bundesliga','Germany');
    page_generate3($result1,'BUNDESLIGA');

    $result2=page_generation_dataset($conn,'Pokal Cup','Germany');
    page_generate3($result2,'POKAL CUP');

    $result3=page_generation_dataset($conn,'super cup germany','Germany');
    page_generate3($result3,'SUPER CUP');
    

?>