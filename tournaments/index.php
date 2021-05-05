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

$url = "/tournaments/delete_tournament.php";

    if (isset($_SESSION['logged_in'])) {
        include_once $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/header_page.php';
    $sql = "SELECT tournaments.id AS tournament_id,countries.id AS country_id,
         tournaments.name AS tournament_name,countries.name AS country_name FROM tournaments 
        INNER JOIN countries ON tournaments.country_id = countries.id ORDER BY countries.name LIMIT ".$page1.", 10" ;

    $msql = "SELECT tournaments.id AS tournament_id,countries.id AS country_id,
         tournaments.name AS tournament_name,countries.name AS country_name FROM tournaments
        INNER JOIN countries ON tournaments.country_id = countries.id";
        $result = mysqli_query($conn,$sql);

        if (!$result) {
            die("Failed to fetch data from Database.");
        } else {
                
            echo " 
            <div id =\"info\"></div>
            <div id=\"content-table\">
                <div>
                    <br />
                    <a class=\"btn\" href ="."../users/admin.php".">Back</a>
                    <a class=\"btn\" href = \"../tournaments/add_tournament.php\">Add Tournament</a> <br /> <br />
                
                </div><br />
               
                <div class=\"div-forms\">
                 <span>Tournaments</span><br /><br />
                    <table>
                        <tr>
                            <th><h4>Name<h4></th>
                            <th><h4>Country/Region<h4></th>
                            <th><h4>Actions<h4></th>
                        </tr> 
                ";
            while ($row_tournaments = mysqli_fetch_assoc($result)) {
                
                $tournament_name = $row_tournaments['tournament_name'];
                $tournament_country_name = $row_tournaments['country_name'];
                $tournament_id = $row_tournaments['tournament_id'];

                echo "
            
                    <tr>
                        <td><strong> $tournament_name </strong></td>
                        <td><strong> $tournament_country_name </strong></td>
                        
                            <td>
                                <a href =". "../tournaments/show_tournament.php?id=".(int)$row_tournaments['tournament_id'].">Show</a>
                                <a href ="."../tournaments/update_tournament.php?id=".(int)$row_tournaments['tournament_id'].">Edit</a>
                                <a class=\"delete\" href=\"#\" onClick='deleteConfirm($tournament_id,\"{$url}\")'>Delete</a>
                            </td>    
                    </tr>
                ";
            }
            echo "
                </table>
                </div>
            </div>
            <br />
            ";
        }
            echo create_pagination_links2($conn,$msql,$page)."<br /><br />";
            include_once $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/footer_page.php';
    }else {
       header("Location: /users/login.php");
    }
        
?>
