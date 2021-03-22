<?php

$servername="sql310.epizy.com";
$database = "epiz_28206571_scoreboard";
$username = "epiz_28206571";
$password = "2qTnOREiKx";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn) {
        die("Database Connection Failed" . mysqli_connect_error());
    }

?>
