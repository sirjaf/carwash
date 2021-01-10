<?php include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/header_page.php'; ?>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    if (isset($_SESSION['logged_in'])) {
       
           // echo "show clicked";
            $sql = "SELECT * FROM tournaments where id=". (int)$_GET['id'];
            $result = mysqli_query($conn,$sql);
            $row_tourn = mysqli_fetch_assoc($result);
            $tourn_id =  $row_tourn['id'];
            $tourn_name = $row_tourn['name'];
            $tourn_country_id = $row_tourn['country_id'];
            $sqlCountry = "SELECT id,name FROM countries ORDER BY id"; 
            $resultCountry = mysqli_query($conn, $sqlCountry);
            
            $tblCountry ="countries";
            $selectName="country";
            
             $url = "https://carwash.jaafarprojects.website/tournaments/delete_tournament.php";
             
            echo "
            <div id =\"info\"></div>
            <div id=\"content-table\">
             <div>
                <br />
                <a class=\"btn\" href =\"#\" onClick='goBack()'>Back</a>
                <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($tourn_id,\"{$url}\")'>Delete</a> <br /> <br />
            </div><br />
            <div align=\"center\">
            <span>Update Tournament</span><br /><br />
          
            <form>
                <input type=\"hidden\" name=\"tourn_id\" id=\"tourn_id\" value=\"$tourn_id\" placeholder=\"Tourn_id\"><br />".
                populateList($tourn_country_id,$selectName,$tblCountry)
                ."<br /><br /><input type=\"text\" name=\"tournament\" id=\"tournament\" value=\"$tourn_name\" placeholder=\"Tournament\"><br />
                <br \><button type='button' name='btnUpdate' id='buttonUpdate' class=\"btn\" value='Update' onClick='updateRecordTournament()'>Update</button>
                <button type=\"reset\" name=\"cancel\" class=\"btn\">Cancel</button>
            </form>
            </div>
            </div> <br />
            ";
        }  
  
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/footer_page.php';?>