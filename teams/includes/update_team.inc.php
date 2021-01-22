<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

        setlocale(LC_ALL, "en_US.utf8");

        $team = mysqli_real_escape_string($conn, $_POST['team']);
        $team_crest = $_POST['team_crest'];
        $country_id = mysqli_real_escape_string($conn, (int)$_POST['country']);
        $team_id = mysqli_real_escape_string($conn, (int)$_POST['teamid']);

        if (empty($team) || empty($country_id)) {

            echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed".$team." ".$team_crest);

        } else {

            $sql = "UPDATE teams SET 
                    name='$team',crest_url='$team_crest',country_id=$country_id WHERE id=".$team_id;

            $result = mysqli_query($conn,$sql);

            if (!$result) {

               echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");

            } else {

                echo getMessageSuccess("Record Saved Successfully","Saved");

            } 

        }  



    