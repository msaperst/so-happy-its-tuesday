$(document).ready(function() {

    $('#login-button').click(function() {
        $('#login-container').show();
    });

    $('#login-submit').click(function() {
        $.post("php/login.php", {
            username : $('#userName').val(),
            password : $('#userPassword').val(),
            rememberMe : "true",
            submit : "Login"
        }).done(function(data) {
            $('#login-error').html(data);
            if(data == "") {
                $('#login-message').html("Successfully Logged In");
                location.reload();
            }
        });
    });
    
    $('#logout-button').click(function() {
        $.post("php/login.php", {
            submit : "Logout"
        }).done(function(data) {
            location.reload();
        });
    });

});