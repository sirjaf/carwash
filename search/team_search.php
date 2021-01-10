<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

$url = "/teamss/delete_team.php";

$search = trim(mysqli_real_escape_string($conn,$_POST['search']));
if (empty($search)) {
    echo getMessageWarning("Search fields must not be empty.","Empty fields");
    //header("Location: ../add_fixture.php?fixture=empty");
    //exit();
} else {
      $sql = "SELECT teams.id AS team_id,countries.id AS country_id,teams.name AS teams_name,countries.name AS country_name FROM teams
              INNER JOIN countries ON teams.country_id=countries.id where trim(teams.name) LIKE '%".$search."%' ORDER BY teams.name ASC";
      $result = mysqli_query($conn,$sql);
      if ((!$result) OR (mysqli_num_rows($result)==0)) {
       // echo $sql;
          echo getMessageWarning("Can't Fetch Search Result Or No Result Found.","No Result");
          //echo "<div class=\"searchResult\">Can't Fetch Search Result Or No Result Found.</div>";
          //die("No Result Found.");
      } else {

        echo "
            <span>TEAMS</span>
            <table>
                <tr>
                    <th><h4>Name<h4></th>
                    <th><h4>Country/Region<h4></th>
                    <th><h4>Actions<h4></th>
                </tr>
            ";
        while ($row_teams = mysqli_fetch_assoc($result)) {
            $team_name = $row_teams['teams_name'];
            $country_name = $row_teams['country_name'];
            $team_id = (int)$row_teams['team_id'];

            echo "
                <tr>
                <td><strong> $team_name </strong></td>
                <td><strong> $country_name </strong></td>
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
        ";
          //echo create_pagination_links2($conn,$msql,$page)."<br /><br />";
      }
  }
?>
