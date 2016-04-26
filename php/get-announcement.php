<?php
require "sql.php";

$id;
// get passed in vars
if (isset ( $_GET ['id'] )) {
    $id = $_GET ['id'];
} else {
    echo "No id provided";
    exit ();
}

$sql = "SELECT * FROM shit_announcements WHERE ID = $id LIMIT 1;";
$result = mysqli_query ( $db, $sql );
$event = mysqli_fetch_assoc ( $result );

echo json_encode ( $event );

?>