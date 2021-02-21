<?php

    include("connection.php");

$delete = $_POST["deletescore"];

$sqlquery = "DELETE FROM datas WHERE id = '$delete'";

    if ($conn->query($sqlquery) === TRUE) {
        echo "Succesfull DELETE";
        header("Location: ../index.php");
    } 
    else {
        echo "ERROR: " . $conn->error;
    }






?>