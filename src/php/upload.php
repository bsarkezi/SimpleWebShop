<html>
  <head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
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
            <li class="nav-top"><a href="unos.php">UNOS</a></li>
            <li class="nav-top"><a href="proizvodi.php">PROIZVODI</a></li>
            <li class="nav-top"><a href="administracija.php">ADMIN</a></li>
            <li class="nav-top"><a href="kosarica.php">KOŠARICA</a></li>
          </ul>
        </nav>
    </div>

    </header>

    <main>

    <?php
    header('Content-Type: text/html; charset=utf-8');


      $ime_proizvoda=$_POST['naziv-proizvoda'];
      $sifra_proizvoda=$_POST['sifra-proizvoda'];
      $vrsta_proizvoda=$_POST['vrsta-proizvoda'];
      $opis_proizvoda=$_POST['opis-proizvoda'];
      $cijena_proizvoda=$_POST['cijena-proizvoda'];
      $arhiviranje = isset($_POST['slanje-podataka']);

      /*-------------------------FILE UPLOAD-----------------------------*/


      $dir_odrediste = "../../uploads/";
      $datoteka = $dir_odrediste . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $duplikat = 0;
      $dat_vrsta = pathinfo($datoteka,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image

      /*
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "Datoteka nije fileToUpload";
              $uploadOk = 0;
          }
      }
      */
      // Provjera da li je odabrana fileToUpload vec postojeca u "upload" direktoriju
      if (file_exists($datoteka)) {
          //echo"Slika već postoji, dodatan upload nije bio potreban";
          $uploadOk=0;
          $duplikat = 1;
      }

      // Provjeravanje da li je fileToUpload duplikat te da li doslo do problema kod uploada
      if ($uploadOk == 0 && $duplikat==0) {
          echo "Upload slike nije uspio";
      // if everything is ok, try to upload file
      }
      else if($uploadOk==1 && $duplikat==0){
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $datoteka)) {

          }
          else {
              echo "Upload slike nije uspio.";
          }
      }

      /*--------------------------------------------*/




      echo'<table class="table-unos">';
        echo'<tr>';
          echo'<td><img src='.$datoteka.' width="250"/></td>';
          echo'<td><h2>'.$ime_proizvoda.'</h2>';
          echo '<p>'.$sifra_proizvoda.'</p>';
          echo'<p>Vrsta proizvoda:  '.$vrsta_proizvoda.'</p>';
          echo nl2br('<p>'.$opis_proizvoda.'</p>');
          echo'<p>Cijena: '.$cijena_proizvoda.'kn</p>';
        echo'</td></tr>';

        echo'<tr><td><a href="unos.html"><br/>Unos novog proizvoda</a></td></tr>';


        include_once("database.php");

        $conn= new mysqli($db_location,$db_username,$db_password,$db_name);

        $conn->query("USE ducan");

        $conn->query("SET NAMES 'utf8'");
        $conn->query("CHARSET 'utf8'");

        $conn->query("INSERT INTO artikli(naziv,sifra,vrsta,slika, opis,cijena, arhiviranje)
        VALUES('$ime_proizvoda','$sifra_proizvoda','$vrsta_proizvoda','$datoteka','$opis_proizvoda','$cijena_proizvoda','$arhiviranje')");

        $conn->close();

        ?>

    </main>
  </body>



</html>
