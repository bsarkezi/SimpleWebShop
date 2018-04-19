$(document).ready(function(){
    $("#dodaj").click(function(event){
    
        var sifra = $("#sifra").text();
        var request;
        console.log(sifra);
        request = $.ajax({
            url:"kosarica_receive.php",
            type:"POST",
            data:{
                "sifra":sifra,
                "action":"dodaj"
            }
        });
        request.done(function (){
            console.log("Success!");
            if(confirm("Artikl je dodan u košaricu. Želite li pregledati sadržaj košarice?")){
                window.location.href="kosarica.php";
            }
        });
    
        
    });

    $("#empty").click(function(event){
        console.log("Kosarica ispraznjena");
        var request;
        event.preventDefault();  //sprjecavanje slanja forme i ucitavanja kosarica_receive.php
        request = $.ajax({
            url:"kosarica_receive.php",
            type:"POST",
            data:{
                "action":"isprazni"
            }
        });
        request.done(function(){
            console.log("Kosarica ispraznjena");
            location.reload();
        });
    });

    $("select").change(function(){
        var td = $(this).parent();  //celija u kojem se  <select> element nalazi
        var tr = $(td).parent();    //red tablice u kojem se sve odvija

        var sifra_artikla=$("td:nth-child(3)", tr).text();
        var kolicina = $(this).val();
        console.log(sifra_artikla);
        console.log(kolicina);
        var request = $.ajax({
            url:"kosarica_receive.php",
            type:"POST",
            data:{
                "action":"promjena",
                "sifra":sifra_artikla,
                "kolicina":kolicina
            }
        });

        request.done(function(){
            console.log("Artiklu "+sifra_artikla+" promijenjena kolicina na "+kolicina);
            location.reload();
        });
        
            
        
    })

    $("button:contains('Ukloni')").click(function(event){
        //console.log("Uklonjeno");
        event.preventDefault();

        var td = $(this).parent();  //celija u kojem se  <button> element nalazi
        var tr = $(td).parent();    //red tablice u kojem se sve odvija
        var sifra_artikla=$("td:nth-child(3)", tr).text();

        console.log(sifra_artikla);

        var request = $.ajax({
            url:"kosarica_receive.php",
            type:"POST",
            data:{
                "action":"ukloni",
                "sifra":sifra_artikla
            }
        });
        
        request.done(function(){
            location.reload();
        })
    });
});



