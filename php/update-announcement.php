<?php

session_name('shitLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();

if (!isset ( $_SESSION ['id'] )) {
    echo "You need to be logged in to perform this action";
    exit();
}

require "sql.php";

$id = $_POST ['id'];
$title = $_POST ['title'];
$description = $_POST ['description'];
$from = $_POST ['from'];
$to = $_POST ['to'];
// update from the shit_announcements table
$sql = "UPDATE shit_announcements SET 
                `TITLE` = '" . replaceBadChars( $title ) . "', 
                `DESCRIPTION` = '" . replaceBadChars( $description ) . "', 
                `FROMDATE` = '" . replaceBadChars( $from ) . "', 
                `TODATE` = '" . replaceBadChars( $to ) . "' 
        WHERE `ID` = $id"; 
$result = mysqli_query ( $db, $sql );

exit ();
function replaceBadChars($string) {
    $string = iconv ( 'UTF-8', 'ASCII//TRANSLIT', $string );
    return str_replace ( "'", "&apos;", $string );
    // return addslashes($string);
    return $string;
}
?>