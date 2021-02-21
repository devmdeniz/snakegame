<?php
    include("connection.php");
    


    $cp = $_POST["score"];

            $sql = "INSERT INTO datas (datas) VALUES ('$cp')";

        if(mysqli_query($conn, $sql)) {
			echo "successfull";
			header("Location: ../index.php");
        } else {
            echo mysqli_error($conn);
}           
?>