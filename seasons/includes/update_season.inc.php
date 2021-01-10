<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
        $season = mysqli_real_escape_string($conn, $_POST['season']);
        $season_id = mysqli_real_escape_string($conn, (int)$_POST['season_id']);
        $snstart = mysqli_real_escape_string($conn,$_POST['snstart']);
        $snend = mysqli_real_escape_string($conn,$_POST['snend']);
        $active = (int)$_POST['active'];
        $sqlExit = "SELECT active from seasons where active=1";
        $resultExits = mysqli_query($conn,$sqlExit);
        $rows_seasons = mysqli_num_rows($resultExits);
       
        //echo $rows_seasons." ". $_POST['active'];
        // if (){
        //     echo "it is set";
        // }
        if  (($rows_seasons == 1) && ($active==1))  {
            echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","An Active Season already exists");
            exit();
        } else {

            if (empty($season) || empty($season_id)) {
                 echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
                 exit();
             } else {
                 //echo "team=".$team.", tournament=".$tournament_id;
                //  if (isset($_POST['active'])){
                //      $active='1';
                //  }else{
                //      $active='0';
                //  }
                 $sql = "UPDATE seasons SET 
                         name='$season',
                         snstart='$snstart',
                         snend='$snend',
                         active=$active WHERE id=".$season_id;
                 $result = mysqli_query($conn,$sql);
                 if (!$result) {
                     echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
                     
                 } else {
                         echo getMessageSuccess("Record Saved Successfully","Saved");
                    //   header("Location: /seasons/index.php");
                    //   exit();
                 } 
             }
        }  
   
?>    
