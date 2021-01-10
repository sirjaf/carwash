<?php include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/header_page.php'; ?>
<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
if (isset($_SESSION['logged_in'])) {
    
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
}else {
    //header("Location: /users/login.php");
}
   
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/footer_page.php'; ?>
