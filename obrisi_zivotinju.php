<?php
	session_start();
	include("baza_konekcija.php");

    $veza = bazaConnect();

    $id_lokacije = $_GET["lokacija_id"];
    $id_zivotinje = $_GET["zivotinja_id"];

    $upit = "DELETE from zivotinje_na_lokaciji where lokacija_id=".$id_lokacije." AND zivotinja_id=".$id_zivotinje;

    $rezultat = bazaUpit($veza, $upit);

    if ($rezultat == true) {
        header("Location: zivotinje_na_lokaciji.php?id=".$id_lokacije);
    } else {
        echo "greška kod brisnja";
    }
    bazaDisconnect($veza);
?>	