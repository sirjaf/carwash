<?php include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/header_page.php'?>
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



$url = "/carwash/teams/delete_team.php";



if (isset($_SESSION['logged_in'])) {

    

    $sql = "SELECT teams.id AS team_id,countries.id AS country_id,teams.name AS teams_name,
            countries.name AS country_name, crest_url AS team_crest_url FROM teams 
            INNER JOIN countries ON teams.country_id=countries.id ORDER BY countries.name LIMIT ".$page1.", 10" ;

            

    $msql = "SELECT teams.id AS team_id,countries.id AS country_id,teams.name AS teams_name,countries.name AS country_name 
            FROM teams
            INNER JOIN countries ON teams.country_id=countries.id";

    $result = mysqli_query($conn,$sql);

    //echo $sql;

    if (!$result) {

        die("Failed to Fetch Teams to Database.");

    } else {

        echo "

        <div id =\"info\"></div>

        <div id=\"content-table\">

        <div id=\"div-Add\">

            <br />

            <a href ="."../users/admin.php"." class=\"btn inlineview\">Back</a>

            <a href = \"../teams/add_team.php\" class=\"btn inlineview\">Add Team</a>

            <input type='search' name='search' id='search' class=\"inlineview\" value='' placeholder='Enter Team Name'>

            <button type='button' name='btnsearch' class=\"btn btnsearch inlineview\" onClick='searchTeam()'>Search</button>

        </div><br />

        <div class=\"div-forms\"> 

            <span>TEAMS</span><br /><br />

            

            <table>

                <tr>

                    <th><h4>Name<h4></th>

                    <th><h4>Country/Region<h4></th>

                    <th><h4>Crest<h4></th>

                    <th><h4>Actions<h4></th>

                </tr>  

            ";

        while ($row_teams = mysqli_fetch_assoc($result)) {

            $team_name = $row_teams['teams_name'];

            $country_name = $row_teams['country_name'];

            $team_id = (int)$row_teams['team_id'];

            $team_crest_url = $row_teams['team_crest_url'];



            echo "

                <tr>

                    <td><strong> $team_name </strong></td>

                    <td><strong> $country_name </strong></td>

                    <td> 

                        <div class=\"index-club-crest\">

                            <img id=\"team_crest\" src=\"".check_crest($team_crest_url)." \" alt=\"team_crest\">               

                        </div> 

                    </td>   

                    <td>

                        <a href =". "../teams/show_team.php?id=".(int)$row_teams['team_id'].">Show</a>

                        <a href ="."../teams/update_team.php?id=".(int)$row_teams['team_id'].">Edit</a>

                        <a class=\"delete\" href=\"#\" onClick='deleteConfirm($team_id,\"{$url}\")'>Delete</a>

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

}else {

    //header("Location: /users/login.php");

}       

?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/footer_page.php';?>