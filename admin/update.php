<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

<form style = "margin-left: 250px" action = "system/edit.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Change Score</label>
    <input type="text" class="form-control" name = "changescore" aria-describedby="emailHelp" placeholder="Enter Score">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">By ID</label>
    <input type="text" class="form-control"  name = "changeid" placeholder="Enter ID">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>