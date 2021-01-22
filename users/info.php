<?php include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/header_page.php'?>

<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';



$url = "/users/delete_user.php";



if (isset($_SESSION['logged_in'])) {

    $sql = "SELECT * FROM information where id=1";

    $result = mysqli_query($conn,$sql);

    $row_info = mysqli_fetch_assoc($result);

    $info = $row_info ['info'];

    $title = $row_info ['title'];



    if (!$result) {

        die("Failed to Fetch Emails/Users to Database.");

    } else {

        echo " 

        <div id=\"content-table\">

            <div>
                <br />
                <a class=\"btn\" href ="."/users/admin.php".">Back</a>
            </div>

            

            <div class=\"div-forms\"><span>INFORMATION</span><br /><br />



                    <form action=\"/users/includes/info.inc.php\" id=\"info\" name=\"forminfo\" method=\"POST\">

                        <input type='text' name='title' id='title' value='$title' placeholder='Title'><br /><br />

                        <textarea row=\"4\" col=\"50\"  name=\"txtinfo\">$info</textarea><br /> <br />

                        <br />

                        <button type=\"submit\" name=\"submit\" class=\"btn\">Update</button>

                        <button type=\"button\" name=\"cancel\" class=\"btn\">Clear</button>

                        

                    </form><br /> <br />

            </div>

        </div><br />   

        "; 
    }   

}else {

    //header("Location: /users/login.php");   
}        

?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/footer_page.php';?>