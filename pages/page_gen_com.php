<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'copa libertores','conmebol');
    page_generate3($result1,'COPA LIBERTORES');

    $result2=page_generation_dataset($conn,'copa sudoamerica','conmebol');
    page_generate3($result2,'COPA SUDOAMERICA');

    $result3=page_generation_dataset($conn,'copa america','conmebol');
    page_generate3($result3,'COPA AMERICA');

    

?>