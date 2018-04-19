<!Doctype html>
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
            <li class="nav-top"><a href="unos.php">UNOS</a></li>
            <li class="nav-top"><a href="proizvodi.php">PROIZVODI</a></li>
            <li class="nav-top"><a href="kosarica.php">KOŠARICA</a></li>
          </ul>
        </nav>
    </div>

    </header>


    <main class="push-footer-down">


      <div class="clear">
      </div>
      <div>
        <aside>
          <table>
            <tr><th>Izdvojeno iz ponude</th></tr>
              <tr>
                <td>
                  <article>
                    <img src=../../res/ryzen.jpg width="200" alt="ponuda-ryzen"/> <br/>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="vise">VIŠE</a>
                  </article>
                </td>
            </tr>

            <tr>
              <td>
                <article>
                  <img src=../../res/ryzen.jpg width="200" alt="ponuda-ryzen"/> <br/>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  <a href="#" class="vise">VIŠE</a>
                </article>
              </td>
            </tr>

            <tr>
              <td>
                <article>
                  <img src=../../res/ryzen.jpg width="200" alt="ponuda-ryzen"/> <br/>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  <a href="#" class="vise">VIŠE</a>
                </article>
              </td>
            </tr>
          </table>
        </aside>

        <section>
			<?php
				include_once("database.php");

				$conn= new mysqli($db_location,$db_username,$db_password,$db_name);

				$conn->query("USE ducan;");
				$conn->query("SET NAMES 'utf8';");
				$conn->query("CHARSET 'utf8';");

				$rez=$conn->query("SELECT * FROM artikli LIMIT 15;");

				if($rez->num_rows>0){
					while($redak=$rez->fetch_assoc()){
						echo '
						<article class="main-content-article">
						<img src="'.$redak["slika"].'" width="200" height="133" alt="'.$redak["naziv"].'"/>
						<p>'.$redak["naziv"].'</p>
						<p>Cijena: '.$redak["cijena"].' HRK</p>
						<a href="proizvod.php?product='.$redak["sifra"].'" class="vise">VIŠE</a>
					  </article>';
					}
				}
				
			?>
		  <!--
          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
          </article>

          <article class="main-content-article">
            <img src=res/rx480-box.jpg width="200" alt="ponuda-gpu"/>
            <p>Lorem ipsum dolor sit amet</p>
            <p>Cijena: </p>
            <a href="#" class="vise">VIŠE</a>
		  </article>
-->



        </section>
      </div>
    </main>

    <footer>
      <p>&copy; Borna šarkezi, 2017
    </footer>
  </body>

</html>
