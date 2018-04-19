<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <title>Dućan</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/script_basket.js"></script>
            
        
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

        <main>
            <?php 
                include_once("database.php");

                $conn= new mysqli($db_location,$db_username,$db_password,$db_name);

                $conn->query("USE ducan");
                $conn->query("SET NAMES 'utf8'");
                $conn->query("CHARSET 'utf8'");
                        
                $stmt = $conn->prepare("SELECT * FROM artikli WHERE sifra = ?");
                $stmt->bind_param("s",$proizvod);
                $proizvod = $_GET["product"];
                $stmt->execute();
                $rez = $stmt->get_result();
                if($rez->num_rows>0){
                    while($redak=$rez->fetch_assoc()){
                        echo'<table class="table-unos">';
                        echo'<tr>';
                        echo'<td><img src="'.$redak["slika"].'" width="250"/></td>';
                        echo'<td><h2>'.$redak["naziv"].'</h2>';
                        echo '<p id="sifra">'.$redak["sifra"].'</p>';
                        echo'<p>Vrsta proizvoda:  '.$redak["vrsta"].'</p>';
                        echo nl2br('<p>'.$redak["opis"].'</p>');
                        echo'<p>Cijena: '.$redak["cijena"].'kn</p>';
                        echo'</td></tr><tr><td>';
                    }
                }
                else{
                    echo "Navedeni proizvod ne postoji.";
                }
                $stmt->close();
                $conn->close();
                echo'<button id="dodaj">Dodaj u košaricu</button>';
            ?>
            
        </main>
    </body>



</html>