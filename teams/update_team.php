<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

if (session_id()=='') {
    session_start();}

    if (isset($_SESSION['logged_in'])) {
        include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/header_page.php';
            setlocale(LC_ALL, "en_US.utf8");

            $sql = "SELECT * FROM teams where id=".(int)$_GET['id'];

            $result = mysqli_query($conn,$sql);

            $row_teams = mysqli_fetch_assoc($result);

            $team_id = (int)$row_teams['id'];

            $team_name = mysqli_real_escape_string($conn,$row_teams['name']);

            $team_crest_url = mysqli_real_escape_string($conn,$row_teams['crest_url']);

            $team_country_id=(int)$row_teams['country_id'];

            //$team_region=$row_teams['region'];

            $sqlCountry = "SELECT id,name FROM countries ORDER BY id"; 

            $resultCountry = mysqli_query($conn,$sqlCountry);

            $tblCountry = "countries";

            $url = "/teams/delete_team.php";

            while ($row_Country = mysqli_fetch_assoc($resultCountry)){

                if ($row_teams['country_id']==$row_Country['id']) {

                    $team_country = $row_Country['name'];
                    break;

                }  
            }

            $selectName="country";

            echo "

            <div id =\"info\"></div>

            <div id=\"content-table\">

                <div>  

                    <br />

                    <a class=\"btn\" href =\"../teams/\"'>Back</a>

                    <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($team_id,\"{$url}\")'>Delete</a> <br /> <br />

                </div><br />  

        

            <span class=\"teamSpan\">Update Team</span><br /> <br /> 



            <div align=\"center\" class=\"form-wrapper\"> 

            <form>".

                "<input type=\"hidden\" name=\"teamid\" id=\"teamid\" value=\"$team_id\" placeholder=\"Team\"><br />".

                populateList($team_country_id,$selectName,$tblCountry)

                ."<br /><br /><input type=\"text\" name=\"team\" id=\"team\" value=\"$team_name\" placeholder=\"Team\"><br />

                <br \><button type='button' name='btnUpdate' id='buttonUpdate' class=\"btn\" value='Update' onClick='updateRecordTeam()'>Update</button>

                <button type=\"reset\" name=\"cancel\" class=\"btn\">Cancel</button>

            </form>



            <div class=\"club-crest-search\">

                <img id=\"team_crest\" src=\"".check_crest($team_crest_url)."\" alt=\"team_crest\"><br /><br />

                <button type='button' name='btnSearchCrest' id='teamCrestSearch' class=\"btn\" onClick='getTeamCrest()'>Search Crest</button>

            </div>



            </div><br />



            </div><br /><br />

            ";

    
            include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/footer_page.php';
    }else {
       header("Location: /users/login.php");

    }      

?>