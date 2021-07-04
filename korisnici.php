<?php
	session_start();
	include("bazaa.php");
	include("header.php");
?>
<?php
		$veza = spojiSeNaBazu();

		$session_user = $_SESSION;

		if ($session_user["tip"] == 0) {
			$upit = "SELECT * FROM korisnik";
		} else {
			$upit = "SELECT * FROM korisnik where korisnik_id=". $session_user["id"];
		}

		$rezultat = izvrsiUpit($veza, $upit);

		while($korisnik = mysqli_fetch_array($rezultat)) {
			echo "<table><tr>
				<td>{$korisnik['korisnik_id']}</td>
				<td>{$korisnik['tip_id']}</td>
				<td>{$korisnik['korisnicko_ime']}</td>
				<td>{$korisnik['lozinka']}</td>
				<td>{$korisnik['ime']}</td>
				<td>{$korisnik['prezime']}</td>
				<td>{$korisnik['email']}</td>
				<td>{$korisnik['slika']}</td>
				<td><a href=\"uredi_korisnika.php?id=".$korisnik["korisnik_id"]."\">Uredi</a></td>
				</tr></table>";
		}
?>	

<?php
	include("footer.php");
	zatvoriVezuNaBazu($veza);
?>
