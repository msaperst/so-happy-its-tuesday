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
// delete from the shit_directions table
$sql = "DELETE FROM shit_directions WHERE TRL_ID = $id"; 
$result = mysqli_query ( $db, $sql );
// delete from the shit_trails table
$sql = "DELETE FROM shit_trails WHERE ID = $id"; 
$result = mysqli_query ( $db, $sql );
// delete from the shit_hares table
$sql = "DELETE FROM shit_hares WHERE TRL_ID = $id"; 
$result = mysqli_query ( $db, $sql );

exit ();
?>