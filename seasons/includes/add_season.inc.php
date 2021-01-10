<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
    // if (isset($_POST['submit'])) {
        
        $sqlExit = "SELECT active from seasons where active=1";
        $resultExits = mysqli_query($conn,$sqlExit);
        $rows_seasons = mysqli_num_rows($resultExits);
        // echo $rows_seasons;
        // echo $_POST['active'];
        //exit();
        if  (($rows_seasons == 1) && ($_POST['active'] == 1))  {
            echo getMessageWarning("An Active Season already exits","Active Season Exists");
            //header("Location: /seasons/add_season.php");
        } else {
            $season = mysqli_real_escape_string($conn, $_POST['season']);
            $snstart = mysqli_real_escape_string($conn,$_POST['snstart']);
            $snsend = mysqli_real_escape_string($conn,$_POST['snsend']);

        if (empty($season)) {
            echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
            //header("Location: /seasons/add_season.php");
        } else {
            $active = empty($_POST['active']) ? '0': '1';
            $sql = "INSERT INTO seasons (name,snstart,snend,active) VALUES ('$season','$snstart','$snend','$active')";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                 echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
                 //header("Location: /seasons/add_season.php");
            } else {
                echo getMessageSuccess("Record Saved Successfully","Saved");
                //header("Location: /seasons/add_season.php");
                //  exit();
            } 
        }
        }
        
         
    // } else {
    //     header("Location: /seasons/add_season.php");
    //     exit();
    // }
    

?>