<?php	
    session_start();
	include("bazaa.php");

    if(isset($_POST["azuriraj"])){

        $veza = spojiSeNaBazu();

        $id_korisnika = $_SESSION["id"];

        $id_lokacije = $_POST["lokacija_id"];
        $id_moderatora = $_POST["moderator_id"];
        $naziv = $_POST["naziv"];

        $upit = "INSERT into lokacija (lokacija_id, moderator_id, naziv) values (".$id_lokacije.", ".$id_moderatora.", '".$naziv."')";

        $rezultat = izvrsiUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: lokacije.php");
        }
    }
?>