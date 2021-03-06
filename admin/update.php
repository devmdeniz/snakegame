<?php
?>


<head>
	<link rel="stylesheet" href="css/update.css">
</head>


<form action = "system/edit.php">
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
