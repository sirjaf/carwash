<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

if (session_id()=='') {
    session_start();}

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

$url = "/seasons/delete_season.php";

if (isset($_SESSION['logged_in'])) {
    include_once $_SERVER['DOCUMENT_ROOT'].'/seasons/includes/header_page.php';

    $sql = "SELECT * FROM seasons ORDER BY name LIMIT ".$page1.", 10" ;
     $msql = "SELECT * FROM seasons";
    
    $result = mysqli_query($conn,$sql);

        if (!$result) {
            die(getMessageDeleted("Failed to connecte to database","Database Connection Error"));
        } else {
            echo " 
                <div id =\"info\"></div>
                <div id=\"content-table\">
                <div>
                    <br />
                    <a class=\"btn\" href ="."../users/admin.php".">Back</a>
                    <a class=\"btn\" href = \"../seasons/add_season.php\">Add Season</a><br /><br />
                </div> <br />
                
               <div class=\"div-forms\"> <span>SEASONS</span><br /><br />
               
                    <table>
                        <tr>
                            <th><h4>Season<h4></th>
                            <th><h4>Start<h4></th>
                            <th><h4>End<h4></th>
                            <th><h4>Actve<h4></th>
                            <th><h4>Actions<h4></th>
                        </tr> 
                ";
            while ($row_seasons = mysqli_fetch_assoc($result)) {
                $season_id = $row_seasons ['id'];
                $season_name = $row_seasons ['name'];
                $season_start = $row_seasons ['snstart'];
                $season_end = $row_seasons ['snend'];
                $active = $row_seasons['active'] == '1' ? 'Yes' : 'No';
                echo "
                    <tr>
                        <td><strong> $season_name </strong></td>
                        <td><strong>".
                        date("d-M-Y",strtotime($season_start)).
                        "</strong></td>
                        <td><strong>".
                        date("d-M-Y",strtotime($season_end)) .
                         "</strong></td>
                        <td><strong> $active </strong></td>

                        <td>
                        <a href =". "../seasons/show_season.php?id=".$row_seasons['id'].">Show</a>
                        <a href ="."../seasons/update_season.php?id=".$row_seasons['id'].">Edit</a>
                        <a class=\"delete\" href=\"#\" onClick='deleteConfirm($season_id,\"{$url}\")'>Delete</a>
                        </td>    
                        
                    </tr>

                
                ";
            }
            echo "
                </table>
            </div><br />
           </div>
            "; 
             echo create_pagination_links2($conn,$msql,$page)."<br /><br />";
        } 
        include_once $_SERVER['DOCUMENT_ROOT'].'/seasons/includes/footer_page.php';
}else {
  header("Location: /users/login.php");
  die();
}    
        
?>

