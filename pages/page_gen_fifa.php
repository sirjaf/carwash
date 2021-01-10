<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
   
    $result1=page_generation_dataset($conn,'world cup','fifa');
    page_generate3($result1,'WORLD CUP');

    $result2=page_generation_dataset($conn,'world cup qualifier-africa','fifa');
    page_generate3($result2,'WORLD CUP QUALIFIERS-AFRICA');

    $result3=page_generation_dataset($conn,'world cup qualifier-europe','fifa');
    page_generate3($result3,'WORLD CUP QUALIFIERS-EUROPE');

    $result4=page_generation_dataset($conn,'world cup qualifier-sa','fifa');
    page_generate3($result4,'WORLD CUP QUALIFIERS-SOUTH AMERICA');

    $result5=page_generation_dataset($conn,'International Friendlies','fifa');
    page_generate3($result5,'INTERNATIONAL FRIENDLIES');
    

?>