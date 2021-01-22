<?php
if (session_id()=='') {
session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

$_SESSION['logged_in']=false;

if (isset($_POST['submit'])){
        $user_email = mysqli_real_escape_string($conn, $_POST['emailuser']);
        $user_pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $sql = "SELECT * FROM users WHERE email='".$user_email."'";
        $result = mysqli_query($conn,$sql);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            header("Location: /users/login.php");
            $_SESSION['message']="User with that Username/Email does not exist";
            }
        else {
            $user=mysqli_fetch_assoc($result);
            if (password_verify($user_pwd,$user['hashpwd'])) {
                $_SESSION['user_id']=$user['id'];
                $_SESSION['user']=$user['email'];
                $_SESSION['pwd']=$user['hashpwd'];
                $_SESSION['logged_in']=true;
                header("Location: /users/admin.php");
                
            }else{
            header("Location: /users/login.php");
            
            }
        }
    }

    