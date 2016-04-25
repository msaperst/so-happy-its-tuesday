<?php
require "sql.php";

$start = 0;
$end = 999999999999999999;
if (isset ( $_GET ['start'] )) {
    $start = $_GET ['start'];
}
if (isset ( $_GET ['end'] )) {
    $end = $_GET ['end'];
}

$events = array ();

// our trails
$sql = "SELECT ID, LOCATION, HASHDATE, TITLE, HARESTR FROM shit_trails WHERE DATE(HASHDATE) >= '$start' and DATE(HASHDATE) <= '$end' ORDER BY HASHDATE ASC";
$result = mysqli_query ( $db, $sql );
while ( $row = mysqli_fetch_array ( $result ) ) {
    $id = "XXX";
    $number = "XXX";
    $title = "TBD";
    $hares = "TBD";
    $location = "TBD";
    $date = "TBD";
    
    if ($row ["ID"] != "") {
        $id = $row ["ID"];
        $number = $row ["ID"];
        if ($row ["ID"] > 190) {
            $number --;
        }
    }
    if ($row ["TITLE"] != "") {
        $title = $row ["TITLE"];
    }
    if ($row ["HARESTR"] != "") {
        $hares = $row ["HARESTR"];
    }
    if ($row ["LOCATION"] != "") {
        $location = $row ["LOCATION"];
    }
    if ($row ["HASHDATE"] != "") {
        $date = $row ["HASHDATE"];
        $date = mktime ( 0, 0, 0, substr ( $date, 5, 2 ), substr ( $date, 8, 2 ), substr ( $date, 0, 4 ) );
        $daytime = $row ["HASHDATE"];
        $date = date ( 'F j, Y', $date );
    }
    
    $trail = array ();
    $trail ['title'] = "Trail $number: $title";
    $trail ['start'] = $daytime . "T19:00:00";
    $trail ['end'] = $daytime . "T22:00:00";
    $trail ['type'] = "t";
    $trail ['lookup_id'] = $id;
    array_push ( $events, $trail );
}

// our events
$sql = "SELECT * FROM shit_events WHERE DATE(DATE) >= '$start' AND DATE(DATE) <= '$end' ORDER BY DATE ASC;";
$result = mysqli_query ( $db, $sql );
while ( $row = mysqli_fetch_array ( $result ) ) {
    $id = "XXX";
    $title = "TBD";
    $date = "TBD";
    $time = "TBD";
    $location = "TBD";
    $description = "TBD";
    $directions = "TBD";
    
    if ($row ["ID"] != "") {
        $id = $row ["ID"];
    }
    if ($row ["TITLE"] != "") {
        $title = $row ["TITLE"];
    }
    if ($row ["DATE"] != "") {
        $date = $row ["DATE"];
        $date = mktime ( 0, 0, 0, substr ( $date, 5, 2 ), substr ( $date, 8, 2 ), substr ( $date, 0, 4 ) );
        $daytime = $row ["DATE"];
        $date = date ( 'F j, Y', $date );
    }
    if ($row ["TIME"] != "") {
        $time = $row ["TIME"];
    }
    if ($row ["LOCATION"] != "") {
        $location = $row ["LOCATION"];
    }
    if ($row ["DESCRIPTION"] != "") {
        $description = $row ["DESCRIPTION"];
    }
    if ($row ["DIRECTIONS"] != "") {
        $directions = $row ["DIRECTIONS"];
    }
    
    $event = array ();
    $event ['title'] = "$title";
    $event ['start'] = $daytime."T".$time;
    $event ['type'] = "e";
    $event ['lookup_id'] = $id;
    array_push ( $events, $event );
}

echo json_encode ( $events );

?>