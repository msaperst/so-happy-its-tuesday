<?php

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