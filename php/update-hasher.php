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

$hasher = $_POST ['data'];

// if the hasher did exist, delete him
if (isset ( $hasher ['id'] )) {
    $sql = "UPDATE shit_hashers SET
                `hashname` = '" . replaceBadChars ( $hasher ['hashname'] ) . "',
                `nerdname` = '" . replaceBadChars ( $hasher ['nerdname'] ) . "',
                `email` = '" . $hasher ['email'] . "',
                `address` = '" . replaceBadChars ( $hasher ['address'] ) . "',
                `city` = '" . $hasher ['city'] . "',
                `state` = '" . $hasher ['state'] . "',
                `zip` = '" . $hasher ['zip'] . "',
                `phone` = '" . $hasher ['phone'] . "'
        WHERE `ID` = " . $hasher ['id'];
    echo $sql;
    $result = mysqli_query ( $db, $sql );
} else { // add hasher
    $sql = "INSERT INTO shit_hashers
			( `hashname`, `nerdname`, `email`, `address`, `city`, `state`, `zip`, `phone` )
		VALUES
			( '" . replaceBadChars ( $hasher ['hashname'] ) . "', '" . replaceBadChars ( $hasher ['nerdname'] ) . "', '" . $hasher ['email'] . "', '" . replaceBadChars ( $hasher ['address'] ) . "', '" . $hasher ['city'] . "', '" . $hasher ['state'] . "', '" . $hasher ['zip'] . "', '" . $hasher ['phone'] . "' )";
    echo $sql;
    $result = mysqli_query ( $db, $sql );
}

exit ();
function replaceBadChars($string) {
    $string = iconv ( 'UTF-8', 'ASCII//TRANSLIT', $string );
    return addslashes( $string );
    // return addslashes($string);
    return $string;
}
?>