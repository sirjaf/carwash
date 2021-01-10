<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    $fix_id=mysqli_real_escape_string($conn,(int)$_POST['fix_id']);
        
    $fix_homepg = (int)$_POST['homepage'];
      
    $sql = "UPDATE fixtures SET homepage={$fix_homepg} WHERE id=".$fix_id;
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        echo getMessageWarning("Fail to save record.Check if the record already exists","Failed");
    } else {
       // echo $sql;
        echo getMessageSuccess("Record Saved Successfully","Saved");
       // echo $sql;
               
    } 
         
?>