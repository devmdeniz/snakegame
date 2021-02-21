<?php
        include("connection.php");


        $changescore = $_POST["changescore"];
        $changeid = $_POST["changeid"];


        $sql = "UPDATE datas SET datas  = '$changescore' WHERE id = '$changeid' ";

    if ($conn->query($sql) === TRUE) {
        echo "Succesfull UPDATE";
        header("Location: ../index.php");
    } 
    else {
        echo "ERROR: " . $conn->error;
    }



?>