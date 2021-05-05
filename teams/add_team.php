<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
if (session_id() == '') {
    session_start();
}
if (isset($_SESSION['logged_in'])) {
   include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/header_page.php';
   setlocale(LC_ALL, "en_US.utf8");
   $team_crest_url="";
   echo "
    <div id=\"content-table\">
    <div>
         <br />
         <a class=\"btn\" href ="."/teams/index.php".">Back</a><br /><br />
    </div><br />
    <span class=\"teamSpan\">Add Team</span><br/><br />
   
     <div align=\"center\" class=\"form-wrapper\"> 
   
   
    <form>".
        populateList2('country','countries')
        ."<br /><br /><input type='text' name='team' id='team' value='' placeholder='Team'><br /><br />
        <button  type='button' name='btnAdd' id='buttonAdd' class=\"btn\" value='Add' onClick='addRecordTeam()'>Add</button>
        <button type='reset' name='cancel' class=\"btn\">Cancel</button>
    </form>

<div class=\"club-crest-search\">
                <img id=\"team_crest\" src=\"".check_crest($team_crest_url)."\" alt=\"team_crest\">
                <button type='button' name='btnSearchCrest' id='teamCrestSearch' class=\"btn\" onClick='getTeamCrest()'>Search Crest</button>
            </div>

            </div><br />
    </div>";
    include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/footer_page.php';
}else {
    header("Location: /users/login.php");
}
?>
