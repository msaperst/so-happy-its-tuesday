$(document).ready(function() {

    $('#login-button').click(function() {
        $('#login-container').show();
    });
    $('#login-div-close-div').click(function() {
        $('#login-container').hide();
    });
    $('#bad-login-ui-close-div').click(function() {
        $('#bad-login-ui').hide();
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
            } else {
                $('#bad-login-ui').show();
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