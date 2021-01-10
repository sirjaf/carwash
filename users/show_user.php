<?php include $_SERVER['DOCUMENT_ROOT'].'/users/includes/header_page.php'; ?>

<?php
//include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
if (isset($_SESSION['logged_in'])) {
    
    if (isset($_GET['id'])) {
        echo "show clicked";
        $sql = "SELECT * FROM users where id=". (int)$_GET['id'];
        $result = mysqli_query($conn,$sql);
        $row_users = mysqli_fetch_assoc($result);
        $user_email = $row_users['email'];
        $user_hashpwd = $row_users['hashpwd'];
        echo "
        
       <div id=\"content-table\">
            <div> 
                <br />
                <a href ="."../users/update_user.php?id=".(int)$row_users['id'].">Edit</a>
                <a href ="."../users/delete_user.php?id=".(int)$row_users['id'].">Delete</a><br /><br />
            </div><br />  
        <div id=\"div-forms\">
                <span>User</span>
        
                <table>
                    <tr>
                        <th><h4>Email<h4></th>
                        <td><strong> $user_email <strong></td>
                    </tr>
                    
                    <tr> 
                        <th><h4>Hash Password<h4></th>
                        <td><strong> $user_hashpwd <strong></td> 
                     </tr> 
                     
                </table>    
                                    
            </div>
        </div>
        ";
    }
}else {
  //  header("Location: /users/login.php");
}   
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/fixtures/includes/footer_page.php';?>