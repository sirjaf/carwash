<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    setlocale(LC_ALL, "en_US.utf8");

        
        $teamA_id = (int)$_POST['teamA'];
        $teamB_id = (int)$_POST['teamB'];
        $tournament_id = (int)$_POST['tournament'];
        $country_id = (int)$_POST['country'];
        $fTime = mysqli_real_escape_string($conn,$_POST['fTime']);
        $fDate = mysqli_real_escape_string($conn,$_POST['fDate']);
        $price = (float)$_POST['price'];
        $homepg = (int)$_POST['homepage'];
        $season_id = (int)$_POST['season_id'];
       
        //$tournament = mysqli_real_escape_string($conn, $_POST['tournament']);
        if (empty($season_id) || empty($teamA_id) || empty($teamB_id) || empty($tournament_id ) || empty($country_id) || empty($fTime) || empty($fDate)) {
            echo getMessageWarning("Country,Tournament,Teams,Time and Date fields must not be empty.","Empty fields");
            //header("Location: ../add_fixture.php?fixture=empty");
            //exit();
        } else {
            $sql = "INSERT INTO fixtures (teamA_id,teamB_id,tournament_id,country_id,fTime,fDate,price,homepage,season_id) 
                    VALUES ('$teamA_id','$teamB_id','$tournament_id','$country_id','$fTime','$fDate','$price','$homepg','$season_id')";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                
                echo getMessageWarning("Fail to save record.Check if the record already exists","Failed");
                //die(" Failed to Add Fixture to Database.");
                //header("Location: ../add_fixture.php");
                //exit();
            } else {
                echo getMessageSuccess("Record Saved Successfully","Saved");
                //header("Location: http://carwash.jaafarprojects.website/fixtures/index.php?fixture=success");
                 //exit();
            } 
        }  
    
    

?>