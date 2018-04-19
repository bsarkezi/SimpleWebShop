<!Doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
	<title>Dućan - O nama</title>
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
          <ul>
            <li class="nav-top"><a href="unos.php">UNOS</a></li>
            <li class="nav-top"><a href="proizvodi.php">PROIZVODI</a></li>
            <li class="nav-top"><a href="administracija.php">ADMIN</a></li>
            <li class="nav-top"><a href="kosarica.php">KOŠARICA</a></li>
          </ul>
        </nav>
    </div>

    </header>

	<main>
		<h3>O nama:</h3><br/>
		<p>Dobrodošli na stranice naše trgovine. Mi smo informatička trgovina sa sjedištem u Zagrebu koja uspješno posluje već 5 godina.</p><br/>
		<h3>Lokacija:</h3>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d44505.47079443558!2d15.961586820947282!3d45.79940257023424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shr!2shr!4v1490691260716" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
	</main>

    <footer>
      <p>&copy; Borna šarkezi, 2017
    </footer>
  </body>

</html>
