<?php
    $db = mysqli_connect("localhost", "jackschitt", "SoHappyItsTuesday","so-happy-its-tuesday");
    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>
