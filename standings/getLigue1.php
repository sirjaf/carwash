<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    $url =$_SERVER['DOCUMENT_ROOT']."/json/ligue1.json";
    echo LeagueTable($url);

?>