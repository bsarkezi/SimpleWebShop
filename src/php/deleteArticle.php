<?php
      include_once("database.php");

      $conn= new mysqli($db_location,$db_username,$db_password,$db_name);

      $conn->query("USE ducan");
      $conn->query("SET NAMES 'utf8'");
      $conn->query("CHARSET 'utf8'");


      $id=$_POST['sifra'];

      $conn->query("DELETE FROM artikli WHERE sifra = '$id'");
      $conn->close();

      header( "refresh:0;url=administracija.php" );

?>