<?php
if (session_id()=='') {
session_start();}
if ($_SESSION['logged_in']) {
    include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/header_page.php';
    echo "
        <div id=\"content-table\" class=\"admin-div myfixture\">
        <span>ADMIN : ".$_SESSION['user']."</span>
        <div class=\"div-forms\">
            <br />
            <div><a href=\"/fixtures/index.php\">Fixtures</a></div>
            <br />
            <div><a href=\"/teams/index.php\">Teams</a></div>
            <br />
            <div><a href=\"/tournaments/index.php\">Tournaments</a></div>
            <br />
            <div><a href=\"/seasons/index.php\">Seasons</a></div>
            <br />
            <div><a href=\"/users/index.php\">Users</a></div>
            <br />
            <div><a href=\"/users/info.php\">Information</a></div>
            <br />
            <div><a href=\"/users/logout.php\">Logout</a></div>
            <br />
        </div>
        </div><br />";
        include_once $_SERVER['DOCUMENT_ROOT'].'/users/includes/footer_page.php';
}else {
    header("Location: /users/login.php");
    die;
}
?>