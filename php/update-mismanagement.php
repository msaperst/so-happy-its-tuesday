<?php
session_name ( 'shitLogin' );
// Starting the session

session_set_cookie_params ( 2 * 7 * 24 * 60 * 60 );
// Making the cookie live for 2 weeks

session_start ();

if (! isset ( $_SESSION ['id'] )) {
    echo "You need to be logged in to perform this action";
    exit ();
}

require "sql.php";

if (isset ( $_POST ['mismanagement'] )) {
    // delete our old MM information
    $sql = "truncate shit_mismanagement";
    echo "$sql\n";
    $result = mysqli_query ( $db, $sql );
    
    // add in our new ones
    $mismanagement = $_POST ['mismanagement'];
    foreach ( $mismanagement as $position => $hashers ) {
        foreach ( $hashers as $hasher ) {
            $sql = "INSERT INTO shit_mismanagement ( `POSITION`, `hshr_id` ) VALUES ( '".replaceBadChars($position)."', '$hasher' );";
            echo "$sql\n";
            $result = mysqli_query ( $db, $sql );
        }
    }
}
exit ();
function replaceBadChars($string) {
    $string = iconv ( 'UTF-8', 'ASCII//TRANSLIT', $string );
    return str_replace ( "'", "&apos;", $string );
    // return addslashes($string);
    return $string;
}
?>