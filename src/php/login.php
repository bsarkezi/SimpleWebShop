<?php 
    include("login_skripta.php");

?>

<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../css/style_forme.css" />
        <script src="../js/skripta.js"></script>
        <title>Administracija</title>
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

        
        <main >
            
            <div id="login-main">
                <?php 
                    if(isset($_COOKIE["korisnik"])){
                        echo '<p id="logged-in-err">Već ste ulogirani kao: '.$_COOKIE["korisnik"]."<br/>";
                        echo '<a href="logout.php">Logout</a/></p>';
                    }
                    else{
                        echo'
                        <form action ="" method ="POST" enctype="multipart/form-data" id="form-login" name="login-form" onsubmit="return login_provjera();">
                        <table>
                            <tbody>
                                <tr>
                                    <td><p>Korisničko ime:</p></td>
                                    <td><input type="text" name="korIme" size="20" id="korIme"/></td>
                                </tr>
                                <tr><td></td><td><p id="err-usr"></p></td></tr>
                                <tr>
                                    <td><p>Lozinka:   </p></td>
                                    <td><input type="password" name="lozinka" size="20" id ="lozinka"/></td>
                                </tr>
                                <tr><td></td><td><p id="err-pass"></p></td></tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Login" name="login" id="login-submit"/>
                                        <a href="registracija.php">Registracija</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td><td><p id="greska">'.$greska.'</p></td></tr>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </form>
                        ';
                    }
                ?>
                
            </div>
        </main>
        

    </body>


</html>