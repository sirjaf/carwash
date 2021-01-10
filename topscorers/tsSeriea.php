<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    $url =$_SERVER['DOCUMENT_ROOT']."/json/tsseriea.json";
    echo LeagueTopScorer($url);

?>