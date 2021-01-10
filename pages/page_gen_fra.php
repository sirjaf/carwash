<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'Ligue 1','France');
    page_generate3($result1,'LIGUE 1');

    $result2=page_generation_dataset($conn,'coupe de france','France');
    page_generate3($result2,'COUPE DE FRANCE');

    $result3=page_generation_dataset($conn,'super cup france','France');
    page_generate3($result3,'SUPER CUP');
    

?>