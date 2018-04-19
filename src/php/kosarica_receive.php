<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION["artikli"])){
        $_SESSION["artikli"]=array();
    }

    if(isset($_POST["action"])){
        if($_POST["action"]=="dodaj"){
            $postoji = false;
            $proizvod=$_POST["sifra"];
            foreach($_SESSION["artikli"] as $artikl => $kolicina){
                if($artikl==$_POST["sifra"]){
                    $kolicina++;
                    $_SESSION["artikli"][$artikl]=$kolicina;
                    $postoji = true;
                }
            }
            if(!$postoji){
                $_SESSION["artikli"][$proizvod]=1;
            }
        }

        else if($_POST["action"]=="promjena"){
            $_SESSION["artikli"][$_POST["sifra"]]=$_POST["kolicina"];
        }

        else if($_POST["action"]=="ukloni"){
            //$sifra = ;
            unset($_SESSION["artikli"][$_POST["sifra"]]);
        }


        else if($_POST["action"]=="isprazni"){
            unset($_SESSION["artikli"]);
        }
    }


    

    

?>