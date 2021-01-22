<?php
    //include_once 'H:\wamp64\www\carwash\includes\dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    //$tournament=$_GET["id"];
   // echo "In ajax. Tourn id=".$_POST["tournament_id"];

   if(isset($_POST["country_id"]) && !empty($_POST["country_id"])) 
    {
        if (isset($_POST["tournament_id"]) && !empty($_POST["tournament_id"]))
        {
            //$sql = "Select * from teams where tournament_id=".$_POST["tournament_id"]; 
            $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm 
            INNER JOIN tournaments tn ON tm.country_id=tn.country_id	
            INNER JOIN countries co ON tm.country_id=co.id WHERE co.id=".(int)$_POST["country_id"]. 
            " AND tn.id=".(int)$_POST["tournament_id"]." ORDER BY tm.name";
            //echo "In ajax. Tourn id=".$_POST["tournament_id"];
            $result = mysqli_query($conn,$sql);
            echo "<select><option>Select Team A</option>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row["team_id"].">";echo $row['team_name']; echo "</option>";
            }

        echo "</select>";
       }
}
?>
