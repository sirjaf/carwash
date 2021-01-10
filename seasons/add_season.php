<?php include_once $_SERVER['DOCUMENT_ROOT'].'/seasons/includes/header_page.php'?>
<?php 
    
    if (isset($_SESSION['logged_in'])) {
   echo "
   <div id=\"content-table\">
   <div>
         <br />
         <a class=\"btn\" href ="."/seasons/index.php".">Back</a> <br /> <br />
  </div><br />
   <div class=\"div-forms\"><span>Add Season</span><br /><br />
    <form >
        <br />
        <input type='text' name='season' id='season' value='' placeholder='Season'>
        <br /><br />
        <input type='date' name='snstart' id='snstart' value='' placeholder='Date'><br /><br />
        <input type='date' name='snend' id='snend' value='' placeholder='Date'><br /><br />
        <label for='active'>Active Season</label> <input type='checkbox' name='active' id='active'><br><br />
       
        <button type='button' name='btnAdd' id='buttonAdd' class=\"btn\" value='Add' onClick='addRecordSeason()'>Add Season</button>
        <button type='reset' name='cancel' class=\"btn\">Cancel</button>
    </form>
    </div> <br />
    </div>";
    }else {
       // header("Location: /users/login.php");
    }
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/teams/includes/footer_page.php'?>

