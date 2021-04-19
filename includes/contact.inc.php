<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    setlocale(LC_ALL, "en_US.utf8");

      
        $fName = mysqli_real_escape_string($conn,$_POST['fname']);
        $subject = mysqli_real_escape_string($conn,$_POST['subject']);
        $emailFrom = mysqli_real_escape_string($conn,$_POST['email']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);
        $emailTo = "admin@carwash.jaafarprojects.website";
        $headers = "From :" . $emailFrom;
        $txt = "You have received message from ".$fName."\n\n".$message;
       
        if (empty($fName) || empty($emailFrom) || empty($message) || empty( $subject)) {
            echo getMessageWarning("Name, Email and Message must not be empty.","Empty fields");
            //header("Location: ../add_fixture.php?fixture=empty");
            //exit();
        } else {
            
                mail($emailTo,$subject,$txt,$headers);
                echo getMessageSuccess("Record Saved Successfully","Saved");
               
        }  
    
    

?>