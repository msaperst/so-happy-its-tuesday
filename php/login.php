<?php

require "sql.php";

session_name('shitLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();

if (isset( $_SESSION ) && isset($_SESSION ['id']) && ! isset ( $_COOKIE ['shitRemember'] ) && ! isset($_SESSION ['rememberMe'])) {
    // If you are logged in, but you don't have the tzRemember cookie (browser restart)
    // and you have not checked the rememberMe checkbox:
    
    $_SESSION = array ();
    session_destroy ();
    
    // Destroy the session
}

if ($_POST ['submit'] == 'Logout') {
    $_SESSION = array ();
    session_destroy ();
    exit ();
}

if ($_POST ['submit'] == 'Login') {
    // Checking whether the Login form has been submitted
    
    $err = array ();
    // Will hold our errors
    
    if (! $_POST ['username'] || ! $_POST ['password'])
        $err [] = 'All the fields must be filled in!';
    
    if (! count ( $err )) {
        $_POST ['username'] = mysqli_real_escape_string ( $db, $_POST ['username'] );
        $_POST ['password'] = mysqli_real_escape_string ( $db, $_POST ['password'] );
        $_POST ['rememberMe'] = ( int ) $_POST ['rememberMe'];
        
        // Escaping all input data
        $row = mysqli_fetch_assoc ( mysqli_query ( $db, "SELECT id,usr FROM shit_web_admin WHERE usr='{$_POST['username']}' AND pass='" . md5 ( $_POST ['password'] ) . "'" ) );
        
        if ($row ['usr']) {
            // If everything is OK login
            
            $_SESSION ['usr'] = $row ['usr'];
            $_SESSION ['id'] = $row ['id'];
            $_SESSION ['rememberMe'] = $_POST ['rememberMe'];
            
            // Store some data in the session
            
            setcookie ( 'shitRemember', $_POST ['rememberMe'] );
            // We create the tzRemember cookie
        } else
            $err [] = 'Wrong username and/or password!';
    }
    
    if ($err) {
        $_SESSION ['msg'] ['login-err'] = implode ( '<br />', $err );
        // Save the error messages in the session
        echo $err[0];
    }
    exit ();
}

?>