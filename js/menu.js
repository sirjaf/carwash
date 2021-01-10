function getEngland() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_eng.php",
        data: {},
        success: function(data) {
            
            $('#content-table').html(data);
             $('.spanLeague').html("Premier League");
            murl="/standings/getEpl.php";
            mtopscorer="/topscorers/tsEpl.php";
            getStandings(murl);
            getTopScorers(mtopscorer);

        }
    });
}

function getSpain() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_spn.php",
        data: {},
        success: function(data) {
            murl="/standings/getLaliga.php";
            mtopscorer="/topscorers/tsLaliga.php";
            $('#content-table').html(data);
             $('.spanLeague').html("La Liga");
            getStandings(murl);
            getTopScorers(mtopscorer);

        }
    });
}

function getItaly() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_ity.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
            $('.spanLeague').html("Serie A");
           murl="/standings/getSeriea.php";
           mtopscorer="/topscorers/tsSeriea.php";
            getStandings(murl);
            getTopScorers(mtopscorer);

        }
    });
}

function getGermany() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_ger.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
             $('.spanLeague').html("Bundesliga");
    murl="/standings/getBundesliga.php";
    mtopscorer="/topscorers/tsBundesliga.php";
            getStandings(murl);
            getTopScorers(mtopscorer);
        }
    });
}

function getFrance() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_fra.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
             $('.spanLeague').html("Ligue 1");
            murl="/standings/getLigue1.php";
            mtopscorer="/topscorers/tsLigue1.php";
            getStandings(murl);
            getTopScorers(mtopscorer);

        }
    });
}

function getUefa() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_uefa.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);

        }
    });
}

function getCaf() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_caf.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);

        }
    });
}

function getComebol() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_com.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);

        }
    });
}

function getFifa() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_fifa.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);

        }
    });
}



function getHome() {
    // alert("Javascript menu works");
    // mycountry_id = val;
    $.ajax({
        type: "GET",
        url: "/pages/page_gen_home.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
            murl="/standings/getEpl.php";
            mtopscorer="/topscorers/tsEpl.php";
            getStandings(murl);
        }
    });
}

function getStandings(murl){
    
     $.ajax({
        type: "GET",
        url: murl,
        data: {},
        success: function(data) {
            $('#standings').html(data);
            
        }
    });
    
}

function getTopScorers(murl){
    
     $.ajax({
        type: "GET",
        url: murl,
        data: {},
        success: function(data) {
            $('#topscorers').html(data);
            
        }
    });
    
}