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
// modify number based on 190
if ($new ['trail_id'] > 190) {
    $new ['trail_id'] = $new ['trail_id'] + 1;
}

// update the shit_directions table
$sql = "UPDATE shit_directions SET
                `TRL_ID` = '" . $new ['trail_id'] . "',
                `TIDBIT` = '" . replaceBadChars ( $new ['trail_tidbit'] ) . "',
                `DIRECTIONS` = '" . replaceBadChars ( $new ['trail_directions'] ) . "',
                `ONONON` = '" . replaceBadChars ( $new ['ononon'] ) . "',
                `NOTES` = '" . replaceBadChars ( $new ['trail_notes'] ) . "',
                `ADDRESS` = '" . replaceBadChars ( $new ['trail_address'] ) . "',
                `MAPLINK` = '" . $new ['trail_maplink'] . "'
        WHERE `TRL_ID` = $orig";
$result = mysqli_query ( $db, $sql );

// update the shit_trails table
$sql = "UPDATE shit_trails SET
                `ID` = '" . $new ['trail_id'] . "',
                `TITLE` = '" . replaceBadChars ( $new ['trail_title'] ) . "',
                `LOCATION` = '" . replaceBadChars ( $new ['trail_location'] ) . "',
                `HASHDATE` = '" . $new ['trail_date'] . "'
        WHERE `ID` = $orig";
$result = mysqli_query ( $db, $sql );

// update the shit_hares table
$sql = "DELETE FROM shit_hares WHERE `TRL_ID` = $orig";
$result = mysqli_query ( $db, $sql );
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