<?php
    require "sql.php";
    
	$sql = "SELECT MAX(id) FROM  `shit_trails` WHERE 1";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	echo $row['MAX(id)'];
?>