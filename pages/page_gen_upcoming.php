<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
    $result1=page_generate_upcoming($conn);
    page_generate3($result1,'Upcoming Matches');
   /*  $result2=page_generation_dataset($conn,'fa cup','England');
    page_generate($result2,'FA CUP') */


?>