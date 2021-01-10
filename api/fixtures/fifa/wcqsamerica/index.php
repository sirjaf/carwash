<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    $result1=page_generation_dataset($conn,'world cup qualifier-sa','fifa');
    $fix_num = mysqli_num_rows($result1);

    if ($fix_num > 0) {

        $fix_arr = array();
        //$fix_arr['data'] = array();

        while ($row_fixtures = mysqli_fetch_assoc($result1)) {
        
            $fix_item = array (
            'id'=> $row_fixtures['fixtures_id'],
            'name' => $row_fixtures['teamA']." VS ".$row_fixtures['teamB'],
            'teamA'=> $row_fixtures['teamA'],
            'teamB'=> $row_fixtures['teamB'],
            'crest_teamA' => $row_fixtures['crest_teamA'],
            'crest_teamB' => $row_fixtures['crest_teamB'],
            'tournament' => $row_fixtures['tour_name'],
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

?>