<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

$sqlSeason = "Select * from seasons where active=1"; 
$resultSeason = mysqli_query($conn,$sqlSeason);

if (mysqli_num_rows($resultSeason)==1) {
    $row=mysqli_fetch_assoc($resultSeason);
    //$season_name = $row['name'];
    $season_id = $row['id'];
    $sql = "SELECT f.id AS fixtures_id,ta.name AS teamA,tb.name AS teamB,
    ta.crest_url AS crest_teamA,tb.crest_url AS crest_teamB,tm.name AS tour_name,
    cn.name AS fix_country,f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price,f.season_id FROM fixtures f 
    INNER JOIN teams ta ON f.teamA_id=ta.id
    INNER JOIN teams tb ON f.teamB_id=tb.id 
    INNER JOIN countries cn ON f.country_id=cn.id
    INNER JOIN tournaments tm ON f.tournament_id=tm.id where f.season_id=$season_id 
    ORDER BY f.fDate DESC" ;

    $result = mysqli_query($conn,$sql);
    $fix_num = mysqli_num_rows($result);

    if ($fix_num > 0) {

        $fix_arr = array();
        //$fix_arr['data'] = array();

        while ($row_fixtures = mysqli_fetch_assoc($result)) {
        
            $fix_item = array (
            'id'=> $row_fixtures['fixtures_id'],
            'name' => $row_fixtures['teamA']." VS ".$row_fixtures['teamB'],
            'tournament' => $row_fixtures['tour_name'],
            'teamA'=> $row_fixtures['teamA'],
            'teamB'=> $row_fixtures['teamB'],
            'crest_teamA' => crest_to_url($row_fixtures['crest_teamA']),
            'crest_teamB' => crest_to_url($row_fixtures['crest_teamB']),
            'country' => $row_fixtures['fix_country'],
            'date' => $row_fixtures['fix_date'],
            'time' => $row_fixtures['fix_time'],
            'price' => $row_fixtures['fix_price']
            );  

            //array_push($fix_arr['data'],$fix_item);
            array_push($fix_arr,$fix_item);
        }
        echo json_encode( $fix_arr);
        
    } else {
        //header("Location: ../add_team.php?team=success");
        //exit();
        //die("Failed to fetch records to Database.");
        echo json_encode(array('message'=>'No  Fixture  Found'));
    }

} else{
   
}


?>