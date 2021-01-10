<?php
    //include_once 'H:\wamp64\www\carwash\includes\dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    //$tournament=$_GET["id"];
   // echo "In ajax. Tourn id=".$_POST["tournament_id"];

    if (isset($_POST["country_id"]) && !empty($_POST["country_id"]))
    {
        $sql = "Select * from tournaments where country_id=".$_POST["country_id"]." order by name"; 
        //echo "In ajax. Tourn id=".$_POST["country_id"];
        $result = mysqli_query($conn,$sql);
        echo "<select><option>Select Tournment</option>";
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<option value=".$row["id"].">";echo $row['name']; echo "</option>";
        }

    echo "</select>";
}
?>