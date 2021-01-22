<?php include_once $_SERVER['DOCUMENT_ROOT'].'/seasons/includes/header_page.php'; ?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';

if (isset($_SESSION['logged_in'])) {

    if (isset($_GET['id'])) {
        //echo "show clicked";
        $sql = "SELECT * FROM seasons where id=". (int)$_GET['id'];
        $result = mysqli_query($conn,$sql);
        $row_seasons = mysqli_fetch_assoc($result);
        $season_id = (int)$_GET['id'];
        $season_name = $row_seasons['name'];
        $season_start = $row_seasons['snstart'];
        $season_end = $row_seasons['snend'];
        $active = $row_seasons['active'] == '1' ? 'Yes' : 'No';
        
        $url = "/seasons/delete_season.php";
        echo "
        
        <div id=\"content-table\">
        <div>   
             <br />
            <a class=\"btn\" href =\"#\" onClick='goBack()'>Back</a>
            <a class=\"btn\" href ="."../seasons/update_season.php?id=".(int)$row_seasons['id'].">Edit</a>
            <a class=\"btnDel\" href=\"#\" onClick='deleteConfirm($season_id,\"{$url}\")'>Delete</a> <br /> <br />
        </div><br />
        <div class=\"div-forms\">    
                <span>SEASON</span><br /><br />
        
                <table>
                    <tr>
                        <th><h4>Name<h4></th>
                        <td><strong> $season_name <strong></td>
                    </tr>
                    <tr>
                        <th><h4>Start<h4></th>
                        <td><strong>". date("d-M-Y",strtotime($season_start)) ."<strong></td>
                    </tr>
                    <tr>
                        <th><h4>End<h4></th>
                        <td><strong>". date("d-M-Y",strtotime($season_end)) ."<strong></td>
                    </tr>
                    <tr>
                        <th><h4>Active<h4></th>
                        <td><strong> $active <strong></td>
                    </tr>
                                     
                </table>  

            </div><br />
        </div>
        ";
    }
}else {
    //header("Location: /carwash/users/login.php");
}

?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/seasons/includes/footer_page.php'; ?>