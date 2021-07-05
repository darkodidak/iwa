<?php	
    session_start();
	include("baza_konekcija.php");

    if(isset($_POST["azuriraj"])){

        $veza = bazaConnect();

        $naziv_korisnika = $_POST["korisnik_naziv"];
        $lozinka = $_POST["lozinka"];
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $email = $_POST["email"];

        $upit = "INSERT INTO korisnik (tip_id, ime, prezime, email, korisnicko_ime, lozinka)
					VALUES (2, '{$ime}', '{$prezime}', '{$email}', '{$naziv_korisnika}', '{$lozinka}')";

        $rezultat = bazaUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: prijava.php");
        } else {
            header("Location: registracija.php");
        }
    }
?>
<?php bazaDisconnect($veza); ?>