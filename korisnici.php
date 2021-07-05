<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");
?>
<?php
		$veza = bazaConnect();

		$session_user = $_SESSION;

		if ($session_user["tip"] == 0) {
			$upit = "SELECT * FROM korisnik";
		} else {
			$upit = "SELECT * FROM korisnik where korisnik_id=". $session_user["id"];
		}

		$rezultat = bazaUpit($veza, $upit);

		echo "<table>
		<tr>
			<td class=column1250>ID</td>
			<td class=column1250>TIP</td>
			<td class=column1250>KORISNICKO IME</td>
			<td class=column1250>LOZINKA</td>
			<td class=column1250>IME</td>
			<td class=column1250>PREZIME</td>
			<td class=column1250>EMAIL</td>
			<td class=column1250>SLIKA</td>
			<td clasas=column1250>UREDI</td>
		</tr>
		";
		

		while($korisnik = mysqli_fetch_array($rezultat)) {
			echo "<table><tr>
				<td class=column1250>{$korisnik['korisnik_id']}</td>
				<td class=column1250>{$korisnik['tip_id']}</td>
				<td class=column1250>{$korisnik['korisnicko_ime']}</td>
				<td class=column1250>{$korisnik['lozinka']}</td>
				<td class=column1250>{$korisnik['ime']}</td>
				<td class=column1250>{$korisnik['prezime']}</td>
				<td class=column1250>{$korisnik['email']}</td>
				<td class=column1250>{$korisnik['slika']}</td>
				<td class=column1250><a href=\"uredi_korisnika.php?id=".$korisnik["korisnik_id"]."\">Uredi</a></td>
				</tr></table>";
		}

		echo "</table>";
?>	

<?php
	include("footer.php");
	bazaDisconnect($veza);
?>
