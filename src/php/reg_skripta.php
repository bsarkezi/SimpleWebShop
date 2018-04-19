<?php
    $greska="";
    $greska_usr="";
    $greska_pass="";
    $greska_passRepeat="";
    include_once("database.php");

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST["submit"])){

        $ok = true;

        $greska="";
        $greska_usr="";
        $greska_pass="";
        $greska_passRepeat="";

        $ime = $_POST["ime"];
        $username=$_POST["korIme"];
        $password=hash("sha256",$_POST["password"]);
        $passConf = hash("sha256",$_POST["passConfirm"]);

        

        $conn= mysqli_connect($db_location,$db_username,$db_password,$db_name) or die('Error spajanje na bazu');
        mysqli_query($conn, "USE users");
        mysqli_query($conn, "SET NAMES 'utf8'");
        mysqli_query($conn, "CHARSET 'utf8'");


        $sql = "SELECT username FROM users WHERE username=?";
        
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$korIme);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        mysqli_stmt_bind_result($stmt,$usr);
        mysqli_stmt_fetch($stmt);

        if(mysqli_stmt_num_rows($stmt)){
            $greska_usr="Korisničko ime već postoji";
            $ok = false;
        }
        else{
            $greska_usr="";
        }

        if($passConf!=$password){
            $greska_passRepeat="Lozinke nisu iste.";
            $ok = false;
        }
        else{
            $greska_passRepeat="";
        }
        
        if($ok){
            $broj = 1;
            $sql_pohrana = "INSERT INTO users(username,pass,ime,razina) VALUES(?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt,$sql_pohrana)){
                mysqli_stmt_bind_param($stmt,"sssi",$username,$password,$ime,$broj);
                mysqli_stmt_execute($stmt);
            }
            header("location:reg_success.php");
            die;
        }



    }
?>