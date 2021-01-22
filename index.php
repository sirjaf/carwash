<?php
if (session_id()=='') {
session_start();
}
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';
    echo "
    <!DOCTYPE HTML>
    <html lang=\"en\">
    <head>
        
        
        
        <link rel=\"manifest\" href=\"/manifest.json\">
        <meta name=\"viewport\" content=\"width=device-width\"/>
        <meta name=\"description\" content=\"Fixtures for Present and Upcoming matches to be watched at carwash viewing center, naibawa, Kano\"/>
        <link rel=\"icon\" type=\"image/ico\" href=\"/images/icons/icon-72x72.png\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/pushbar.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/demo.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/main.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/menu.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/home.css\">
        
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/800px.css\" media=\"screen and (max-width: 800px)\">
        <script src='/jquery-3.2.1.min.js'></script>
        <script src='/js/add_fixture.js'></script>
        <script src='/js/menu.js'></script>
        <script src='/js/admin.js'></script>
        <script src='/js/pushbar.js'></script>
        
        <title>Dawaki Viewing Center</title>
        
    </head>
    <body>
        <aside data-pushbar-id=\"top\" class=\"pushbar from_top\">
		<div class=\"title\"><span data-pushbar-close class=\"close push_right push-span\"></span> Dawaki Viewing Center</div>
                <ul class=\"menu\">
                    // <li><a href=\"/\">Home</a></li>
                    <li onclick='getEngland()'><a href=\"#England\">England</a></li>
                    <li onClick='getFrance()'><a href=\"#France\">France</a></li>
                    <li onClick='getGermany()'><a href=\"#Germany\">Germany</a></li>
                    <li onClick='getItaly()'><a href=\"#Italy\">Italy</a></li>
                    <li onClick='getSpain()'><a href=\"#Spain\">Spain</a></li>
                   ";
                //    echo " <li onClick='getUefa()'><a href=\"#UEFA\">UEFA</a></li>
                //    <li onClick='getCaf()'><a href=\"#CAF\">CAF</a></li>
                //    <li onClick='getComebol()'><a href=\"#CONMEBOL\">CONMEBOL</a></li>
                //    <li onClick='getFifa()'><a href=\"#FIFA\">FIFA</a></li>";
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
                    <li onclick='getEngland()'><a href=\"#England\">England</a></li>
                    <li onClick='getFrance()'><a href=\"#France\">France</a></li>
                    <li onClick='getGermany()'><a href=\"#Germany\">Germany</a></li>
                    <li onClick='getItaly()'><a href=\"#Italy\">Italy</a></li>
                    <li onClick='getSpain()'><a href=\"#Spain\">Spain</a></li>
                    <li onClick='getUefa()'><a href=\"#UEFA\">UEFA</a></li>
                    <li onClick='getCaf()'><a href=\"#CAF\">CAF</a></li>
                    <li onClick='getComebol()'><a href=\"#CONMEBOL\">CONMEBOL</a></li>
                    <li onClick='getFifa()'><a href=\"#FIFA\">FIFA</a></li>";
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
                    <div id =\"info\"><br /><br />";
                    getInformation($conn);
                    echo "<div class=\"mydisplay\">
                       <p><strong>Download Application For your Android Device</strong></p><br />
                        <a href=\"/download/Dawaki_Viewing_Center_1.0.0.apk\" class=\"btn\">Download</a><br />
                    </div><br /><br />
                    <div>
                        
                        <p><strong></strong></p>
                    </div><br />
                    
                    <div id=\"content-table\">";
                    include $_SERVER['DOCUMENT_ROOT'].'/pages/page_gen_home.php';
                    include $_SERVER['DOCUMENT_ROOT'].'/pages/page_gen_upcoming.php';
                    echo "</div>";
                    
        	    echo "
        	    </section>
            
                 <aside class=\"sidebar-col\">
                   
                    
                     <div>
                         <h4><span>Table</span></h4>
                        <div id=\"standings\"> ";

                        echo LeagueTable($_SERVER['DOCUMENT_ROOT']."/json/epl.json");
                       
                     echo "</div></div>
                     
                      <div>
                        <h4><span>Top Scorers</span></h4>    
                     <div id=\"topscorers\"> ";
                        echo LeagueTopScorer($_SERVER['DOCUMENT_ROOT']."/json/tsepl.json");
                    echo "</div></div>
                </aside>
            </div>
            
            
        </main>
        <footer class=\"footer\">
            <p> Dawaki Viewing Center &copy; 2018 - "; echo date("Y");
            echo "</p>
        </footer>
     </div>
     
      <script>
        
            var pushbar = new Pushbar({
                blur:true,
                overlay:true
                });
        
        </script>
        
     <script>
      window.onscroll = function(){myfunction()};

      var navbar = document.getElementById(\"sitenav\");
      var sticky = navbar.offsetTop;

      function myfunction(){

        if (window.pageYOffset >= sticky){
          navbar.classList.add(\"sticky\");
        }else {
            navbar.classList.remove(\"sticky\");
        }
      }

      </script>
        
    </body>
    
   </html> ";
?>







