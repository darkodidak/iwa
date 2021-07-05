<?php	
    session_start();
	include("baza_konekcija.php");

    if(isset($_POST["azuriraj"])){

        $veza = bazaConnect();

        $naziv_korisnika = $_POST["korisnik_naziv"];
        $lozinka = $_POST["lozinka"];

        $upit="SELECT * from korisnik where
        korisnicko_ime='{$naziv_korisnika}'
        and
        lozinka='{$lozinka}'";

        $korisnik = bazaUpit($veza, $upit);

        if ($korisnik->num_rows == 0) {
            header("Location: prijava.php");
        } else {
            $korisnik = mysqli_fetch_array($korisnik);
            $_SESSION["id"] = $korisnik["korisnik_id"];
            $_SESSION["ime"] = $korisnik["ime"];
            $_SESSION["prezime"] = $korisnik["prezime"];
            $_SESSION["tip"] = $korisnik["tip_id"];

            header("Location: index.php");
        }
    }
?>
<?php bazaDisconnect($veza); ?>