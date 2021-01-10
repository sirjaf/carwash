<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';

$team = mysqli_real_escape_string($conn, $_POST['team']);
$base_URL ="http://en.wikipedia.org/api/rest_v1/page/summary/";
$json = file_get_contents($base_URL.$team); 
$data = json_decode($json,true);
//var_dump($json);
//var_dump($data); 
echo ($data["thumbnail"]["source"]);
?>


