<?php include_once $_SERVER['DOCUMENT_ROOT'].'/fixtures/includes/header_page.php'?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';

$url = "https://carwash.jaafarprojects.website/fixtures/delete_fixture.php";

if (isset($_SESSION['logged_in'])) {
    if (isset($_GET['id'])) {
        //echo "show clicked";
        $sql = "SELECT f.id AS fixtures_id,ta.name AS teamA,tb.name AS teamB,tm.name AS tour_name,
                f.fDate AS fix_date,f.fTime AS fix_time,f.price AS fix_price FROM fixtures f 
                INNER JOIN teams ta ON f.teamA_id=ta.id
                INNER JOIN teams tb ON f.teamB_id=tb.id
                INNER JOIN tournaments tm ON f.tournament_id=tm.id
                WHERE f.id=". (int)$_GET['id']." ORDER BY f.fDate";
        $result = mysqli_query($conn,$sql);
        $row_fixtures = mysqli_fetch_assoc($result);
        $fixture_name = $row_fixtures['teamA']." VS ".$row_fixtures['teamB'];
        $fixture_tournament = $row_fixtures['tour_name'];
        $fixture_date = $row_fixtures['fix_date'];
        $fixture_time = $row_fixtures['fix_time'];
        $fixture_price = $row_fixtures['fix_price'];
         $fixture_id = $row_fixtures['fixtures_id'];
        
        echo "
        
        <div id=\"content-table\">
                <div>
                    <br /> 
                    <a class=\"btn\" href =\"#\" onClick='goBack()'>Back</a>
                    <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($fixture_id,\"{$url}\")'>Delete</a><br /> <br />
                </div><br />
                <div class=\"div-forms\"><span>FIXTURE</span><br /><br />
        
                <table>
                    <tr>
                        <th><h4>Fixture<h4></th>
                        <td><strong> $fixture_name<strong></td>
                    </tr>
                    
                    <tr> 
                        <th><h4>Tournament<h4></th>
                        <td><strong> $fixture_tournament <strong></td> 
                     </tr> 
                     
                     <tr> 
                        <th><h4>Date<h4></th>
                        <td><strong> $fixture_date <strong></td> 
                    </tr>  
                    
                    <tr> 
                        <th><h4>Time<h4></th>
                        <td><strong> $fixture_time <strong></td> 
                    </tr> 

                    <tr> 
                        <th><h4>Price<h4></th>
                        <td><strong> $fixture_price <strong></td> 
                    </tr> 
                    

                </table>       
                    
            </div>
            </div> <br />
        
        ";
    }
    
}else {
    //header("Location: /users/login.php");
}

?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/fixtures/includes/footer_page.php'?>
