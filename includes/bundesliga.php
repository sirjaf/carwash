<?php
	$uri = 'http://api.football-data.org/v2/competitions/BL1/standings';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 352e6612f90546368c8e81a8eb633c35';
    $myFile = $_SERVER['DOCUMENT_ROOT']."/json/bundesliga.json";
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $fp = fopen($myFile, 'w');
    fwrite($fp, $response);
    // $matches = json_decode($response,true);
    // $table=$matches["standings"][0]["table"];
    
    //  foreach($table as $team)
    //     {
    //      echo "<h6>".$team["position"]." - ".$team["team"]["name"]."</h6>";
    //     }
    
    
?>