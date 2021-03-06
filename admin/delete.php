<?php?>

<head>
	<link rel="stylesheet" href="css/delete.css">
</head>


<form action = "system/delete.php" method = "post">
  <div class="form-group">
    <label for="exampleInputEmail1">Delete Score</label>
	<br>
	<input pattern="\d*" type="text" placeholder="Score ID" name="deletescore">
  </div>
  <button type="submit" class="btn btn-primary">Delete Score</button>
</form>  
