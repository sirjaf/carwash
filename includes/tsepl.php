<?php
	$uri = 'http://api.football-data.org/v2/competitions/PL/scorers';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 352e6612f90546368c8e81a8eb633c35';
    $myFile = $_SERVER['DOCUMENT_ROOT']."/json/tsepl.json";
    
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $fp = fopen($myFile, 'w');
    fwrite($fp, $response);
    
?>