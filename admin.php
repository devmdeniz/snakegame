<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/admin.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

<div class="flex-container">
  <div><h3 style = "margin-left: 15px;"><a href="system/determination.php?mode=dashboard">Dashboard</a></h3></div>
  <div><h3 style = "margin-left: 25px;"><a href= "system/determination.php?mode=update">Update</a></h3></div>
  <div><h3 style = "margin-left: 25px;"><a href= "system/determination.php?mode=delete">Delete</a></h3></div>  
</div>

<div class="main">
	<?php
	
	if($_SESSION["mode"] == "dashboard") {
		include("admin/dashboard.php");
	} else if ($_SESSION["mode"] == "update") {
		include("admin/update.php");
	} else {
		include("admin/delete.php");
	}

	?>
</div>
<details>
<summary>Datas on database</summary>
<?php
            include("system/connection.php");

          $id = $conn -> query("SELECT * FROM datas ORDER BY id DESC LIMIT 1");
            $outputs = $id->fetch_array();
        
                $maxnumber = $outputs["id"];
                $minnumber = 1;
                while($minnumber <= $maxnumber){
                $sorgu = $conn -> query("SELECT datas FROM datas WHERE id=$minnumber ORDER BY datas DESC ");    
                        $output = $sorgu->fetch_array();
                        echo
                         "<tr>" .
                         "<th class='datas white'>" .
                         $output["datas"] .
                         " - [$minnumber] -" .
                         "</th>" .
                         "</tr>";
                        $minnumber++;
                    }
        
        
?>

</details>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>