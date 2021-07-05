<?php	
    session_start();
	include("baza_konekcija.php");

    if(isset($_POST["azuriraj"])){

        $veza = bazaConnect();

        $id_korisnika = $_SESSION["id"];
        $korisnik_id = $_POST["korisnik_id"];
        $id_tip = $_POST["tip_id"];
        $ime_korisnika = $_POST["korisnicko_ime"];
        $sifra = $_POST["lozinka"];
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
		$email = $_POST["email"];
		$slika = $_POST["slika"];

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
        
        $rezultat = bazaUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: korisnici.php");
        }
    }
	bazaDisconnect($veza);
?> 