<?php
    include("connection.php");
    

	$createid = $_POST["createid"];
    $cp = $_POST["score"];

            $sql = "INSERT INTO datas (id, datas) VALUES ($createid, '$cp')";

        if(mysqli_query($conn, $sql)) {
			echo "successfull";
			header("Location: ../index.php");
        } else {
            echo mysqli_error($conn);
}           



?>