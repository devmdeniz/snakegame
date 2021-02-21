<?php
    include("connection.php");
    


	$id = $conn -> query("SELECT * FROM datas ORDER BY id DESC LIMIT 1");
	$outputs = $id->fetch_array();

		$maxnumber = $outputs["id"];
		$number = $maxnumber + 1;

    $cp = $_POST["score"];

            $sql = "INSERT INTO datas (id, datas) VALUES ($number, '$cp')";

        if(mysqli_query($conn, $sql)) {
			echo "successfull";
			header("Location: ../index.php");
        } else {
            echo mysqli_error($conn);
}           
?>