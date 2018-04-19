<?php
    if(!isset($_SESSION)){
        session_start();
      }
    $poruka="";
    if(!isset($_COOKIE["korisnik"])){
        $poruka = "Niste ulogirani!";
        header("location:login.php");

    
    }

    else{
        session_destroy();
        $poruka = "Izlogirani ste!";
        header("location:index.php");
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Logout</title>
        <meta charset = "utf-8"/>
        <link rel="stylesheet" type="text/css" href="../style.css" />
    </head>


    <body>
        <?php echo '<p id = "logout-poruka">' . $poruka . '</p>';?> 
    </body>
</html>