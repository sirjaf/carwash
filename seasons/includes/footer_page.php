<?php
echo "</section>
            
                 <aside class=\"sidebar-col\">
                  
                    
                     <div id=\"standings\">";
                        
                       //echo LeagueTable($_SERVER['DOCUMENT_ROOT']."/json/epl.json");
                     echo "</div>
                </aside>
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
?>    