<?php
	session_start();
	if(isset($_SESSION["tip"]) && (($_SESSION["tip"] == 0) || ($_SESSION["tip"] == 1))) { ?>

<?php
	include("baza_konekcija.php");
	include("header.php");

	$veza = bazaConnect();

	$session_user = $_SESSION;

	if ($session_user["tip"] == 0) {
		$upit = "SELECT * FROM lokacija";
	} else {
		$upit = "SELECT * FROM lokacija where moderator_id=". $session_user["id"];
	}

	$rezultat = bazaUpit($veza, $upit);
?>

<h1>Popis Lokacija</h1>

<?php

		if ($_SESSION["tip"] == 0) {
			echo "<a href=dodavanje_lokacije.php>DODAJ LOKACIJU</a><br><br>";
			echo "<a href=zivotinje_bez_lokacije.php>ZIVOTINJE BEZ LOKACIJE</a><br><br>";
		}

		echo "<table>
		<tr>
			<td class=column2500>ID</td>
			<td class=column2500>ID MODERATORA</td>
			<td class=column2500>NAZIV</td>
			<td class=column2500>UREDI</td>
		</tr>
		";

		while($lokacija = mysqli_fetch_array($rezultat)) {
			echo "<tr>
				<td class=column2500>{$lokacija['lokacija_id']}</td>
				<td class=column2500>{$lokacija['moderator_id']}</td>
				<td class=column2500><a href=\"zivotinje_na_lokaciji.php?id=".$lokacija["lokacija_id"]."\">{$lokacija['naziv']}</a></td>
				<td class=column2500><a href=\"uredi_lokaciju.php?lokacija_id=".$lokacija["lokacija_id"]."\">Uredi</a></td>
				</tr>";
		}

		echo "</table>";
?>	

<?php
	include("footer.php");
	bazaDisconnect($veza);
?>

<?php } ?>
