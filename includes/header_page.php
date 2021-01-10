<?php
if (session_id()=='') {
session_start();
}
    echo "
    <html>
    <head>
        <meta name=\"viewport\" content=\"width=device-width\">
        <meta name=\"description\" content=\"Fixtures for Present and Upcoming matches to be watched at carwash viewing center, naibawa, Kano\"/>
        <script type='text/javascript' src='/jquery-3.2.1.min.js'></script>
        <script type='text/javascript' src='/js/add_fixture.js'></script>
        <script type='text/javascript' src='/js/menu.js'></script>
        <script type='text/javascript' src='/js/admin.js'></script>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/main.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/menu.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/home.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/800px.css\" media=\"screen and (max-width: 800px)\">
        
    </head>

    <body>
      <div id=\"wrapper\">
        <header class=\"site-header clearfix\">
            <h2>CarWash Viewing Center</h2>
            <nav class=\"main-nav\">
                <ul>
                    <li onClick='getHome()'><a href=\"#\">Home</a></li>
                    <li onClick='getEngland()'><a href=\"#\">England</a></li>
                    <li onClick='getFrance()'><a href=\"#\">France</a></li>
                    <li onClick='getGermany()'><a href=\"#\">Germany</a></li>
                    <li onClick='getItaly()'><a href=\"#\">Italy</a></li>
                    <li onClick='getSpain()'><a href=\"#\">Spain</a></li>
                    <li onClick='getUefa()'><a href=\"#\">UEFA</a></li>
                    <li onClick='getCaf()'><a href=\"#\">CAF</a></li>
                    <li onClick='getComebol()'><a href=\"#\">COMEBOL</a></li>
                    <li onClick='getFifa()'><a href=\"#\">FIFA</a></li>";

                   echo ($_SESSION['logged_in']==true) ? "<li><a href=\"/carwash/users/admin.php\">".$_SESSION['user']."</a></li>" : "<li onClick='getLogin()'><a href=\"#\">Admin</a></li>";
                    
                  echo "
                </ul>
            </nav>
        </header>
        <main>
            <section class=\"billboard\">
                <h2>Home of Top League and International Football</h2>

            </section>
            <div class=\"column-wrapper clearfix\">
                <section class=\"main-col\">
                    <div></div><br />";
?>
