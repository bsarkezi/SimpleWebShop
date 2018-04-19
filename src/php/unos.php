<!DOCTYPE html>

<html>
  <head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../js/skripta.js"></script>
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
      <form name="unos" action="upload.php" method="POST" enctype="multipart/form-data" id="unos" onsubmit="return unos_provjera()">
        <table class="table-unos">
          <tr>
            <td>Naslov proizvoda:    </td>
            <td><input type="text" name="naziv-proizvoda" id="prodName"><p id="ime-greska"></td>

          </tr>
          <tr>
            <td>Šifra proizvoda: </td>
            <td><input type="text" name="sifra-proizvoda" id="sifra"><p id="sifra-greska"></p>
                </td>
          </tr>

          <tr>
            <td>Vrsta proizvoda: </td>
            <td>
              <select name="vrsta-proizvoda" selected="selected" id="kategorija">
                <option selected disabled></option>
                <option value="Procesor">Procesor</option>
                <option value="Grafička kartica">Grafička kartica</option>
                <option value="Matična ploča">Matična ploča</option>
                <option value="Tvrdi disk">Tvrdi disk</option>
                <option value="Optički uređaj">Optički uređaj</option>
                <option value="Radna memorija">Radna memorija</option>
                <option value="Kućište">Kućište</option>
                <option value="Napajanje">Napajanje</option>
                <option value="Hladnjak za CPU">Hladnjak za CPU</option>
              </select><p id="kat-greska">
            </td>
          </tr>

          <tr>
            <td id="opis-proizvoda">Opis proizvoda:</td>
            <td><textarea rows="10" cols="30" name="opis-proizvoda" id="opis"></textarea><p id="opis-greska"></td>
          </tr>

          <tr>
            <td>Cijena prozvoda:</td>
            <td><input type="text" name="cijena-proizvoda" id="cijena"><p id="cijena-greska"></td>
          </tr>

          <tr>
            <td>Slika proizvoda: </td>
            <td><input type="file" name="fileToUpload"></td>
          </tr>

          <tr>
            <td>Arhiviranje podataka?</td>
            <td><input type="checkbox" name="slanje-podataka" id ="arhiviranje"></td>

          </tr>

          <tr><td><input type="submit" value="Predaj" id="predaj"></td></tr>

        </table>

      </form>



    </main>
    <!--<script src="skripta.js"></script>-->

  </body>



</html>
