<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'caf champions league','caf');
    page_generate3($result1,'CAF CHAMPIONS LEAGUE');

    $result2=page_generation_dataset($conn,'caf confederation cup','caf');
    page_generate3($result2,'CAF CUP');

    $result3=page_generation_dataset($conn,'caf super Cup','caf');
    page_generate3($result3,'CAF SUPER CUP');

    $result4=page_generation_dataset($conn,'caf nations Cup','caf');
    page_generate3($result4,'CAF NATIONS CUP');

    $result5=page_generation_dataset($conn,'caf nations cup qualifiers','caf');
    page_generate3($result5,'CAF NATIONS CUP QUALIFIERS');
    mysqli_close($conn);

?>