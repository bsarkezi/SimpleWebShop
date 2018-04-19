<?php
    $poruka1 = "Registracija uspješna!";
    header("Refresh: 2; url=login.php");

?>

<!doctype html>

<html>
    <head>
        <title>Registracija uspješna!</title>
        <meta charset ="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>


    <body>
        <script src="skripta.js">
        </script>

        <header>
            <div class="header-main-div">
                <a href=index.php><h1>LOGO</h1></a>
                <div>
                <form action="pretrazivanje.php" method="POST">
                    <input type="text" placeholder="Pretraživanje" name ="search" id="search"/>
                    <input type="submit"/>
                </form>
                </div>

                <ul class="header-nav1">
                <li><a href=onama.html>O NAMA</a></li>
                <li><a href="#">KONTAKT</a></li>
                <li><a href=index.php>POČETNA</a></li>
                </ul>

                <nav>
                <ul>
                    <li class="nav-top"><a href="unos.html">UNOS</a></li>
                    <li class="nav-top"><a href="proizvodi.php">PROIZVODI</a></li>
                    <li class="nav-top"><a href="administracija.php">ADMIN</a></li>
                    <li class="nav-top"><a href="#">KATEGORIJA 4</a></li>
                </ul>
                </nav>
            </div>
        </header>
        
        <main id="success-main">
            <?php echo "<p>".$poruka1."</p>";?>
        </main>
    
    </body>


</html>