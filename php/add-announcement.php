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

$title = $_POST ['title'];
$description = $_POST ['description'];
$from = $_POST ['from'];
$to = $_POST ['to'];
// insert the shit_directions table
$sql = "INSERT INTO shit_announcements 
				( `TITLE`, `DESCRIPTION`, `FROMDATE`, `TODATE` )
			VALUES
				( '" . replaceBadChars ( $title ) . "',
				  '" . replaceBadChars ( $description ) . "',
				  '$from',
				  '$to' )";
// echo $sql . "\n";
$result = mysqli_query ( $db, $sql );
$last_id = mysqli_insert_id ( $db );
echo $last_id;

exit ();
function replaceBadChars($string) {
    $string = iconv ( 'UTF-8', 'ASCII//TRANSLIT', $string );
    return str_replace ( "'", "&apos;", $string );
    // return addslashes($string);
    return $string;
}
?>