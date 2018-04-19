<!doctype html>
<?php
    include("reg_skripta.php");
?>
<!doctype html>
<html>
    <head>
        <title>Registracija</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style_forme.css" />
        
    </head>


    <body>
        <script src="skripta.js">
        </script>

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

        <main >
            <div id="reg-main">
                <form action = "" method ="POST" enctype="multipart/form-data" id="form-reg" name="reg-form" onsubmit="return reg_provjera();">
                    <table>
                        <tbody>
                            <tr>
                                <td>Ime: </td>
                                <td><input type="text" name="ime" size="20" id="ime"/></td>
                            </tr>
                            <tr><td></td><td><p id='err-ime'></p></td></tr>                  

                            <tr>
                                <td>Korisničko ime: </td>
                                <td><input type="text" name="korIme" size="20" id="korIme"/></td>
                            </tr>
                            <tr><td></td><td><?php echo"<p id='err-user'>". $greska_usr . "</p>";?></td></tr>

                            <tr>
                                <td>Lozinka: </td>
                                <td><input type="password" name="password" size="20" id="pass"/></td>
                            </tr>
                            <tr><td></td><td><?php echo"<p id='err-pass'>". $greska_pass . "</p>";?></td></tr>
                            
                            <tr>
                                <td>Ponovi lozinku: </td>
                                <td><input type="password" name="passConfirm" size="20" id="passConfirm"/></td>
                            </tr>
                            <tr><td></td><td><?php echo"<p id='err-pass-conf'>". $greska_passRepeat . "</p>";?></td></tr>

                            <tr>
                                <td colspan="2">
                                    <p>Slažem se s uvjetima korištenja  <input type="checkbox" name ="eula" value="eula" id="eula"/></p>
                                </td>

                            </tr>
                            <tr><td></td><td><p id='err-eula'></p></td></tr>

                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Registriraj se!"/>
                                </td>
        
                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>
        </main>


    </body>



</html>