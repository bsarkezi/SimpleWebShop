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
                <a href="index.php"><h1>LOGO</h1></a>
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

        <main class="push-footer-down">
            <?php
                include_once("kosarica_receive.php");
                
                
                
                if(isset($_SESSION["artikli"]) && count($_SESSION["artikli"])>0){

                    include_once("database.php");

                    $conn = new mysqli($db_location,$db_username,$db_password,$db_name);

                    $conn->query("USE ducan;");
                    $conn->query("SET NAMES 'utf8';");
                    $conn->query("CHARSET 'utf8';");

                    $redniBr = 1;
                    $ukupna_cijena=0;

                    echo "<form><table class=\"product-table\">
                            <th>Redni broj</th>
                            <th>Slika</th>
                            <th>Šifra artikla</th>
                            <th>Naziv artikla</th>
                            <th>Količina</th>
                            <th>Cijena/kom.</th>
                            <th></th>
                    ";                
                    foreach($_SESSION["artikli"] as $artikl => $kolicina){
                        $rez = $conn->query("SELECT * FROM artikli WHERE sifra = '$artikl'");
                        if($rez->num_rows>0){
                            while($redak=$rez->fetch_assoc()){
                                echo"
                                <tr>
                                    <td>$redniBr</td>
                                    <td><img src=".$redak["slika"]." height = '50px'</td>
                                    <td>".$redak["sifra"]."</td>
                                    <td>".$redak["naziv"]."</td>
                                    <td><select id='drop-kol'>";
                                    for($i= 0; $i<10;$i++){
                                        $ukupno = $i+1;
                                        if(($i+1)==$kolicina){                                           
                                            echo "<option value='".$ukupno."' selected='selected'>".$ukupno."</option>";
                                        }
                                        else{
                                            echo "<option value='".$ukupno."'>".$ukupno."</option>";
                                        }
                                        
                                       
                                    }
                                $ukupna_cijena += $redak["cijena"]*$kolicina;   
                                echo"</select></td>
                                    <td>".$redak["cijena"]." HRK</td>";
                                if(count($_SESSION["artikli"])>1){
                                    echo"<td><button class='button-basket'>Ukloni</button></td>";
                                    
                                    
                                    
                                }
                                else if(count($_SESSION["artikli"])==1){
                                    echo "<td class='button-cell'><button class='button-basket' id='empty'>Isprazni košaricu</button></td></tr>";
                                    echo"<tr>
                                            <td class='button-cell'></td>
                                            <td class='button-cell'></td>
                                            <td class='button-cell'></td>
                                            <td class='button-cell'></td>
                                            <td class='button-cell'></td>
                                            <td class='button-cell' style='font-weight:bold;'>".number_format((float)$ukupna_cijena,2,".","")." HRK</td>
                                            <td class='button-cell'></td>
                                        </tr>";
                                    
                                }
                                
                                                        
                            }
                            
                        } 
                        $redniBr++;
                    }                                
                        
                    if(count($_SESSION["artikli"])>1){
                        echo"
                        <tr>
                            <td class='button-cell'></td>
                            <td class='button-cell'></td>
                            <td class='button-cell'></td>
                            <td class='button-cell'></td>
                            <td class='button-cell'></td>
                            <td class='button-cell' style='font-weight:bold;'>".number_format((float)$ukupna_cijena,2,".","")." HRK</td>
                            <td class='button-cell'><button id='empty' class='button-basket'>Isprazni košaricu</button></td>
                        </tr>"; 
                    } 
                    echo "</table></form>";                   
                }                

                else{
                    echo"Košarica je prazna.";
                }

            ?>

        </main >

    </body>

</html>