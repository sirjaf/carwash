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
    <div id =\"info\"></div><br />               
    <div class=\"form-wrapper\">
		
    <div class=\"div-forms\">
        <form class=\"contact-form\" method=\"post\">
            <span>
                Contact Us
            </span>
            <br /><br />

            <div class=\"v-padding\">
                <input type=\"text\" name=\"fname\" id=\"fname\" placeholder=\"Full Name\" required>
            </div>
            <br /><br />

            <div>
                <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email\" required onkeyup ='changeEmailInputHandler()'>
            </div>
            <br /><br />
            
            <div>
                <input type=\"text\" name=\"subject\" id=\"subject\" placeholder=\"Subject\" required>
            </div>
            <br /><br />

            <div>
                <textarea name=\"message\" id=\"message\" placeholder=\"Your Message\" required></textarea>
            </div>
            <br /><br />
            <div>
                <button type=\"button\" name=\"sendbtn\" class=\"btn\" required onclick='messageSendHandler()'>
                    Send Email
                </button>
            </div>
        </form>
    </div>
</div>


</main>
	

<footer class=\"footer\">
    <p> Dawaki Viewing Center &copy; 2018 - "; echo date("Y");
    echo "</p>
</footer>

</div>

 <script type='text/javascript'>
  
      var pushbar = new Pushbar({
          blur:true,
          overlay:true
          });
  
  </script>
  
  <script type='text/javascript'>
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
</html>";
