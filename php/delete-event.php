<?php

require "sql.php";

$id = $_POST ['id'];
// delete from the shit_events table
$sql = "DELETE FROM shit_events WHERE ID = $id"; 
$result = mysqli_query ( $db, $sql );

exit ();
?>