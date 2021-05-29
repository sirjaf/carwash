<?php
if (session_id()=='') {
session_start();}
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    echo "
    <!DOCTYPE HTML>
    <html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
         <meta name=\"viewport\" content=\"width=device-width\">
         <meta name=\"description\" content=\"Tournaments|Admin Section\"/>
         <link rel=\"icon\" type=\"image/ico\" href=\"/images/icons/icon-72x72.png\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/pushbar.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/demo.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/main.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/menu.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/home.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/800px.css\" media=\"screen and (max-width: 800px)\">
        <script type='text/javascript' src='/jquery-3.2.1.min.js'></script>
        <script type='text/javascript' src='/js/add_fixture.js'></script>
        <script type='text/javascript' src='/js/menu.js'></script>
        <script type='text/javascript' src='/js/admin.js'></script>
        <script type='text/javascript' src='/js/pushbar.js'></script>
        <title>Dawaki Viewing Center | Tournaments|Admin Section</title>
        
    </head>
    <body>
        
         <aside data-pushbar-id=\"top\" class=\"pushbar from_top\">
		    <div class=\"title\"><span data-pushbar-close class=\"close push_right push-span\"></span> Dawaki Viewing Center</div>
                <ul class=\"menu\">
                    <li><a href=\"/\">Home</a></li>
                    <li><a href=\"/contact.php\">Contact Us</a></li>";
                    
                    if (isset($_SESSION['logged_in']) and $_SESSION['logged_in']){
                        echo("<li><a href=\"/users/admin.php\">".$_SESSION['user']."</a></li>");
                    }else{
                        echo("<li><a href=\"/users/login.php\">Admin</a></li>");
                    }
                  echo "
                </ul>

	    </aside>
        <div id=\"wrapper\">
        <header class=\"site-header clearfix\" id=\"sitenav\">
             <img src=\"/images/icons/icon-72x72.png\" id=\"img-sitenav\" />
            <h2 id=\"sitename\"><a href=\"/\">Dawaki Viewing Center</a></h2>
            <nav class=\"main-nav\">
                <ul>
                    <li><a href=\"/\">Home</a></li>
                    <li><a href=\"/contact.php\">Contact Us</a></li>
                    ";

                     if (isset($_SESSION['logged_in']) and $_SESSION['logged_in']){
                        echo("<li><a href=\"/users/admin.php\">".$_SESSION['user']."</a></li>");
                    }else{
                        echo("<li><a href=\"/users/login.php\">Admin</a></li>");
                    }
            
                  echo "
                </ul>
            </nav>
             <div id=\"mobile-menu\"><button data-pushbar-target=\"top\">Menu</button></div>
        </header>
        <main>
            <section class=\"billboard\">
                
            </section>
            <div class=\"column-wrapper clearfix\">
                <section class=\"main-col\">
                    <div id=\"info\"></div><br />";
                    
?>