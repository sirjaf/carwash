function getAdmin() {

    $.ajax({
        type: "GET",
        url: "/admin.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
        }
    });

}

function getFixtures() {

    $.ajax({
        type: "GET",
        url: "/fixtures/index.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
        }
    });

}

function getLogin() {

    $.ajax({
        type: "GET",
        url: "/users/login.php",
        data: {},
        success: function(data) {
            $('#content-table').html(data);
        }
    });

}