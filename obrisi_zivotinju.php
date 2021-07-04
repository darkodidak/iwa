<?php
	session_start();
	include("bazaa.php");

    $veza = spojiSeNaBazu();

    $id_lokacije = $_GET["lokacija_id"];
    $id_zivotinje = $_GET["zivotinja_id"];

    $upit = "DELETE from zivotinje_na_lokaciji where lokacija_id=".$id_lokacije." AND zivotinja_id=".$id_zivotinje;

    $rezultat = izvrsiUpit($veza, $upit);

    if ($rezultat == true) {
        header("Location: zivotinje_na_lokaciji.php?id=".$id_lokacije);
    } else {
        echo "greška kod brisnja";
    }

?>	