<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <title>Dućan</title>
  </head>

  <body>
    <header>
      <div class="header-main-div">
        <a href=index.php><h1>LOGO</h1></a>
        <div>
          <form action="pretrazivanje.php" method="GET">
            <input type="text" placeholder="Pretraživanje" name ="search" id="search"/>
            <input type="submit" value="Pretraži" class="search-submit"/>
          </form>
        </div>

        <ul class="header-nav1">
          <?php
            if(!isset($_SESSION)){
              session_start();
            }
            if(isset($_COOKIE["korisnik"])){
              echo "<li><a href=logout.php>LOGOUT</a></li>";
            }
            else{
              echo "<li><a href=login.php>LOGIN</a></li>";
            }

            if(isset($_COOKIE["korisnik"])){
              if($_COOKIE["korisnik"]=="admin"){
                echo'<li><a href="administracija.php">ADMINISTRACIJA</a></li>';
              }              
            }
          ?>
          <li><a href=onama.php>O NAMA</a></li>
          <li><a href="#">KONTAKT</a></li>
          <li><a href=index.php>POČETNA</a></li>
        </ul>

        <?php 
          if(isset($_COOKIE["korisnik"])){
            echo '<p class="current-user">Pozdrav, '.$_COOKIE["korisnik"].'</p>';
          }
          
        ?>

        <nav>
          <ul id="mainNav" style="padding-left:0px">
            <li class="nav-top"><a href="proizvodi.php">PROIZVODI</a></li>
            <li class="nav-top"><a href="kosarica.php">KOŠARICA</a></li>
          </ul>
        </nav>
    </div>

    </header>

    <main>

    <?php
        header('Content-Type: text/html; charset=utf-8');

        if(isset($_GET["search"])){
          $pretrazi=$_GET['search'];

          include_once("database.php");

          $conn= new mysqli($db_location,$db_username,$db_password,$db_name);

          $conn->query("USE ducan");
          $conn->query("SET NAMES 'utf8'");
          $conn->query("CHARSET 'utf8'");
          $rez = $conn->query("SELECT * FROM artikli WHERE naziv LIKE '%$pretrazi%' ORDER BY naziv ASC");

          if($rez->num_rows>0){
            echo'<table class="table-unos">';
            echo'<th><h3>Rezultati pretraživanja. Pronađena su '. mysqli_num_rows($rez).' artikla.</h3></th>';
            while($redak=$rez->fetch_assoc()){
              echo'<tr><td><img src='.$redak["slika"].' width="250"/></td>';
              echo'<td><h2>'.$redak["naziv"].'</h2>';
              echo '<p>'.$redak["sifra"].'</p>';
              echo'<p>Vrsta proizvoda:  '.$redak["vrsta"].'</p>';
              echo nl2br('<p>'.$redak["opis"].'</p>');
              echo'<p>Cijena: '.$redak["cijena"].'kn</p>';
              echo '<a href="proizvod.php?product='.$redak["sifra"].'" class=vise>Više</a>';
            echo'</td></tr>';
            }
            echo "</table>";
          }

          else {
            echo"<p>Nije pronađen niti jedan rezultat</p>";
          }

          $conn->close();
          }
        

        

        ?>

    </main>
  </body>



</html>
