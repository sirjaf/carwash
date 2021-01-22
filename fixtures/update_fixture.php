<?php include_once $_SERVER['DOCUMENT_ROOT'].'/fixtures/includes/header_page.php'?>
<?php
if (session_id()=='') {
session_start();}

include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    
    if (isset($_SESSION['logged_in'])) {    
        if (isset($_GET['id'])) {
           // echo "show clicked";
            $sql = "SELECT * FROM fixtures where id=". (int)$_GET['id'];
            $result = mysqli_query($conn,$sql);
            $row_fix = mysqli_fetch_assoc($result);
            $fix_id =  (int)$row_fix['id'];
            $fix_teamA_id = (int)$row_fix['teamA_id'];
            $fix_teamB_id = (int)$row_fix['teamB_id'];
            $fix_tournament_id = (int)$row_fix['tournament_id'];
            $fix_fTime = mysqli_real_escape_string($conn,$row_fix['fTime']);
            $fix_fDate =mysqli_real_escape_string($conn,$row_fix['fDate']);
            $fix_price = (float)$row_fix['price'];
            $fix_country_id = (int)$row_fix['country_id'];
            $fix_homepg = (int)$row_fix['homepage'];
            //$tourn_season_id=$row_tourn['season_id'];
            $sqlSeason = "SELECT id,name FROM seasons ORDER BY id"; 
            $resultSeason = mysqli_query($conn, $sqlSeason);
            $tblTeam ="team";
            $tblTourn ="tournament";
            $url = "/fixtures/delete_fixture.php";
            $sqlTournament = "SELECT id,name FROM tournaments WHERE country_id=".$fix_country_id." ORDER BY name";
            
            $sqlTeam = "SELECT id,name FROM teams WHERE country_id=".$fix_country_id." ORDER BY id";
            
            echo "
           
            <div id=\"content-table\">
             <div id =\"info\"></div><br />
            
                <div>  
                    <br />
                    <a class=\"btn\" href =\"#\" onClick='goBack()'>Back</a>
                    <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($fix_id,\"{$url}\")'>Delete</a> <br /> <br />
                </div><br />  
            
            <div class=\"div-forms\">
            <span>Update Fixture</span>
            
            <form>
                <input type=\"hidden\" id=\"fix_id\" value=\" $fix_id\" placeholder=\"Team\"><br /><br /><input type=\"hidden\" id=\"fix_country_id\" value=\"$fix_country_id\" placeholder=\"Country\"><br /><br />".
                populateList3($fix_teamA_id,"teamA", $sqlTeam)."<br /><br />".
                populateList3($fix_teamB_id,"teamB", $sqlTeam)."<br /><br />".
                populateList3($fix_tournament_id,$tblTourn,$sqlTournament)."<br /><br />"
                ."<input type=\"time\" name=\"ftime\" id=\"ftime\" value=\"$fix_fTime\" placeholder=\"Time\"><br /><br />
                <input type=\"date\" name=\"fdate\" id=\"fdate\" value=\"$fix_fDate\" placeholder=\"Date\"><br /><br />
                <input type=\"text\" name=\"price\" id=\"price\" value=\"$fix_price\" placeholder=\"Price\"><br /><br />
                <label for='active'>Send To Homepage</label> <input type='checkbox' name='homepage' id='homepage' ";
                echo ($fix_homepg==1?'checked':'unchecked');
                echo"><br><br />
                 <button type='button' name='btnUpdate' id='buttonUpdate' class=\"btn\" value='Update' onClick='updateRecord()'>Update Fixture</button>
                    <button type='reset' name='cancel' class=\"btn\">Cancel</button>
            </form>
            </div><br />
            </div>
            ";
        }  
    }else {
        //header("Location: /users/login.php");
    }     
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/fixtures/includes/footer_page.php'?>