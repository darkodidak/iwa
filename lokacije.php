<?php
	session_start();
	if(isset($_SESSION["tip"]) && (($_SESSION["tip"] == 0) || ($_SESSION["tip"] == 1))) { ?>

<?php
	include("baza_konekcija.php");
	include("header.php");
?>

<h1>Popis Lokacija</h1>

<?php
		$veza = bazaConnect();

		$session_user = $_SESSION;

		if ($session_user["tip"] == 0) {
			$upit = "SELECT * FROM lokacija";
		} else {
			$upit = "SELECT * FROM lokacija where moderator_id=". $session_user["id"];
		}

		$rezultat = bazaUpit($veza, $upit);

		if ($_SESSION["tip"] == 0) {
			echo "<a href=dodavanje_lokacije.php>DODAJ LOKACIJU</a><br><br>";
			echo "<a href=zivotinje_bez_lokacije.php>ZIVOTINJE BEZ LOKACIJE</a><br><br>";
		}


		while($lokacija = mysqli_fetch_array($rezultat)) {
			echo "<table><tr>
				<td>{$lokacija['lokacija_id']}</td>
				<td>{$lokacija['moderator_id']}</td>
				<td><a href=\"zivotinje_na_lokaciji.php?id=".$lokacija["lokacija_id"]."\">{$lokacija['naziv']}</a></td>
				<td><a href=\"uredi_lokaciju.php?lokacija_id=".$lokacija["lokacija_id"]."\">Uredi</a></td>
				</tr></table>";
		}
?>	

<?php
	include("footer.php");
	bazaDisconnect($veza);
?>

<?php } ?>
