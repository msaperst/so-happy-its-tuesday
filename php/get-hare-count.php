<?php
require "sql.php";

$id = $_GET ['id'];
$sql = "SELECT * FROM shit_hares JOIN shit_trails ON shit_hares.TRL_ID = shit_trails.ID WHERE shit_hares.HSHR_ID = $id ORDER BY shit_hares.TRL_ID DESC;";
mysqli_set_charset ( $db, "utf8" );
$result = mysqli_query ( $db, $sql );
$rows = array ();
while ( $r = mysqli_fetch_assoc ( $result ) ) {
    $rows [] = $r;
}
print json_encode ( $rows );
?>