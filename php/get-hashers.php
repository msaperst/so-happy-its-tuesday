<?php
    require "sql.php";
    
	$keyword=$_GET['keyword'];
	$sql = "select id, hashname from shit_hashers where `hashname` like '%$keyword%'";
	$result = mysqli_query($db, $sql);
	$rows = array();
	while($r = mysqli_fetch_row($result)) {
		$rows[$r[0]] = $r[1];
	}
	print json_encode( $rows );
?>