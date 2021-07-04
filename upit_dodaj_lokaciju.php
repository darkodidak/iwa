<?php	
    session_start();
	include("baza_konekcija.php");

    if(isset($_POST["azuriraj"])){

        $veza = bazaConnect();

        $id_korisnika = $_SESSION["id"];

        $id_lokacije = $_POST["lokacija_id"];
        $id_moderatora = $_POST["moderator_id"];
        $naziv = $_POST["naziv"];

        $upit = "INSERT into lokacija (lokacija_id, moderator_id, naziv) values (".$id_lokacije.", ".$id_moderatora.", '".$naziv."')";

        $rezultat = bazaUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: lokacije.php");
        }
    }
?>
<?php bazaDisconnect($veza); ?>