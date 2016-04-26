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
// modify number based on 190
if ($new ['trail_id'] > 190) {
    $new ['trail_id'] = $new ['trail_id'] + 1;
}

// insert the shit_directions table
$sql = "INSERT INTO shit_directions 
			( `TRL_ID`, `TIDBIT`, `DIRECTIONS`, `ONONON`, `NOTES`, `ADDRESS`, `MAPLINK` )
		VALUES
			( '" . $new ['trail_id'] . "', 
			  '" . replaceBadChars ( $new ['trail_tidbit'] ) . "',
			  '" . replaceBadChars ( $new ['trail_directions'] ) . "',
			  '" . replaceBadChars ( $new ['ononon'] ) . "',
			  '" . replaceBadChars ( $new ['trail_notes'] ) . "',
			  '" . replaceBadChars ( $new ['trail_address'] ) . "',
			  '" . $new ['trail_maplink'] . "' )";
$result = mysqli_query ( $db, $sql );

// insert the shit_trails table
$sql = "INSERT INTO shit_trails 
			( `ID`, `TITLE`, `LOCATION`, `HASHDATE` )
		VALUES
			( '" . $new ['trail_id'] . "',
			  '" . replaceBadChars ( $new ['trail_title'] ) . "',
			  '" . replaceBadChars ( $new ['trail_location'] ) . "',
			  '" . $new ['trail_date'] . "' )";
$result = mysqli_query ( $db, $sql );

// update the shit_hares table
foreach ( $new ['hares'] as $hare ) {
    $lead = 0;
    // if ( $hare == $new[lead_hare] ) {
    // $lead = 1;
    // }
    $sql = "INSERT INTO shit_hares
				( `TRL_ID`, `HSHR_ID`, `LEAD` )
			VALUES
				( '" . $new ['trail_id'] . "', '$hare', '$lead' )";
    $result = mysqli_query ( $db, $sql );
}
exit ();
function replaceBadChars($string) {
    $string = iconv ( 'UTF-8', 'ASCII//TRANSLIT', $string );
    return str_replace ( "'", "&apos;", $string );
    // return addslashes($string);
    return $string;
}
?>