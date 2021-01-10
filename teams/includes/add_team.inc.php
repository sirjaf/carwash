<?php
   
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
        
        $team = mysqli_real_escape_string($conn, $_POST['team']);
        $country = mysqli_real_escape_string($conn, (int)$_POST['country']);
        $team_crest =$_POST['team_crest'];
        //$region = mysqli_real_escape_string($conn, $_POST['region']);
       // $tournament_id = mysqli_real_escape_string($conn, $_POST['tournament']);
        //$tournament = mysqli_real_escape_string($conn, $_POST['tournament']);
        if (empty($team) || empty($country)) {
           echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
            exit();
        } else {
            $sql = "INSERT INTO teams (name,country_id,crest_url) 
                    VALUES (' $team','$country','$team_crest')";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
               echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
            } else {
                echo getMessageSuccess("Record Saved Successfully","Saved");
                //  header("Location: /teams/index.php");
                //  exit();
            } 
        }  
    

?>