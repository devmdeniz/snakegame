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
  

    <?php
    ?>
    
    
    <script>
      class SnakeGame {
       constructor() {
    this.canvas = document.getElementById('game');
    this.context = this.canvas.getContext('2d');
    
    // Basılan tuşları algılıyoruz:
    document.addEventListener('keydown', this.onKeyPress.bind(this));
  }

  init() {
    // Yeni oyun için ilk değer atamaları:
    this.positionX = this.positionY = 10;
    this.appleX = this.appleY = 5;
    this.tailSize = 5;
    this.trail = [];
    this.gridSize = this.tileCount = 20;
    this.velocityX = this.velocityY = 0;
    this.isdead = false;

    this.timer = setInterval(this.loop.bind(this), 1000 / 5);
  }

  reset() {
    // Oyun göngüsünü durdur:
    clearInterval(this.timer);
    this.isdead = false;
    
    // Oyun ile alakalı detayları en baştaki haline geri döndür:
    this.init();
  }

  // Oyun döngümüz
  loop() {
    // Matematiksel hesaplamaları yap:
    this.update();
    
    // Sonrasında ekrana çizimi gerçekleştir
    this.draw();
    

  }

  update() {
    // Yılanın başını X ve Y koordinat düzleminde gittiği yöne hareket ettir
    this.positionX += this.velocityX;
    this.positionY += this.velocityY;

    // Yılan sağ, sol, üst ya da alt kenarlara değdi mi?
    // Değdiyse ekranın diğer tarafından devam ettir
    if (this.positionX < 0) {
      this.positionX = this.tileCount - 1;
    } else if (this.positionY < 0) {
      this.positionY = this.tileCount - 1;
    } else if (this.positionX > this.tileCount - 1) {
      this.positionX = 0;
    } else if (this.positionY > this.tileCount - 1) {
      this.positionY = 0;
    }

    // Yılan kendi üstüne bastı mı?
    this.trail.forEach(t => {
      if (this.positionX === t.positionX && this.positionY === t.positionY) {
        this.reset();
        
      }
    });

    // Yılanın başını yılanın herbir karesini hafızada tuttuğumuz diziye koy
    this.trail.push({positionX: this.positionX, positionY: this.positionY});

    // Yılanın başını hareket ettirdik, şimdi kuyruktan kırpmamız gerekiyor
    while (this.trail.length > this.tailSize) {
      this.trail.shift();
    }

    // Yılan elma yedi mi?
    if (this.appleX === this.positionX && this.appleY === this.positionY) {
      // Yediyse yılanın boyutu uzat:
      this.tailSize++;
      
      // Ekrana yeni bir elma koymak lazım.
      // Rasgele X ve Y koordinatı üretip oraya elmayı atalım:
      this.appleX = Math.floor(Math.random() * this.tileCount);
      this.appleY = Math.floor(Math.random() * this.tileCount);
    }
  }

  // Ekrana çizim gerçekleştiriyor:
  draw() {
    // İlk olarak siyah arkaplanı çiziyoruz
    this.context.fillStyle = 'black';
    this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);

    // Skoru ekranın sol üst köşesine yazdıralım
    this.context.fillStyle = 'white';
    this.context.font = '20px Arial';
    this.context.fillText(this.tailSize - 5, 20, 40);

    // Yılanın herbir karesini sırayla ekrana çiziyoruz
    this.context.fillStyle = 'yellow';
    this.trail.forEach(t => {
      this.context.fillRect(t.positionX * this.gridSize, t.positionY * this.gridSize, this.gridSize - 5, this.gridSize - 5);
    });

    // Son olarak elmayı ekrana çizdirelim:
    this.context.fillStyle = 'pink';
    this.context.fillRect(this.appleX * this.gridSize, this.appleY * this.gridSize, this.gridSize - 5, this.gridSize - 5);
  }

  // Kullanıcı websayfasındayken bir tuşa bastığında çağrılıyor:
  onKeyPress(e) {
    // Kullanıcı sol oka bastı, yılan sağa gitmiyorsa yılanı sola döndür
    if (e.keyCode === 65 && this.velocityX !== 1) {
      this.velocityX = -1;
      this.velocityY = 0;
    }
    
    // Kullanıcı yukarı oka bastı, yılan aşağı gitmiyorsa yılanı yukarı döndür
    else if (e.keyCode === 87 && this.velocityY !== 1) {
      this.velocityX = 0;
      this.velocityY = -1;
    }
    
    // Kullanıcı sağ oka bastı, yılan sola gitmiyorsa yılanı sağa döndür
    else if (e.keyCode === 68 && this.velocityX !== -1) {
      this.velocityX = 1;
      this.velocityY = 0;
    }
    
    // Kullanıcı aşağı oka bastı, yılan yukarı gitmiyorsa yılanı aşağı döndür
    if (e.keyCode === 83 && this.velocityY !== -1) {
      this.velocityX = 0
      this.velocityY = 1;
    }
  }
        

}

// Yeni oyun oluştur:
const game = new SnakeGame();
  
            

      
      
// Sayfa yüklendiğinde oyunu oynanabilir hale getir:
window.onload = () => game.init();
    </script>
    <script src="main.js"></script>
  </body>
</html>
