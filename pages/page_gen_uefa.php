<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'uefa champions league','uefa');
    page_generate3($result1,'UEFA CHAMPIONS LEAGUE');

    $result2=page_generation_dataset($conn,'uefa europa league','uefa');
    page_generate3($result2,'UEFA EUROPA LEAGUE');

    $result3=page_generation_dataset($conn,'uefa super Cup','uefa');
    page_generate3($result3,'UEFA SUPER CUP');

    $result4=page_generation_dataset($conn,'european nations Cup','uefa');
    page_generate3($result4,'EUROPEAN NATIONS CUP');

    $result5=page_generation_dataset($conn,'european nation cup qualifiers','uefa');
    page_generate3($result5,'EUROPEAN NATIONS CUP QUALIFIERS');
    
     $result6=page_generation_dataset($conn,'european nations league','uefa');
     //echo $mysqli_num_rows($result6);
    page_generate3($result6,'EUROPEAN NATIONS LEAGUE');
    

?>