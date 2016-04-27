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

$orig = $_POST ['origid'];
$new = $_POST ['data'];
// update the shit_events table
$sql = "UPDATE shit_events SET
                `TITLE` = '" . replaceBadChars ( $new ['title'] ) . "',
                `DATE` = '" . replaceBadChars ( $new ['date'] ) . "',
                `TIME` = '" . replaceBadChars ( $new ['time'] ) . "',
                `LOCATION` = '" . replaceBadChars ( $new ['location'] ) . "',
                `DESCRIPTION` = '" . replaceBadChars ( $new ['description'] ) . "',
                `DIRECTIONS` = '" . replaceBadChars ( $new ['directions'] ) . "'
        WHERE `ID` = $orig";
$result = mysqli_query ( $db, $sql );

exit ();
function replaceBadChars($string) {
    $string = iconv ( 'UTF-8', 'ASCII//TRANSLIT', $string );
    return str_replace ( "'", "&apos;", $string );
    // return addslashes($string);
    return $string;
}
?>