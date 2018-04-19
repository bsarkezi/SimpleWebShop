<?php
if(!isset($_SESSION)){
    session_start();
}
$greska = "";

if(isset($_SESSION["korisnik"])){
    //header("Refresh: 2; url=index.php");
    
}



if(isset($_POST["login"])){
    include_once("database.php");

    $korIme = $_POST["korIme"];
    $lozinka = hash("sha256", $_POST["lozinka"]);
    

    $conn= mysqli_connect($db_location,$db_username,$db_password,$db_name) or die('Error spajanje na bazu');
    mysqli_query($conn, "USE users");
    mysqli_query($conn, "SET NAMES 'utf8'");
    mysqli_query($conn, "CHARSET 'utf8'");


    $sql = "SELECT username, pass FROM users WHERE username=? AND pass=?";
    
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt,"ss",$korIme,$lozinka);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt,$usr,$pass);
    mysqli_stmt_fetch($stmt);
    
    if(mysqli_stmt_num_rows($stmt)>0){
        setcookie("korisnik",$korIme);
        header("location:index.php");
        die;
        
    }
    else{
        $greska = "Krivo korisničko ime ili lozinka.";
    }
    
}    

?>