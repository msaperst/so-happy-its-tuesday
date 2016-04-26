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

$new = $_POST ['data'];
// insert the shit_directions table
$sql = "INSERT INTO shit_events 
				( `TITLE`, `DATE`, `TIME`, `LOCATION`, `DESCRIPTION`, `DIRECTIONS` )
			VALUES
				( '" . replaceBadChars ( $new ['title'] ) . "',
				  '" . replaceBadChars ( $new ['date'] ) . "',
				  '" . replaceBadChars ( $new ['time'] ) . "',
				  '" . replaceBadChars ( $new ['location'] ) . "',
				  '" . replaceBadChars ( $new ['description'] ) . "',
				  '" . replaceBadChars ( $new ['directions'] ) . "' )";
echo $sql . "\n";
$result = mysqli_query ( $db, $sql );

exit ();
function replaceBadChars($string) {
    $string = iconv ( 'UTF-8', 'ASCII//TRANSLIT', $string );
    return str_replace ( "'", "&apos;", $string );
    // return addslashes($string);
    return $string;
}
?>