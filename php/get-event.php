<?php
require "sql.php";

$id;
$type;
// get passed in vars
if (isset ( $_GET ['id'] )) {
    $id = $_GET ['id'];
} else {
    echo "No id provided";
    exit ();
}
if (isset ( $_GET ['type'] )) {
    $type = $_GET ['type'];
} else {
    echo "No type provided";
    exit ();
}

if ($type == "t") { // our trails
    $sql = "SELECT * FROM shit_trails WHERE ID = $id LIMIT 1;";
    $result = mysqli_query ( $db, $sql );
    $event = mysqli_fetch_assoc ( $result );
    
    $sql = "SELECT * FROM shit_directions WHERE TRL_ID = $id LIMIT 1;";
    $result = mysqli_query ( $db, $sql );
    $event = array_merge ( $event, mysqli_fetch_assoc ( $result ) );
    
    //fix the date
    $date = $event ["HASHDATE"];
    $date = mktime ( 0, 0, 0, substr ( $date, 5, 2 ), substr ( $date, 8, 2 ), substr ( $date, 0, 4 ) );
    $event ['date'] = date ( 'F j, Y', $date );
    
    // get hare details
    $sql = "SELECT c.HASHNAME FROM shit_hares b, shit_hashers c WHERE b.trl_id = $id AND b.hshr_id = c.id";
    $result = mysqli_query ( $db, $sql );
    if ($row = mysqli_fetch_array ( $result )) {
        do {
            $hares [] = $row ["HASHNAME"];
        } while ( $row = mysqli_fetch_array ( $result ) );
        $event ['hares'] = $hares;
    }
} elseif ($type == "e") { // our events
    $sql = "SELECT * FROM shit_events WHERE ID = $id LIMIT 1;";
    $result = mysqli_query ( $db, $sql );
    $event = mysqli_fetch_assoc ( $result );
    
    //fix the date
    $date = $event ["DATE"];
    $date = mktime ( 0, 0, 0, substr ( $date, 5, 2 ), substr ( $date, 8, 2 ), substr ( $date, 0, 4 ) );
    $event ['date'] = date ( 'F j, Y', $date );
} else {
    echo "Bad type provided";
    exit ();
}

echo json_encode ( $event );

?>