<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconn.inc.php';
if (session_id() == '') {
    session_start();
}
if (isset($_GET['page'])) {

    $page = htmlentities($_GET['page']);
} else {

    $page = 1;
}

if ($page == '' || $page == 1) {

    $page1 = 0;
} else {

    $page1 = ($page * 10) - 10;
}

$url = "/fixtures/delete_fixture.php";

if (isset($_SESSION['logged_in'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/fixtures/includes/header_page.php';

    $sqlSeason = "Select * from seasons where active=1";

    $resultSeason = mysqli_query($conn, $sqlSeason);

    if (mysqli_num_rows($resultSeason) == 1) {

        $row = mysqli_fetch_assoc($resultSeason);
        $season_id = $row['id'];

        $sql = "SELECT f.id AS fixtures_id,ta.name AS teamA,tb.name AS teamB,tm.name AS tour_name,
        cn.name AS fix_country,f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price,f.homepage AS fix_hp,f.season_id FROM fixtures f 
        INNER JOIN teams ta ON f.teamA_id=ta.id
        INNER JOIN teams tb ON f.teamB_id=tb.id 
        INNER JOIN countries cn ON f.country_id=cn.id
        INNER JOIN tournaments tm ON f.tournament_id=tm.id where f.season_id=$season_id 
        ORDER BY f.fDate DESC LIMIT " . $page1 . ", 10";

        $msql = "SELECT f.id AS fixtures_id,ta.name AS teamA,tb.name AS teamB,tm.name AS tour_name,
        cn.name AS fix_country,f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price,f.season_id FROM fixtures f
        INNER JOIN teams ta ON f.teamA_id=ta.id
        INNER JOIN teams tb ON f.teamB_id=tb.id
        INNER JOIN countries cn ON f.country_id=cn.id
        INNER JOIN tournaments tm ON f.tournament_id=tm.id where f.season_id=" . $season_id;

        $result = mysqli_query($conn, $sql);

        if (!$result) {

            echo $sql;
            die(getMessageDeleted("Failed to connecte to database","Database Connection Error"));
        } else {


            echo "

        <div id =\"info\"></div>

        <div id=\"content-table\">

        <div id=\"div-Add\">

            <br />

                <a href =\"/users/admin.php\" class=\"btn inlineview\" >Back</a>

                <a href = \"/fixtures/add_fixture.php\" class=\"btn inlineview\">Add Fixture</a>

                <input type='search' name='search' id='search' class=\"inlineview\" value='' placeholder='Enter Team Name'>

                <button type='button' name='btnsearch' class=\"btn btnsearch inlineview\" onClick='searchFixture()'>Search</button>



        </div><br />

       <div class=\"div-forms\"> <span>FIXTURES</span><br /><br />

            <table>

                <tr>

                    <th><h4>Home Team</h4></th>

                    <th><h4></h4></th>

                    <th><h4>Away Team</h4></th>

                    <th><h4>Tournament</h4></th>

                    <th><h4>Country/Region</h4></th>

                    <th><h4>Date</h4></th>

                    <th><h4>Time</h4></th>

                    <th><h4>Home Page</h4></th>

                    <th><h4>Actions</h4></th>

                </tr>  

            ";

            while ($row_fixtures = mysqli_fetch_assoc($result)) {

                $fixture_teamA = $row_fixtures['teamA'];

                $fixture_teamB = $row_fixtures['teamB'];

                $fixture_name = " VS ";

                //$fixture_name = $row_fixtures['teamA']." VS ".$row_fixtures['teamB'];

                $fixture_tournament = $row_fixtures['tour_name'];

                $fixture_country = $row_fixtures['fix_country'];

                $fixture_date = $row_fixtures['fix_date'];

                $fixture_time = $row_fixtures['fix_time'];

                $fixture_hp = (int)$row_fixtures['fix_hp'];

                $fixture_id = (int)$row_fixtures['fixtures_id'];



                echo "

                <tr>

                    <td><strong>$fixture_teamA</strong></td>

                    <td><strong>$fixture_name</strong></td>

                    <td><strong>$fixture_teamB</strong></td>

                    <td><strong>$fixture_tournament</strong></td>

                    <td><strong>$fixture_country</strong></td>

                    <td><strong>$fixture_date</strong></td>

                    <td><strong>$fixture_time</strong></td>

                  <td><input type='checkbox' name='homepage{$fixture_id}' id='homepage{$fixture_id}' onclick='updateRecordHomepg($fixture_id)' ";

                echo ($fixture_hp == 1 ? 'checked' : '') . "></td>";

                echo "<td>

                        <a href =" . "/fixtures/show_fixture.php?id=" . (int)$row_fixtures['fixtures_id'] . ">Show</a>

                        <a href=\"#\" onClick='deleteConfirm($fixture_id,\"{$url}\")' class=\"delete\">Delete</a>

                    </td>    

                    

                </tr>

            ";
            }

            echo "

        </table>

        </div> <br />

        </div>

        ";



            echo create_pagination_links2($conn, $msql, $page) . "<br /><br />";
        }
    } else {

        getMessageDeleted("Season not set or selected","Season Select Error");
    }
    include $_SERVER['DOCUMENT_ROOT'] . '/fixtures/includes/footer_page.php';
} else {
    header("Location: /users/login.php");
    die;
}

?>


