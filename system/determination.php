<?php
session_start();

echo $_GET["mode"];

$_SESSION["mode"] = $_GET["mode"]; 

echo $_SESSION["mode"];

header("Location: ../admin.php")


?>