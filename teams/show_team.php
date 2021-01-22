<?php include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/header_page.php'?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';

if (isset($_SESSION['logged_in'])) {

    if (isset($_GET['id'])) {

        //echo "show clicked";

        $sql = "SELECT * FROM teams where id=".(int)$_GET['id'];

        $result = mysqli_query($conn,$sql);

        $row_teams = mysqli_fetch_assoc($result);

        $team_name = $row_teams['name'];

        $team_id = (int)$row_teams['id'];

        $team_crest_url = $row_teams['crest_url'];

        

        $sqlCountry = "SELECT id,name FROM countries ORDER BY id"; 

        $resultCountry = mysqli_query($conn,$sqlCountry);

        $team_country = "";

        

        $url = "/teams/delete_team.php";

        

        while ($row_country = mysqli_fetch_assoc($resultCountry)){

            if ($row_teams['country_id']==$row_country['id']) {

                $team_country = $row_country['name'];

                //$team_tournament;

                break;

            }                
        }

        echo "

        <div id =\"info\"></div>
        <div id=\"content-table\">

                <div>  

                     <br />

                    <a class=\"btn\" href =\"../teams/\">Back</a>

                    <a class=\"btn\" href ="."../teams/update_team.php?id=".(int)$row_teams['id'].">Edit</a>

                    <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($team_id,\"{$url}\")'>Delete</a> <br /> <br />

                </div><br />    

                <div align=\"center\">

                <span>Team</span><br /> <br /> 

        

                <table>

                    <tr>

                        <th><h4>Name<h4></th>

                        <td><strong> $team_name <strong></td>

                    </tr>

                    

                    <tr> 

                        <th><h4>Country<h4></th>

                        <td><strong> $team_country <strong></td> 

                    </tr>   

                    

                    <tr> 

                        <div class=\"club-crest-search\">

                            <th><h4>Team Crest<h4></th>

                            <td>

                                <img id=\"team_crest\" src=\"".check_crest($team_crest_url)."\" alt=\"team_crest\">                            

                            </td>

                        </div> 

                    </tr>   



                </table>    

                </div>                    

            </div><br />

        

        ";

    }

}else {

    //header("Location: /users/login.php");

}    



?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/footer_page.php'?>