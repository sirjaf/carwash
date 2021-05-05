<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
if (session_id()=='') {
    session_start();}

    if (isset($_SESSION['logged_in'])) {
        include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/header_page.php';
        if (isset($_GET['id'])) {
            //echo "show clicked";
            $sql = "SELECT * FROM tournaments where id=". (int)$_GET['id'];
            $result = mysqli_query($conn,$sql);
            $row_tourns = mysqli_fetch_assoc($result);
            $tournament_name = $row_tourns['name'];
            $tournament_country_id = $row_tourns['country_id'];
            $tournament_id =  $row_tourns['id'];
            
             $sqlCountry = "SELECT id,name FROM countries ORDER BY name"; 
            $resultCountry = mysqli_query($conn,$sqlCountry);
            $url = "/tournaments/delete_tournament.php";

            while ($row_country = mysqli_fetch_assoc($resultCountry)){
                if ($row_country['id']==$tournament_country_id) {
                    $tournament_country = $row_country['name'];
                    break;
                }                  
            } 
            echo "
                <div id =\"info\"></div>
                <div id=\"content-table\">
                <div>
                     <br />
                    <a class=\"btn\" href =\"#\" onClick='goBack()'>Back</a>
                    <a class=\"btn\" href ="."../tournaments/update_tournament.php?id=".(int)$row_tourns['id'].">Edit</a>
                    <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($tournament_id,\"{$url}\")'>Delete</a> <br /> <br />
                </div><br />
                   <div align=\"center\"> 
                   <span>Tournament</span><br /><br />
            
                    <table>
                        <tr>
                            <th><h4>Name<h4></th>
                            <td><strong> $tournament_name <strong></td>
                        </tr>
                        
                        <tr> 
                            <th><h4>Country/Region<h4></th>
                            <td><strong> $tournament_country <strong></td> 
                        </tr>   
                    </table>    
                    </div>                  
                </div><br />
         
            ";
        }
        include $_SERVER['DOCUMENT_ROOT'].'/tournaments/includes/footer_page.php';
    }else {
       header("Location: /users/login.php");
    }
?>