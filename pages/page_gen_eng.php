<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'Premier League','England');
    page_generate3($result1,'Premier League');

    $result2=page_generation_dataset($conn,'fa cup','England');
    page_generate3($result2,'FA CUP');

    $result3=page_generation_dataset($conn,'carabao cup','England');
    page_generate3($result3,'CARABAO CUP');
    
    $result4=page_generation_dataset($conn,'charity shield','England');
    page_generate3($result4,'CHARITY SHIELD');

?>