<?php include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/header_page.php';?>
<?php
//include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
echo "
    <div id=\"content-table\">
    
    <div class=\"div-forms\"><span>Login</span><br /><br />
        <div>
            <form action=\"/users/includes/login.inc.php\" method=\"POST\">
                <div><input type=\"text\" name=\"emailuser\" value=\"\" placeholder=\"Email/Username\"></div><br />
                <div><input type=\"password\" name=\"pwd\" value=\"\" placeholder=\"Password\"></div><br />
                <input type=\"submit\" name=\"submit\" class=\"btn\" value=\"Login\"><br /><br />
            </form>
            </div>
        </div>
    </div>";
?>   
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/footer_page.php';?>
