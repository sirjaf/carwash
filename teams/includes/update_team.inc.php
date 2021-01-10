<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

        setlocale(LC_ALL, "en_US.utf8");
        
        $team = mysqli_real_escape_string($conn, $_POST['team']);
        //$team_crest = mysqli_real_escape_string($conn, $_POST['team_crest']);
        $team_crest = $_POST['team_crest'];
        $country_id = mysqli_real_escape_string($conn, (int)$_POST['country']);
        //$region = mysqli_real_escape_string($conn, $_POST['region']);
        $team_id = mysqli_real_escape_string($conn, (int)$_POST['teamid']);
        //$tournament = mysqli_real_escape_string($conn, $_POST['tournament']);
        if (empty($team) || empty($country_id)) {
          // echo "team=".$team.", tournament=".$country_id;
            // header("Location: ../update_team.php?team=empty");
            // exit();
            echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed".$team." ".$team_crest);
        } else {
            //echo "team=".$team.", tournament=".$tournament_id;
            $sql = "UPDATE teams SET 
                    name='$team',crest_url='$team_crest',country_id=$country_id WHERE id=".$team_id;
            $result = mysqli_query($conn,$sql);
            if (!$result) {
               echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
               //echo getMessageWarning($sql." <br> ".$team_crest,"test error");
            } else {
                echo getMessageSuccess("Record Saved Successfully","Saved");
                //  header("Location: /teams/index.php");
                //  exit();
            } 
        }  

    