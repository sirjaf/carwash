<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
if (session_id()=='') {
    session_start();}
    
if (isset($_SESSION['logged_in'])) {
    include_once $_SERVER['DOCUMENT_ROOT'].'/seasons/includes/header_page.php';

        $sql = "SELECT * FROM seasons where id=".(int)$_GET['id'];
        $result = mysqli_query($conn,$sql);
        $row_seasons = mysqli_fetch_assoc($result);
        $season_id = (int)$row_seasons['id'];
        $season_name = mysqli_real_escape_string($conn,$row_seasons['name']);
        $season_start = $row_seasons['snstart'];
        $season_end = $row_seasons['snend'];
        $season_active = ($row_seasons['active']=='1') ? "checked" : "unchecked";
        $url = "/seasons/delete_season.php";
        //$season_active = $row_seasons['active'];
      
        echo "
        <div id=\"content-table\">
         <div>
            <br />
            <a class=\"btn\" href =\"#\" onClick='goBack()'>Back</a>
            <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($season_id,\"{$url}\")'>Delete</a> <br /> <br />
        </div><br /><br />
        <div class=\"div-forms\"><span>UPDATE SEASON</span><br /><br />
        
        <form>
            <input type=\"hidden\" name=\"season_id\" id=\"season_id\" value=\"$season_id\" placeholder=\"Team\"><br />
           
            <input type=\"text\" name=\"season\" id=\"season\" value=\"$season_name\" placeholder=\"Season\"><br /><br />
            <input type='date' name='snstart' id='snstart' value='$season_start' placeholder='Start Date'><br><br />
            <input type='date' name='snend' id='snend' value='$season_end' placeholder='End Date'><br><br />
            <label for='active'>Active Season</label>
            <input type='checkbox' name='active' id='active' value='".$row_seasons['active']."' ".$season_active."><br />
            <br /><button type='button' name='btnAdd' id='buttonUpdate' class=\"btn\" value='Update' onClick='updateRecordSeason()'>Update</button>
            <button type=\"reset\" name=\"cancel\" class=\"btn\">Cancel</button>
        </form>
        </div><br />
        </div>
        ";
        include_once $_SERVER['DOCUMENT_ROOT'].'/seasons/includes/footer_page.php';
}else {
    header("Location: /users/login.php");
    die();
}      
?>
