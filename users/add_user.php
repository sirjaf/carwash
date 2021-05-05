<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
if (session_id()=='') {
    session_start();}
    
if (isset($_SESSION['logged_in'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/users/includes/header_page.php';
    echo "
    <div id=\"content-table\">
         <div>
            <br />  
                <a class=\"btn\" href ="."/users/index.php".">Back</a> <br /> <br />
        </div> <br />
    
   
   
   <div class=\"div-forms\"><span>ADD UDER</span><br /><br />
    <form action=\"/users/includes/add_user.inc.php\" method=\"POST\">
        <br />
        <input type=\"text\" name=\"emailuser\" value=\"\" placeholder=\"Email/Username\"><br /><br />
        <input type=\"password\" name=\"pwd\" value=\"\" placeholder=\"Password\"><br /><br />
        <input type=\"password\" name=\"confpwd\" value=\"\" placeholder=\"Confirm Password\"><br /><br />
        <button type=\"submit\" name=\"submit\" class=\"btn\">Register</button>
        <button type=\"button\" name=\"cancel\" class=\"btn\">Cancel</button>
    </form>
    </div><br />
    </div>";
    include $_SERVER['DOCUMENT_ROOT'].'/users/includes/footer_page.php';
}else {
   header("Location: /users/login.php");
}    
?>