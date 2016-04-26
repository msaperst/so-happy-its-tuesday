<?php

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