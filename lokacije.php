<?php
	session_start();
	include("bazaa.php");
	include("header.php");
?>
<?php
		$veza = spojiSeNaBazu();

		$session_user = $_SESSION;

		if ($session_user["tip"] == 0) {
			$upit = "SELECT * FROM lokacija";
		} else {
			$upit = "SELECT * FROM lokacija where moderator_id=". $session_user["id"];
		}

		$rezultat = izvrsiUpit($veza, $upit);

		while($lokacija = mysqli_fetch_array($rezultat)) {
			echo "<table><tr>
				<td>{$lokacija['lokacija_id']}</td>
				<td>{$lokacija['moderator_id']}</td>
				<td><a href=\"zivotinje_na_lokaciji.php?id=".$lokacija["lokacija_id"]."\">{$lokacija['naziv']}</a></td>
				</tr></table>";
		}
?>	

<?php
	include("footer.php");
?>
