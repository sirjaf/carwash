<?php
    //include_once 'H:\wamp64\www\carwash\includes\dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    //$tournament=$_GET["id"];
   // echo "In ajax. Tourn id=".$_POST["tournament_id"];

    if (isset($_POST["continent"]) && !empty($_POST["continent"]))
    {
        $sql = "Select * from countries where continent='".mysqli_real_escape_string($conn,$_POST["continent"])."' order by name"; 
        //echo "In ajax. Tourn id=".$_POST["country_id"];
        $result = mysqli_query($conn,$sql);
        echo "<select><option>Select Country</option>";
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<option value=".$row["id"].">";echo $row['name']; echo "</option>";
        }

    echo "</select>";
}
?>