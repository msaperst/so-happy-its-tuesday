<?php
    require "sql.php";
    
	$id=$_GET['id'];
	$sql = "select * from shit_hashers where `ID` = '$id'";
	$result = mysqli_query($db, $sql);
	$rows = array();
	$row = mysqli_fetch_assoc($result);
	print json_encode( $row );
?>