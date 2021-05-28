<?php
date_default_timezone_set('Africa/Lagos');
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconn.inc.php';

function populateList($selected, $selectName, $tblName)
{

    $dbServername = "localhost";

    $dbUsername = "u0518487_carwash";

    $dbPassword = "sir982172";

    $dbName = "u0518487_db";


    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    //$conn = getConnection();

    $sql = "SELECT id,name FROM " . $tblName . " ORDER BY name";
    $result = mysqli_query($conn, $sql);

    $List = "<select name=\"$selectName\" id=\"$selectName\">";

    while ($row = mysqli_fetch_assoc($result)) {

        if ($selected == $row['id']) {

            $List = $List . "<option value=" . $row['id'] . " selected>" . $row['name'] . "</option>";
        } else {

            $List = $List . "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
        }
    }

    $List = $List . "</select>";



    return $List;
}



function populateList2($selectName, $tblName)
{

    $dbServername = "localhost";
    $dbUsername = "u0518487_carwash";
    $dbPassword = "sir982172";
    $dbName = "u0518487_db";



    //echo phpinfo();

    //$con = mysql_connect($dbServername, $dbUsername, $dbPassword);

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    //$conn = getConnection();

    $sql = "SELECT id,name FROM " . $tblName . " ORDER BY name";

    $result = mysqli_query($conn, $sql);



    $List = "<select name=\"$selectName\" id=\"$selectName\"><option>Select " . $selectName . "</option>";



    while ($row = mysqli_fetch_assoc($result)) {



        $List = $List . "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
    }

    $List = $List . "</select>";



    return $List;
}



function populateList3($selected, $selectName, $selectsql, $tblName)
{



    $dbServername = "localhost";

    $dbUsername = "u0518487_carwash";

    $dbPassword = "sir982172";

    $dbName = "u0518487_db";



    //echo phpinfo();

    //$con = mysql_connect($dbServername, $dbUsername, $dbPassword);

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



    $sql = "SELECT id,name FROM " . $tblName . " ORDER BY id";



    // echo $selectsql;

    // $conn = getConnection();

    $result = mysqli_query($conn, $selectsql);



    $List = "<select name=\"$selectName\" id=\"$selectName\">";



    while ($row = mysqli_fetch_assoc($result)) {

        if ($selected == $row['id']) {

            $List = $List . "<option value=" . $row['id'] . " selected>" . $row['name'] . "</option>";
        } else {

            $List = $List . "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
        }
    }

    $List = $List . "</select>";



    return $List;
}



function tbl_Id($name, $tblName)
{



    $dbServername = "localhost";

    $dbUsername = "u0518487_carwash";

    $dbPassword = "sir982172";

    $dbName = "u0518487_db";



    //echo phpinfo();

    //$con = mysql_connect($dbServername, $dbUsername, $dbPassword);

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    //$conn = getConnection();

    $sql = "SELECT id,name FROM " . $tblName . " WHERE name=" . $name . " ORDER BY id";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $selected_id = $row['id'];



    return $selected_id;
}



function populateCombo($selected, $selectName, $strSql)
{



    $dbServername = "localhost";

    $dbUsername = "u0518487_carwash";

    $dbPassword = "sir982172";

    $dbName = "u0518487_db";



    //echo phpinfo();

    //$con = mysql_connect($dbServername, $dbUsername, $dbPassword);

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    //$conn = getConnection();

    $sql = $strSql;

    $result = mysqli_query($conn, $sql);



    $List = "<select name=\"$selectName\">";



    while ($row = mysqli_fetch_assoc($result)) {

        if ($selected == $row['id']) {

            $List = $List . "<option value=" . $row['id'] . " selected>" . $row['name'] . "</option>";
        } else {

            $List = $List . "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
        }
    }

    $List = $List . "</select>";



    return $List;
}



function page_generate_today_dataset_2($mconn)
{
    $today = date("Y-m-d");
    $sqlSeason = "Select * from seasons where active=1";
    $resultSeason = mysqli_query($mconn, $sqlSeason);

    if (mysqli_num_rows($resultSeason) == 1) {

        $row = mysqli_fetch_assoc($resultSeason);

        //$season_name = $row['name'];

        $season_id = $row['id'];

        $snstart = $row['snstart'];

        $snend = $row['snend'];



        $sql = "SELECT f.id AS fixtures_id,ta.name AS teamA,ta.crest_url AS crest_teamA,tb.name AS teamB,tb.crest_url AS crest_teamB,tm.name AS tour_name,

                cn.name AS fix_country,f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price FROM fixtures f 

                INNER JOIN teams ta ON f.teamA_id=ta.id 

                INNER JOIN teams tb ON f.teamB_id=tb.id

                INNER JOIN countries cn ON cn.id=f.country_id  

                INNER JOIN tournaments tm ON f.tournament_id=tm.id where f.fdate= '" . $today . "' AND season_id='" . $season_id .

            "' AND f.homepage=1 ORDER BY f.fdate ASC,f.ftime ASC";



        $result = mysqli_query($mconn, $sql);

        //echo $sql;

        return $result;
    }
}



function page_generate_today_dataset($mconn, $mcomp_name, $mcountry_name)
{



    $today = date("Y-m-d");

    $comp_name = $mcomp_name; //name of competion

    $country_name = $mcountry_name;

    $sqlSeason = "Select * from seasons where active=1";

    $resultSeason = mysqli_query($mconn, $sqlSeason);



    if (mysqli_num_rows($resultSeason) == 1) {

        $row = mysqli_fetch_assoc($resultSeason);

        //$season_name = $row['name'];

        $season_id = $row['id'];

        $snstart = $row['snstart'];

        $snend = $row['snend'];



        $sql = "SELECT f.id AS fixtures_id,ta.name AS teamA,tb.name AS teamB,ta.crest_url AS crest_teamA,tb.crest_url AS crest_teamB,tm.name AS tour_name,

                cn.name AS fix_country,f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price FROM fixtures f 

                INNER JOIN teams ta ON f.teamA_id=ta.id 

                INNER JOIN teams tb ON f.teamB_id=tb.id

                INNER JOIN countries cn ON cn.id=f.country_id  

                INNER JOIN tournaments tm ON f.tournament_id=tm.id where tm.name='$mcomp_name' 

                AND cn.name='$mcountry_name' AND f.fdate= '" . $today . "' AND season_id='" . $season_id .

            "' ORDER BY f.fDate ASC,f.ftime ASC";



        $result = mysqli_query($mconn, $sql);

        return $result;
    }
}



function page_generation_dataset($mconn, $mcomp_name, $mcountry_name)
{



    $today = date("Y-m-d");

    $comp_name = $mcomp_name; //name of competion

    $country_name = $mcountry_name;

    $sqlSeason = "Select * from seasons where active=1";

    $resultSeason = mysqli_query($mconn, $sqlSeason);

    if (mysqli_num_rows($resultSeason) == 1) {

        $row = mysqli_fetch_assoc($resultSeason);

        //$season_name = $row['name'];

        $season_id = $row['id'];

        $snstart = $row['snstart'];

        $snend = $row['snend'];



        $sql = "SELECT f.id AS fixtures_id,ta.name AS teamA,tb.name AS teamB,ta.crest_url AS crest_teamA,tb.crest_url AS crest_teamB,tm.name AS tour_name,

                cn.name AS fix_country,f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price FROM fixtures f 

                INNER JOIN teams ta ON f.teamA_id=ta.id 

                INNER JOIN teams tb ON f.teamB_id=tb.id

                INNER JOIN countries cn ON cn.id=f.country_id  

                INNER JOIN tournaments tm ON f.tournament_id=tm.id where tm.name='$mcomp_name' 

                AND cn.name='$mcountry_name' AND (f.fdate between '" . $today . "' AND '$snend') AND season_id='" . $season_id .

            "' ORDER BY f.fDate ASC,f.ftime ASC";



        $result = mysqli_query($mconn, $sql);

        return $result;
    }
}



function page_generate_upcoming($mconn)
{



    $today = date("Y-m-d");

    // $comp_name = $mcomp_name; //name of competion

    // $country_name = $mcountry_name;

    $sqlSeason = "Select * from seasons where active=1";

    $resultSeason = mysqli_query($mconn, $sqlSeason);



    if (mysqli_num_rows($resultSeason) == 1) {



        $row = mysqli_fetch_assoc($resultSeason);

        //$season_name = $row['name'];

        $season_id = $row['id'];

        $snstart = $row['snstart'];

        $snend = $row['snend'];



        $sql = "SELECT f.id AS fixtures_id,ta.name AS teamA,tb.name AS teamB,ta.crest_url AS crest_teamA,tb.crest_url AS crest_teamB,tm.name AS tour_name,

                cn.name AS fix_country,f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price,f.homepage AS hp FROM fixtures f 

                INNER JOIN teams ta ON f.teamA_id=ta.id 

                INNER JOIN teams tb ON f.teamB_id=tb.id

                INNER JOIN countries cn ON cn.id=f.country_id  

                INNER JOIN tournaments tm ON f.tournament_id=tm.id where f.homepage=1 AND season_id='" . $season_id .

            "' AND f.fdate>'" . $today . "' ORDER BY f.fdate ASC,f.ftime ASC";



        $result = mysqli_query($mconn, $sql);

        //echo $sql;

        return $result;
    }
}



function page_generate($mresult, $mcomp_name_title)
{



    if (!$mresult) {

        die("Failed to fetch data from Database.");
    } else {

        //header("Location: ../add_team.php?team=success");

        //exit();



        echo "

            <div class=\"leagues\"> <span>$mcomp_name_title</span>

                <table>

                

                    <tr>

                         <th><strong>Fixture</strong>th>

                         <th><strong>Date</strong>th>

                         <th><strong>Time</strong>th>

                              

                    </tr> 

                   

                ";



        while ($row_fixtures = mysqli_fetch_assoc($mresult)) {

            $date = date_create($row_fixtures['fix_date']);

            $fixture_name = $row_fixtures['teamA'] . " VS " . $row_fixtures['teamB'];

            //$fixture_tournament = $row_fixtures['tour_name'];

            $fixture_date = date_format($date, "d-m-Y");

            // $fixture_date = $row_fixtures['fix_date'];

            $fixture_time = $row_fixtures['fix_time'];

            $fixture_price = $row_fixtures['fix_price'];

            $myDate = date('l, F j, Y', strtotime($fixture_date));

            $myTime = date('h:i A', strtotime($fixture_time));



            echo "

                    <tr>

                        <td>$fixture_name /td>

                        <td>$myDate</td>

                        <td> $myTime </td>

                        

                    </tr>

                ";
        }

        echo "

            </table>

            </div>";
    }
}

function page_generate_today($mresult, $mcomp_name_title)
{



    if (!$mresult) {

        die("Failed to fetch data from Database.");
    } else {

        //header("Location: ../add_team.php?team=success");

        //exit();



        echo "

            <div class=\"leagues\"> <span>$mcomp_name_title</span>

                <table>

                

                    <tr>

                         <th><strong>Fixture</strong></th>

                         <th><strong>Time</strong></th>

                            

                    </tr> 

                   

                ";



        while ($row_fixtures = mysqli_fetch_assoc($mresult)) {

            $date = date_create($row_fixtures['fix_date']);

            $fixture_name = $row_fixtures['teamA'] . " VS " . $row_fixtures['teamB'];

            //$fixture_tournament = $row_fixtures['tour_name'];

            $fixture_date = date_format($date, "d-m-Y");

            // $fixture_date = $row_fixtures['fix_date'];

            $fixture_time = $row_fixtures['fix_time'];

            $fixture_price = $row_fixtures['fix_price'];

            $myTime = date('h:i A', strtotime($fixture_time));





            echo "

                    <tr>

                        <td> $fixture_name </td>

                        <td>$myTime</td>

                        

                    </tr>

                ";
        }

        echo "

            </table>

            </div>";
    }
}

function create_pagination_links($mconn, $msql, $mpage)
{



    $mresult = mysqli_query($mconn, $msql);

    $records = mysqli_num_rows($mresult);

    $page_num = ceil($records / 10);

    $prev = $mpage - 1;

    $next = $mpage + 1;

    if ($page_num >= 2) {

        echo "<ul id = 'pagination'>";

        for ($i = 1; $i <= 10; $i++) {

            $active = $i == $mpage ? 'class="active"' : '';

            echo "<li><a href=index.php?page=" . $i . " " . $active . ">" . $i . "</a></li>";

            if ($i == $page_num) {
                break;
            }
        }
    }

    echo "<ul>";

    //return  "Total pages: ".$page_num.", Prev: ".$prev.", Next: ".$next;

}



function create_pagination_links2($mconn, $msql, $mpage)
{



    $mresult = mysqli_query($mconn, $msql);

    $records = mysqli_num_rows($mresult);

    $page_num = ceil($records / 10);

    $prev = $mpage - 1;

    $next = $mpage + 1;

    if ($page_num >= 2) {

        echo "<div><ul id = 'pagination'>";

        for ($i = 1; $i <= 10; $i++) {

            $active = $i == $mpage ? 'class="active"' : '';

            echo "<li><a href=index.php?page=" . $i . " " . $active . ">" . $i . "</a></li>";

            if ($i == $page_num) {
                break;
            }
        }
    }



    if ($page_num > 10) {

        echo "<select name='select_page' class=\"cpagination\" onChange='gotoPage(this.value)'>

            <option disabled selected>Select Page</option>";

        for ($i = 11; $i <= $page_num; $i++) {

            echo "<option value=\"index.php?page=$i.\">" . $i . "</a></option>";
        }

        echo "</select>

    </ul>

    

    </div>";
    }

    //return  "Total pages: ".$page_num.", Prev: ".$prev.", Next: ".$next;

}



function getMessageWarning($mMessage, $mTitle)
{



    echo "<br /><span class=\"titlewarning\">$mTitle</span>

    <div id=\"messagewarning\" align=\"center\">

          <p>$mMessage</p>

          

        </div><br />";
}



function getMessageSuccess($mMessage, $mTitle)
{



    echo "<br /><span class=\"titlesuccess\">$mTitle</span>

    <div id=\"messagesuccess\" align=\"center\">

          <p>$mMessage</p>

          

        </div><br />";
}



function getMessageDeleted($mMessage, $mTitle)
{



    echo "<br /><span class=\"titledelete\">$mTitle</span>

    <div id=\"messagedeleted\" align=\"center\">

          <p>$mMessage</p>

          

        </div><br />";
}



function getMessage($mMessage, $mTitle)
{



    echo "<br /><div id=\"message\" align=\"center\">

          <span><h2>$mTitle</h2></span>

          <p>$mMessage</p>

        </div><br />";
}



function getInformation($mconn)
{

    $sql = "SELECT info,title FROM information WHERE id=1";

    $result = mysqli_query($mconn, $sql);

    $row = mysqli_fetch_assoc($result);

    $info = $row['info'];

    $title = $row['title'];

    echo "<b>" . $title . "</b><br /><br />" . $info . "<br /><br />";
}



function LeagueTable($mJsonUri)
{



    $strTable = "";

    //$myFile = $_SERVER['DOCUMENT_ROOT']."/json/data.json";



    $response = file_get_contents($mJsonUri);

    $matches = json_decode($response, true);

    $table = $matches["standings"][0]["table"];

    if (!empty($table)) {

        foreach ($table as $team) {

            $strTable = $strTable . "<div class=\"team-standing\">

                                <div class=\"team-position\">" . $team["position"] . "</div>

                                <div class=\"team-name\">" . $team["team"]["name"] . "</div>

                                <div class=\"team-points\">" . $team["points"] . "</div>

                            </div>";
        }

        return $strTable;
    }
}



function LeagueTopScorer($tsJsonUrl)
{

    $strTable = "";

    $response = file_get_contents($tsJsonUrl);

    $scorers = json_decode($response, true);

    $table = $scorers["scorers"];

    if (!empty($table)) {

        foreach ($table as $scorer) {

            $strTable = $strTable . "<div class=\"top-scorer\">
    
                                        <div class=\"ts-name\">" . $scorer["player"]["name"] . "</div>
    
                                        <div class=\"ts-goals\">" . $scorer["numberOfGoals"] . "</div>
    
                                     </div>";
        }

        return $strTable;
    }
}


function page_generate2($mresult, $mcomp_name_title)
{



    if (!$mresult) {

        die("Failed to fetch data from Database.");
    } else {

        //header("Location: ../add_team.php?team=success");

        //exit();



        echo "

            <div class=\"leagues\"> <h4><span>$mcomp_name_title</span></h4>";



        while ($row_fixtures = mysqli_fetch_assoc($mresult)) {

            $date = date_create($row_fixtures['fix_date']);

            $fixture_name = $row_fixtures['teamA'] . " VS " . $row_fixtures['teamB'];

            $fixture_teamA = $row_fixtures['teamA'];

            $fixture_teamB = $row_fixtures['teamB'];

            $fixture_tournament = $row_fixtures['tour_name'];

            $fixture_date = date_format($date, "d-m-Y");

            // $fixture_date = $row_fixtures['fix_date'];

            $fixture_time = $row_fixtures['fix_time'];

            $fixture_price = $row_fixtures['fix_price'];

            $myDate = date('l, F j, Y', strtotime($fixture_date));

            $myTime = date('h:i A', strtotime($fixture_time));



            echo "

                    <div class='myfixture'>

                                            <div class='fixflexA'> $fixture_teamA </div>

                        

                        <div class='fixflexDate'>

                            

                             <div><strong> $fixture_tournament</strong></div>

                             <div><strong>$myDate</strong></div>

                             <div><strong>$myTime </strong></div>

                            

                        </div>

                        <div class='fixflexB'>$fixture_teamB</div>

                        

                    </div><br /><br />

                ";
        }

        echo "

            </div><br /><br />";
    }
}





function page_generate_today2($mresult, $mcomp_name_title)
{



    $rowcount = mysqli_num_rows($mresult);



    if (!$mresult) {

        die("Failed to fetch data from Database.");
        exit();
    }


    echo "

            <div class=\"leagues\"> <h1><span>$mcomp_name_title</span></h1>

                ";



    while ($row_fixtures = mysqli_fetch_assoc($mresult)) {

        $date = date_create($row_fixtures['fix_date']);

        $fixture_name = $row_fixtures['teamA'] . " VS " . $row_fixtures['teamB'];

        $fixture_teamA = $row_fixtures['teamA'];

        $fixture_teamB = $row_fixtures['teamB'];

        $fixture_crest_teamA = $row_fixtures['crest_teamA'];

        $fixture_crest_teamB = $row_fixtures['crest_teamB'];



        $fixture_tournament = $row_fixtures['tour_name'];

        $fixture_date = date_format($date, "d-m-Y");

        // $fixture_date = $row_fixtures['fix_date'];

        $fixture_time = $row_fixtures['fix_time'];

        $fixture_price = $row_fixtures['fix_price'];

        $myTime = date('h:i A', strtotime($fixture_time));





        echo "

                    <div class='myfixture'>

                        <div class='fixflexA'> 



                            <div class=\"index-club-crest\">

                                <img loading='lazy' src=\"" . check_crest($fixture_crest_teamA) . " \" alt=\"team_crest\" height=\"50\" width=\"50\">               

                            </div>

                            <strong>$fixture_teamA</strong> 

                            

                        </div>

                        

                        <div class='fixflexDate'>

                        

                            <div>$fixture_tournament</div>

                            <div><strong>$myTime </strong></div>

                             

                        </div>

                        

                        <div class='fixflexB'>

                            <div class=\"index-club-crest\">

                                <img loading='lazy' src=\"" . check_crest($fixture_crest_teamB) . " \" alt=\"team_crest\" height=\"50\" width=\"50\">               

                            </div>

                            <strong>$fixture_teamB</strong>

                           

                        </div>

                        

                    </div><br /><br />

                ";
    }

    echo "

            </div><br />";



    if ($rowcount == 0) {

        echo "<div>No Fixture(s) for Today</div><br /><br />";
    }
}





function page_generate3($mresult, $mcomp_name_title)
{



    $rowcount = mysqli_num_rows($mresult);



    if (!$mresult) {

        die("Failed to fetch data from Database.");
    }



    //header("Location: ../add_team.php?team=success");

    //exit();

    $myDateTracker = "";

    echo "

            <div class=\"leagues\"> <h1><span>$mcomp_name_title</span></h1><br />";



    while ($row_fixtures = mysqli_fetch_assoc($mresult)) {

        $date = date_create($row_fixtures['fix_date']);

        $fixture_name = $row_fixtures['teamA'] . " VS " . $row_fixtures['teamB'];

        $fixture_teamA = $row_fixtures['teamA'];

        $fixture_teamB = $row_fixtures['teamB'];

        $fixture_crest_teamA = $row_fixtures['crest_teamA'];

        $fixture_crest_teamB = $row_fixtures['crest_teamB'];



        $fixture_tournament = $row_fixtures['tour_name'];

        $fixture_date = date_format($date, "d-m-Y");

        // $fixture_date = $row_fixtures['fix_date'];

        $fixture_time = $row_fixtures['fix_time'];

        $fixture_price = $row_fixtures['fix_price'];

        $myDate = date('l, F j, Y', strtotime($fixture_date));

        $myTime = date('h:i A', strtotime($fixture_time));



        if ($myDateTracker != $myDate) {

            $myDateTracker = $myDate;

            echo "<h2><span class=\"myspan\">{$myDate}</span></h2><br /><br />";
        }



        echo "

                    <div class='myfixture'>

                        <div class='fixflexA'> 



                            <div class=\"index-club-crest\">

                                <img src=\"" . check_crest($fixture_crest_teamA) . " \" alt=\"team_crest\" height=\"50\" width=\"50\">               

                            </div>

                            <strong>$fixture_teamA</strong> 

                            

                        </div>

                        

                        <div class='fixflexDate'>

                        

                            <div>$fixture_tournament</div>

                            <div><strong>$myTime </strong></div>

                             

                        </div>

                        

                        <div class='fixflexB'>

                            <div class=\"index-club-crest\">

                                <img src=\"" . check_crest($fixture_crest_teamB) . " \" alt=\"team_crest\" height=\"50\" width=\"50\">               

                            </div>

                            <strong>$fixture_teamB</strong>

                           

                        </div>

                        

                    </div><br /><br />

                ";
    }

    echo "

            </div>";



    if ($rowcount == 0) {

        echo "<div>No Upcoming Fixture(s)</div><br /><br />";
    }
}



function check_crest($strCrest)
{



    if (empty($strCrest)) {

        $str = "https://carwash.jaafarprojects.website/images/football-club.png";

        return "/images/football-club.png";
    }

    return $strCrest;
}



function crest_to_url($strCrest)
{



    if ($strCrest == "/images/football-club.png") {

        return "https://carwash.jaafarprojects.website/images/football-club.png";
    }

    return $strCrest;
}

function SendMessage()
{
}
