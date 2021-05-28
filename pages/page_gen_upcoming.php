<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
    $result1=page_generate_upcoming($conn);
    page_generate3($result1,'Upcoming Matches');
  


?>