<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    $info = mysqli_real_escape_string($conn, $_POST['txtinfo']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    

    if (isset($_POST['submit'])) {
                 
            $sql = "UPDATE information SET info ='". $info ."',title='". $title ."' WHERE id=1";
            $result = mysqli_query($conn,$sql);
            // echo $sql ;
            // exit();
            if (!$result) {
                echo getMessageWarning("Fail to save record.","Failed");
                header("Location: /users/info.php");
                exit();
            } else {
                 header("Location: /users/info.php");
                 exit();
            } 
          
    } else {
        header("Location: /users/info.php");
        exit();
    }
    

?>
