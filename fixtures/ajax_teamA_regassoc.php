<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    //$tournament=$_GET["id"];
   // echo "In ajax. Tourn id=".$_POST["tournament_id"];
   //$Africa="Africa";
   
   
   if(isset($_POST["regassoc"]) && !empty($_POST["regassoc"])){

    switch (mysqli_real_escape_string($conn,$_POST["regassoc"])) {

        case "ACF":
                $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm 
                INNER JOIN countries co ON tm.country_id=co.id WHERE co.continent='Asia' order by team_name";
                //echo "In ajax. Tourn id=".(int)$_POST["tournament_id"];
                $result = mysqli_query($conn,$sql);
                echo "<select><option>Select Team A</option>";
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<option value=".$row["team_id"].">";echo $row['team_name']; echo "</option>";
                }

                echo "</select>";

            break;
        
        case "CAF":
                $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm  	
                INNER JOIN countries co ON tm.country_id=co.id WHERE co.continent='Africa' order by team_name";
                //echo "In ajax. Tourn id=".$_POST["tournament_id"];
                echo $sql;
                $result = mysqli_query($conn,$sql);
                echo "<select><option>Select Team A</option>";
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<option value=".$row["team_id"].">";echo $row['team_name']; echo "</option>";
                }

                echo "</select>";
            break;

        case "COMEBOL":
            $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm  	
            INNER JOIN countries co ON tm.country_id=co.id WHERE co.continent='South America' order by team_name";
            //echo "In ajax. Tourn id=".(int)$_POST["tournament_id"];
            $result = mysqli_query($conn,$sql);
            echo "<select><option>Select Team A</option>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row["team_id"].">";echo $row['team_name']; echo "</option>";
            }

            echo "</select>";
            break;

        case "COMCAF":
            $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm  	
            INNER JOIN countries co ON tm.country_id=co.id WHERE co.continent='North America' order by team_name";
           // echo "In ajax. Tourn id=".(int)$_POST["tournament_id"];
            $result = mysqli_query($conn,$sql);
            echo "<select><option>Select Team A</option>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row["team_id"].">";echo $row['team_name']; echo "</option>";
            }

            echo "</select>";
            break;

        case "UEFA":
            $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm  	
            INNER JOIN countries co ON tm.country_id=co.id WHERE co.continent='Europe' order by team_name";
            //echo "In ajax. Tourn id=".(int)$_POST["tournament_id"];
            $result = mysqli_query($conn,$sql);
            echo "<select><option>Select Team A</option>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row["team_id"].">";echo $row['team_name']; echo "</option>";
            }

            echo "</select>";
            break;  

        case "FIFA":
            $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm  	
            INNER JOIN countries co ON tm.country_id=co.id order by team_name";
            //echo "In ajax. Tourn id=".(int)$_POST["tournament_id"];
            $result = mysqli_query($conn,$sql);
            echo "<select><option>Select Team A</option>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row["team_id"].">";echo $row['team_name']; echo "</option>";
            }

            echo "</select>";
            break;    

        default:

        if(isset($_POST["country_id"]) && !empty($_POST["country_id"])) 
        {
            if (isset($_POST["tournament_id"]) && !empty($_POST["tournament_id"]))
            {
                //$sql = "Select * from teams where tournament_id=".$_POST["tournament_id"]; 
                $sql="SELECT tm.id as team_id,tm.name as team_name FROM teams tm  
                INNER JOIN tournaments tn ON tm.country_id=tn.country_id	
                INNER JOIN countries co ON tm.country_id=co.id WHERE co.id=".(int)$_POST["country_id"]. 
                " AND tn.id=".(int)$_POST["tournament_id"]." order by team_name";
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
            break;
    }
} 
?>
