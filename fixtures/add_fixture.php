<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
if (session_id() == '') {
    session_start();
}
if (isset($_SESSION['logged_in'])){
    include_once $_SERVER['DOCUMENT_ROOT'].'/fixtures/includes/header_page.php';
    $sqlSeason = "Select * from seasons where active=1";
    $resultSeason = mysqli_query($conn,$sqlSeason);

    if (mysqli_num_rows($resultSeason)==1) {
        $row=mysqli_fetch_assoc($resultSeason);
        $season_name = $row['name'];
        $season_id = $row['id'];
        echo "
        <div id=\"content-table\">
        <div id =\"info\"></div><br />
        <div>
            <br />
            <a href ="."../fixtures/index.php"." class=\"btn\">Back</a><br /><br />
            
        </div><br />

        
        
        <div class=\"div-forms\"><span> ADD FIXTURE TO SEASON $season_name</span><br /><br />
        <form>
            <input type='hidden' name='season_id' id='season_id' value='$season_id' placeholder='$season_id'><br />
            <select name='continent' id='continent' onChange='getCountries(this.options[this.selectedIndex].text)'><br /><br />
                            <option>Select Continent</option>";
                            $sql = "Select id, continent from countries group by continent";
                            $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($result))
                            {

                            echo "<option value=".$row['id'].">".$row['continent']."</option>";

                            }

                    echo "</select><br /><br />
                   <select name='country' id='country' onChange='getTournaments(this.value)'>
                            <option>Select Country/Continental Association</option>";

                    echo "</select><br /><br />

                    <select name='tournament' id='tournament' onChange=\"getTeamA1(this.value,country.options[country.selectedIndex].text)\">
                            <option>Select Tournament</option>";
                    echo "</select><br /><br />
                    <select name='teamA' id='teamA' onChange='getTeamB(this.value)'>
                        <option>Select Team A</option>

                    </select><br /><br />
                    <select name='teamB' id='teamB'>
                        <option>Select Team B</option>

                    </select><br /><br />
                    <input type='time' name='fTime' id='fTime' value='' placeholder='Time'><br /><br />
                    <input type='date' name='fDate' id='fDate' value='' placeholder='Date'><br /><br />
                    <input type='text' name='price' id='price' value='' placeholder='Price'><br /><br />
                    
                    <div class=\"div-sendToHamepage\">
                        <label for='active'>Send To Homepage</label> 
                        <input type='checkbox' name='homepage' id='homepage'>
                        
                    </div>
                    <br /><br />

                    <button type='button' name='btnAdd' id='buttonAdd' class=\"btn\" value='Add' onClick='addRecord()'>Add Fixture</button>
                    <button type='reset' name='cancel' class=\"btn\">Cancel</button>
        </form>
        </div><br />
        </div><br /><br />
        ";
    }else{

        echo "<div>
                <p>
                You must Set Season first.
                </p>
            </div>";

    }
    include_once $_SERVER['DOCUMENT_ROOT'].'/fixtures/includes/footer_page.php';
}else {
  header("Location: /users/login.php");
  die();
}

?>

