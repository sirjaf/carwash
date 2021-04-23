// <script type="text/javascript">
var mytournament_id;
var mycountry_id;
var myregassoc;

function getCountries(val) {
    //alert("Javascript Works  " + val);
    mycountry_id = val;
    $.ajax({
        type: "POST",
    url: "/fixtures/ajax_countries.php",
        data: { "continent": val },
        success: function(data) {
            $('#country').html(data);
            //$('#teamB').html(data);
            $('#teamA').html("<option>Select Team A</option>");
            $('#teamB').html("<option>Select Team B</option>");
        }
    });

}


function getTournaments(val) {
    //alert("Javascript Works  " + val);
    mycountry_id = val;
    $.ajax({
        type: "POST",
      url: "/fixtures/ajax_tournament.php",
        data: { "country_id": val },
        success: function(data) {
            $('#tournament').html(data);
            //$('#teamB').html(data);
            $('#teamA').html("<option>Select Team A</option>");
            $('#teamB').html("<option>Select Team B</option>");
        }
    });

}


function getTeamA(val) {
    //alert("Javascript Works  " + val);
    mytournament_id = val;

    $.ajax({
        type: "POST",
        url: "/fixtures/ajax_teamA.php",
        data: { "tournament_id": mytournament_id, "country_id": mycountry_id },
        success: function(data) {
            $('#teamA').html(data);
            //$('#teamB').html(data);
            $('#teamB').html("<option>Select Team B</option>");
        }
    });
}

function getTeamA1(val, mregassoc) {

    //alert("Javascript Works  " + val + " " + mregassoc);

    mytournament_id = val;
    myregassoc = mregassoc;

    $.ajax({
        type: "POST",
        url: "/fixtures/ajax_teamA_regassoc.php",
        data: { "tournament_id": mytournament_id, "country_id": mycountry_id, "regassoc": myregassoc },
        success: function(data) {
            $('#teamA').html(data);
            //$('#teamB').html(data);
            $('#teamB').html("<option>Select Team B</option>");
        }
    });
    // alert("All through the the function getTeam1");
}

function getTeamB(val) {
    //alert("Javascript Works  " + val + " tournament id= " + mytournament_id + "country_id" + mycountry_id);

    $.ajax({
        type: "POST",
        url: "/fixtures/ajax_teamB.php",
        data: { "tournament_id": mytournament_id, "country_id": mycountry_id, "regassoc": myregassoc, "teamA_id": val },
        success: function(data) {
            $('#teamB').html(data);

        }
    });
}

function addRecord() {

    var country = $('#country').val();
    var tournament = $('#tournament').val();
    var teamA = $('#teamA').val();
    var teamB = $('#teamB').val();
    var fTime = $('#fTime').val();
    var fDate = $('#fDate').val();
    var price = $('#price').val();
    var season_id = $('#season_id').val();
    var homepg = ($('#homepage').is(':checked')) ? 1 : 0;

    $.ajax({
        type: "POST",
        url: "/fixtures/includes/add_fixture2.inc.php",
        data: { "country": country, "tournament": tournament, "teamA": teamA, "teamB": teamB, "fTime": fTime, "fDate": fDate, "price": price,"homepage": homepg, "season_id": season_id },
        success: function(data) {
                $('#info').show();
                $('#info').html(data);
               setTimeout(()=> $('#info').hide(),3000);
            }
    });


}


function updateRecord() {
    
    var fix_id = $('#fix_id').val();
    var country = $('#fix_country_id').val();
    var tournament = $('#tournament').val();
    var teamA = $('#teamA').val();
    var teamB = $('#teamB').val();
    var fTime = $('#fTime').val();
    var fDate = $('#fDate').val();
    var price = $('#price').val();
    var homepg = ($('#homepage').is(':checked')) ? 1 : 0;

    $.ajax({
        type: "POST",
        url: "/fixtures/includes/update_fixture.inc.php",
        data: { "fix_id": fix_id,"country": country, "tournament": tournament, "teamA": teamA, "teamB": teamB, "fTime": fTime, "fDate": fDate, "price": price,"homepage": homepg },
        success: function(data) {
                $('#info').show();
                $('#info').html(data);
                setTimeout(()=> $('#info').hide(),3000);
            }
           
        // error: function() {
        //     alert("Error Occured");
        // }
    });


}

function updateRecordHomepg(m_fix_id) {

    var fix_id = m_fix_id;
    var homepg;

    var checkbox = document.getElementById('homepage'+ fix_id);

      if (checkbox.checked !== true)
      {
         homepg = 0;

      }else{
            homepg=1;
        }

    $.ajax({
        type: "POST",
        url: "/fixtures/includes/update_fixture2.inc.php",

        data: { "fix_id": fix_id,"homepage": homepg },

        success: function(data) {

                $('#info').show();
                $('#info').html(data);
                setTimeout(()=> $('#info').hide(),3000);
                
            }
    });


}


function addRecordSeason() {

    var season = $('#season').val();
    var snstart = $('#snstart').val();
    var snend = $('#snend').val();
    var active = ($('#active').is(':checked')) ? 1 : 0;

    $.ajax({
        type: "POST",
        url: "/seasons/includes/add_season.inc.php",
        data: { "season": season, "snstart": snstart, "snend": snend, "active": active},

        success: function(data) {

                $('#info').show();
                $('#info').html(data);
                setTimeout(()=> $('#info').hide(),3000);
            }
           
    });


}

function updateRecordSeason() {
   
    var season_id = $('#season_id').val();
    var season = $('#season').val();
    var snstart = $('#snstart').val();
    var snend = $('#snend').val();
    var active = ($('#active').is(':checked')) ? 1 : 0;
     
    $.ajax({
        type: "POST",
        url: "/seasons/includes/update_season.inc.php",
        data: { "season_id":season_id,"season": season, "snstart": snstart, "snend": snend, "active": active},
        success: function(data) {
            $('#info').show();
            $('#info').html(data);
            setTimeout(()=> $('#info').hide(),3000);
            }
    });


}

function addRecordTeam() {

    var country = $('#country').val();
    var team = $('#team').val();
    var team_crest = document.getElementById('team_crest').getAttribute('src');

    $.ajax({
        type: "POST",
        url: "/teams/includes/add_team.inc.php",
        data: { "country": country, "team": team, "team_crest": team_crest },
        success: function (data) {
            $('#info').show();
            $('#info').html(data);
            setTimeout(() =>  $('#info').hide(), 3000);
        }
    });


}

function updateRecordTeam() {

    var teamid = $('#teamid').val();
    var country = $('#country').val();
    var team = $('#team').val();
    var team_crest = document.getElementById('team_crest').getAttribute('src');

    $.ajax({
        type: "POST",
        url: "/teams/includes/update_team.inc.php",
        data: { "teamid": teamid, "country": country, "team": team,"team_crest": team_crest },
        success: function (data) {
            $('#info').show();
            $('#info').html(data);
            setTimeout(() =>  $('#info').hide(), 3000);
        }
        
    });



}

function getTeamCrest() {

    var team = $('#team').val();
    var crestUrl = "";
    var base_URL = "https://en.wikipedia.org/api/rest_v1/page/summary/" + team;
    var crestUrl = document.getElementById('team_crest').getAttribute('src');

    $.ajax({
        type: "GET",
        url: base_URL,
        success: function (data) {

            document.getElementById('team_crest').setAttribute('src',data.thumbnail.source);
           
        }
    });
    
}


function addRecordTournament() {

    var country = $('#country').val();
    var tournament = $('#tournament').val();

    $.ajax({
        type: "POST",
        url: "/tournaments/includes/add_tournament.inc.php",
        data: { "country": country, "tournament": tournament },
        success: function(data) {
            $('#info').show();
            $('#info').html(data);
            setTimeout(()=> $('#info').hide(),3000); 
            }
            
    });


}

function updateRecordTournament() {
  
    var tourn_id = $('#tourn_id').val();
     var country = $('#country').val();
    var tournament = $('#tournament').val();

    $.ajax({
        type: "POST",
        url: "/tournaments/includes/update_tournament.inc.php",
        data: { "tourn_id": tourn_id ,"country": country, "tournament": tournament },
        success: function(data) {
                $('#info').show();
                $('#info').html(data);
                setTimeout(()=>$('#info').hide(),3000);
            }
           
    });
}

function searchFixture() {

    var strSearch = $('#search').val().trim();

    $.ajax({
        type: "POST",
        url: "/search/fixture_search.php",
        data: { "search": strSearch },
        success: function(data) {
                $('.div-forms').html(data);
                
            }
           
    });
}

function searchTeam() {

    var strSearch = $('#search').val().trim();

    $.ajax({
        type: "POST",
        url: "/search/team_search.php",
        data: { "search": strSearch },
        success: function(data) {
                $('.div-forms').html(data);
        }
           
    });
}

function gotoIndex() {
window.location = "/fixtures/index.php";
}

function deleteConfirm(m_id,m_url) {

    var id = m_id;
    var str_url = m_url;
    var boldelete;
    boldelete = confirm("Are you sure you want to delete fixture ");
    if (boldelete === true) {
        
        $.ajax({
            type: "POST",
            url: str_url ,
            data: {"id": id},
            success: function(data) {
                //$('#info').show();
                $('#info').html(data);
                setTimeout(()=>window.location.reload(),3000);

            }
        });
        
    }
    else{
         alert("Skipped Deleting");
    }
}

function gotoAddRecord() {

    $.ajax({
        type: "GET",
        url: "/fixtures/add_fixture.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
        }
    });

}

function SendMessage() {
    
    var fname = $('#fname').val();
    var subject = $('#subject').val();
    var email = $('#email').val();
    var message = $('#message').val();

    $.ajax({
        type: "POST",
        url: "/includes/contact.inc.php",
        data: { "fname": fname, "subject": subject, "email": email, "message": message },
        success: function(data) {
            $('#info').show();
            $('#info').html(data);
            setTimeout(()=>$('#info').hide(),3000);
            }
    });


}

function gotoPage(pageNum){
  window.location=pageNum;
}

function goBack(){
  window.history.back();
}

function goForward(){
  window.history.forward();
}

function messageClose(){

  window.close();
}
// </script>
