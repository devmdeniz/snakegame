<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Snake Game</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <canvas id="game" class="marginleft" width="400" height="400"></canvas>


        <details class="marginleft">
        <summary class= "white">Scores </summary>
            <table>
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
            </table>
    </details>


    <form action="system/insert.php" method="post">
      <input pattern="\d*" type="text" placeholder="Enter the Score" name="score" required>
      <button type="submit">Save Score</button>
      </form>
    

    <form action="system/delete.php" method="post">
        <input pattern="\d*" type="text" placeholder="Score ID" name="deletescore">
        <button type="submit">Delete Score</button>
  </form>

  <form action="system/edit.php" method="post">
            <input pattern="\d*" type="text" placeholder="Change Score" name="changescore">
            <input type="text" placeholder="ID" name="changeid">
        <button type="submit">Change Score By ID</button>
                  </form>

        <form action="system/insertbyid.php" method="post">
            <input pattern="\d*" type="text" placeholder="Create Score" name="score">
            <input type="text" placeholder="ID" name="createid">
        <button type="submit">Create Score By ID</button>
                  </form>

    
    
    <script src="js/game.js"></script>
    <script src="main.js"></script>
  </body>
</html>
