<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    $user_email = mysqli_real_escape_string($conn, $_POST['emailuser']);
    $user_hashpwd = mysqli_real_escape_string($conn, password_hash($_POST['pwd'],PASSWORD_BCRYPT));
    $user_confpwd = mysqli_real_escape_string($conn, password_hash($_POST['confpwd'],PASSWORD_BCRYPT));
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    $confpwd = mysqli_real_escape_string($conn,$_POST['confpwd']);

    // if (isset($_POST['submit'])) {
        //include $_SERVER['DOCUMENT_ROOT'].'/users/includes/header_page.php';
        if ((empty($user_email) || empty($user_hashpwd) || empty($user_confpwd)) || ($pwd != $confpwd)) {
            echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
            exit();
            //header("Location: ../add_user.php");
        } else {
            
            $sql = "INSERT INTO users (email,hashpwd) 
                    VALUES ('$user_email','$user_hashpwd')";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                echo getMessageWarning("Fail to save record.Field(s) must not be empty or the record already exists ","Failed");
                exit();
                //header("Location: ../add_user.php");
            } else {
                getMessageSuccess("Successfully Added User","User Added");
                exit();
                //header("Location: /users/index.php");
            } 
        }  
    // } else {
    //     header("Location: ../add_user.php");
    //     exit();
    // }
    

?>
<?php //include $_SERVER['DOCUMENT_ROOT'].'/users/includes/footer_page.php';?>