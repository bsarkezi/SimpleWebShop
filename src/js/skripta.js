function unos_provjera(){
  var ime = document.getElementById('prodName').value;
  //var sifra = document.getElementById('sifra').value;
  var kategorija = document.getElementById('kategorija').value;
  var opis =document.getElementById('opis').value;
  var cijena = document.getElementById('cijena').value;
  var arhiviranje = document.getElementById('arhiviranje').checked;
  var stanje = true;



  if(ime.length<5 || ime.length>20){
    document.getElementById('prodName').style.borderColor="red";
    document.getElementById('prodName').style.borderWidth="2px";
    document.getElementById("ime-greska").innerHTML="Ime mora biti između 5 i 20 znakova.";
    document.getElementById("ime-greska").style.color="red";
    document.getElementById("ime-greska").style.marginTop="-1px";
    document.getElementById("ime-greska").style.marginBottom="-3px";
    stanje = false;
  }
  else{
    document.getElementById('prodName').style.borderWidth="0px";
    document.getElementById("ime-greska").innerHTML="";
  }

//   if(sifra.length!=10){
//     document.getElementById('sifra').style.borderColor="red";
//     document.getElementById('sifra').style.borderWidth="2px";
//     document.getElementById('sifra').style.paddingTop="1px";
//     document.getElementById("sifra-greska").innerHTML="Šifra mora imati točno 10 znakova";
//     document.getElementById("sifra-greska").style.color="red";
//     document.getElementById("sifra-greska").style.marginTop="-1px";
//     document.getElementById("sifra-greska").style.marginBottom="-3px";
//     stanje = false;
//   }
//   else{
//     document.getElementById('sifra').style.borderWidth="0px";
//     document.getElementById("sifra-greska").innerHTML="";
//   }

  if(!kategorija){
    document.getElementById('kategorija').style.borderColor="red";
    document.getElementById('kategorija').style.borderWidth="2px";
    document.getElementById("kat-greska").innerHTML="Kategorija mora biti odabrana.";
    document.getElementById("kat-greska").style.color="red";
    document.getElementById("kat-greska").style.marginTop="-1px";
    document.getElementById("kat-greska").style.marginBottom="-3px";

    stanje = false;
  }
  else{
    document.getElementById('kategorija').style.borderWidth="0px";
    document.getElementById("kat-greska").innerHTML="";
  }

  if(opis.length<10||opis.length>100){
    document.getElementById('opis').style.borderColor="red";
    document.getElementById('opis').style.borderWidth="2px";
    document.getElementById("opis-greska").innerHTML="Opis mora biti između 10 i 100 znakova.";
    document.getElementById("opis-greska").style.color="red";
    document.getElementById("opis-greska").style.marginTop="-1px";
    document.getElementById("opis-greska").style.marginBottom="-3px";
    stanje = false;
  }
  else{
    document.getElementById('opis').style.borderWidth="0px";
    document.getElementById("opis-greska").innerHTML="";
  }

  if(!cijena){
    document.getElementById('cijena').style.borderColor="red";
    document.getElementById('cijena').style.borderWidth="2px";
    document.getElementById("cijena-greska").innerHTML="Cijena mora biti unesena.";
    document.getElementById("cijena-greska").style.color="red";
    document.getElementById("cijena-greska").style.marginTop="-1px";
    document.getElementById("cijena-greska").style.marginBottom="-3px";
    stanje = false;
    stanje = false;
  }
  else{
    document.getElementById('cijena').style.borderWidth="0px";
    document.getElementById("cijena-greska").innerHTML="";
  }

  if(arhiviranje ==true){
      var pitanje = confirm("Jeste li sigurni da želite arhivirati proizvod?");
      if(!pitanje){
          stanje = false;
      }
  }
  return stanje;
}


function reg_provjera(){
    var ok = true;
    var ime =document.getElementById("ime").value;
    var ime_regex = /[A-Za-z]/.test(ime);
    var eula = document.getElementById("eula").checked;
    var korIme = document.getElementById("korIme").value;
    var usr_regex =/^(?![_.])[a-zA-Z0-9.-_]/.test(korIme);
    var lozinka = document.getElementById("pass").value.length;
    var lozinka2 = document.getElementById("passConfirm").value.length;

    if(ime.length==0){
        document.getElementById("err-ime").innerHTML="Ime mora biti unešeno!";
        document.getElementById("err-ime").style.color ="red";
        ok = false;
    }
   
   else if(!ime_regex){
       document.getElementById("err-ime").innerHTML="Neispravno ime!";
        document.getElementById("err-ime").style.color ="red";
        ok = false;
   }

    else{
        document.getElementById("err-ime").innerHTML="";
        document.getElementById("err-ime").style.color = "red";
    }

    if(korIme.length==0){
        document.getElementById("err-user").innerHTML="Korisničko ime mora biti unešemo!";
        document.getElementById("err-user").style.color = "red";
        ok = false;
    }
    else if(!usr_regex){
        document.getElementById("err-user").innerHTML="Neispravno korisničko ime!";
        document.getElementById("err-user").style.color = "red";
        ok = false
    }
    else{
        document.getElementById("err-user").innerHTML="";
        document.getElementById("err-user").style.color = "red";
    }

    if(lozinka==0){
        document.getElementById("err-pass").innerHTML="Morate unijeti lozinku!";
        document.getElementById("err-pass").style.color="red";
        ok = false;
    }
    else{
        document.getElementById("err-pass").innerHTML="";
        document.getElementById("err-pass").style.color="red";
    }

    if(lozinka2==0){
        document.getElementById("err-pass-conf").innerHTML="Morate potvrditi lozinku!";
        document.getElementById("err-pass-conf").style.color="red";
        ok = false;
    }
    else{
        document.getElementById("err-pass-conf").innerHTML="";
        document.getElementById("err-pass-conf").style.color="red";
    }

    if(!eula){
        alert("Morate pristati na uvjete korištenja!");
        ok = false;
    }

    return ok;
}


function login_provjera(){
    var ok = true;
    
    if(document.getElementById("korIme").value.length==0){
        ok = false;
        document.getElementById("err-usr").innerHTML="Korisničko ime je prazno";
        document.getElementById("err-usr").style.color ="red";
    }
    else{
        document.getElementById("err-usr").innerHTML="";
    }

    if(document.getElementById("lozinka").value.length==0){
        document.getElementById("err-pass").innerHTML="Lozinka je prazna";
        document.getElementById("err-pass").style.color ="red";
        ok = false;
    }
    else{
        document.getElementById("err-pass").innerHTML ="";
    }

    return ok;
    
}

