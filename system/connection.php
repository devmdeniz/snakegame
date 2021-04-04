<?php

$servername="localhost";
$database = "scoreboard";
$username = "root";
$password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn) {
        die("Database Connection Failed" . mysqli_connect_error());
    }

?>
