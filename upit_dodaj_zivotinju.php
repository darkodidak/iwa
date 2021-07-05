<?php	
    session_start();
	include("baza_konekcija.php");

    if(isset($_POST["azuriraj"])){

        $veza = bazaConnect();

        $id_korisnika = $_SESSION["id"];

        $id_zivotinje = $_POST["zivotinja_id"];
        $id_korisnika = $_POST["korisnik_id"];
        $datum_vrijeme_dodavanja = $_POST["datum_vrijeme_dodavanja"];
        $naziv_zivotinje = $_POST["naziv"];
        $opis_zivotinje = $_POST["opis"];
        $slika = $_POST["slika"];
        $lokacija_id = $_POST["lokacija_id"];

        $upit = "INSERT into zivotinja (zivotinja_id, korisnik_id, datum_vrijeme_dodavanja, naziv, opis, slika) 
                values (".$id_zivotinje.", ".$id_korisnika.", '".$datum_vrijeme_dodavanja."', '".$naziv_zivotinje."', '".$opis_zivotinje."', '".$slika."')";

        $rezultat = bazaUpit($veza, $upit);

        if ($rezultat == true) {
            $upit = "INSERT into zivotinje_na_lokaciji (zivotinja_id, lokacija_id, admin) values (".$id_zivotinje.", ".$lokacija_id.", 0)";

            $rezultat = bazaUpit($veza, $upit);

            if ($rezultat == true) {
                header("Location: dodavanje_zivotinje.php");
            }
        }
    }
?>
<?php bazaDisconnect($veza); ?>