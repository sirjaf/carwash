<?php include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/header_page.php'?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

if (isset($_GET['page'])) {
    $page = htmlentities($_GET['page']);
}
else {
  $page = 1;
}
if ($page == '' || $page == 1) {
  $page1 = 0;
} else {
  $page1 = ($page*10)-10;
    
}

$url = "/users/delete_user.php";

if (isset($_SESSION['logged_in'])) {
    $sql = "SELECT * FROM users WHERE id !=". (int)$_SESSION['user_id']." ORDER BY email LIMIT ".$page1.", 10" ;
    $msql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);

    if (!$result) {
        die("Failed to Fetch Emails/Users to Database.");
    } else {
        echo " 
        <div id =\"info\"></div>
        <div id=\"content-table\">
        <div>
            <br />
            <a class=\"btn\" href ="."/users/admin.php".">Back</a>
            <a class=\"btn\" href = \"../users/add_user.php\">Add User</a><br /><br />
        </div>
        <div class=\"div-forms\"><span>USERS</span><br /><br />
            <table>
                <tr>
                    <th><h4>Emails/Users<h4></th>
                    <th><h4>Actions<h4></th>
                </tr> 
         
            ";
        while ($row_users = mysqli_fetch_assoc($result)) {
            
            $user_email = $row_users ['email'];
            $user_id = $row_users ['id'];
            
            echo "
            
                <tr>
                    <td><strong> $user_email </strong></td>
                
                    <td>
                        <a class=\"delete\" href=\"#\" onClick='deleteConfirm($user_id,\"{$url}\")'>Delete</a>
                    </td>    
                    
                </tr>
            ";
        }
        echo "
            </table>
            </div>
        </div><br />   
        "; 
        
    } 
     echo create_pagination_links2($conn,$msql,$page)."<br /><br />";
}else {
    //header("Location: /users/login.php");
    
}        
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/footer_page.php';?>