<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
if (session_id()=='') {
    session_start();}
if (isset($_SESSION['logged_in'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/header_page.php';
    echo "
    <div id=\"content-table\">
    <div>
         <br />
         <a class=\"btn\" href ="."/tournaments/index.php".">Back</a> <br /> <br />
    </div><br />
    <div align=\"center\">
    <span>Add Tournament</span>
    <br /><br />
            <form >".
                populateList2('country','countries')
                ."<br /><br /><input type='text' name='tournament' id='tournament' value='' placeholder='Tournament'><br /><br />
                <button type='button' name='btnAdd' id='buttonAdd' class=\"btn\" value='Add' onClick='addRecordTournament()'>Add</button>
                <button type='reset' name='cancel' class=\"btn\">Cancel</button>
            </form>
        </div>
    <br />
    </div>";
    include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/footer_page.php';
}else {
    header("Location: /users/login.php");
}
   
?>

