<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    $url =$_SERVER['DOCUMENT_ROOT']."/json/tsepl.json";
    echo LeagueTopScorer($url);

?>