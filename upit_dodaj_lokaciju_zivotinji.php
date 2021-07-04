<?php	
    session_start();
	include("bazaa.php");

    if(isset($_POST["azuriraj"])){

        $veza = spojiSeNaBazu();

        $id_zivotinje = $_POST["zivotinja_id"];
        $id_lokacije = $_POST["lokacija_id"];

        $upit = "INSERT into zivotinje_na_lokaciji (zivotinja_id, lokacija_id, admin) values (".$id_zivotinje.", ".$id_lokacije.", '1')";

        $rezultat = izvrsiUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: zivotinje_bez_lokacije.php");
        }
    }
?>