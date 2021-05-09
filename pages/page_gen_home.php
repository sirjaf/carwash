<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
    $result1=page_generate_today_dataset_2($conn);
    page_generate_today2($result1,'Today\'s Matches');

?>