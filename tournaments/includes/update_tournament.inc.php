<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
   
        $tourn_id=mysqli_real_escape_string($conn, (int)$_POST['tourn_id']);
        $tourn = mysqli_real_escape_string($conn, $_POST['tournament']);
        $country_id = mysqli_real_escape_string($conn, (int)$_POST['country']);
        
        if (empty($tourn) || empty($country_id)) {
           echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
            exit();
        } else {
            $sql = "UPDATE tournaments SET name='{$tourn}',country_id=".$country_id 
                    ." WHERE id=".$tourn_id;
            $result = mysqli_query($conn,$sql);
            if (!$result) {
               echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
                
            } else {
                echo getMessageSuccess("Record Saved Successfully","Saved");
                //  header("Location: /tournaments/index.php");
                //  exit();
            } 
        }  
?>  