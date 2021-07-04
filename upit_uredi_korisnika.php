<?php	
    session_start();
	include("bazaa.php");

    if(isset($_POST["azuriraj"])){

        $veza = spojiSeNaBazu();

        $id_korisnika = $_SESSION["id"];
        $korisnik_id = $_POST["korisnik_id"];
        $id_tip = (string)$_POST["tip_id"];
        $ime_korisnika = (string)$_POST["korisnicko_ime"];
        $sifra =(string) $_POST["lozinka"];
        $ime = (string)$_POST["ime"];
        $prezime = (string)$_POST["prezime"];
		$email = (string)$_POST["email"];
		$slika = (string)$_POST["slika"];

        $upit="UPDATE korisnik SET 
            tip_id='{$id_tip}', 
            korisnicko_ime = '{$ime_korisnika}', 
            lozinka = '{$sifra}', 
            ime='{$ime}', 
            prezime='{$prezime}',
            korisnicko_ime='{$ime_korisnika}',
            email='{$email}',
            slika='{$slika}'

            WHERE korisnik_id = '{$korisnik_id}'";
        
        $rezultat = izvrsiUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: korisnici.php");
        }
    }
	zatvoriVezuNaBazu($veza);
?> 