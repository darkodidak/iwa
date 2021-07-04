<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");
?>
<?php
		$veza = bazaConnect();
		$upit = "SELECT *FROM korisnik";
		$rezultat = bazaUpit($veza, $upit);
?>
			<table>
					<?php 
						if(isset($rezultat)){
							while($redak=mysqli_fetch_array($rezultat)){
								echo "<tr>
									<td>{$redak['korisnik_id']}</td>
									<td>{$redak['tip_id']}</td>
									<td>{$redak['korisnicko_ime']}</td>
									<td>{$redak['ime']}</td>
									<td>{$redak['prezime']}</td>
									<td>{$redak['email']}</td>
									<td>{$redak['slika']}</td>";
									echo"<td>";?> <img src="<?php echo ($redak["slika"]) ?>""width='150' height='150'><?php echo"</td>";
									echo "<td><a href='editiranje_korisnika.php?id={$redak['korisnik_id']}'>Uredi</a></td>";
								echo"</tr>";
							}
							
						}
					?>
</table> 
<?php
	include_once("footer.php");

		$session_user = $_SESSION;

		if ($session_user["tip"] == 0) {
			$upit = "SELECT * FROM korisnik";
		} else {
			$upit = "SELECT * FROM korisnik where korisnik_id=". $session_user["id"];
		}

		$rezultat = bazaUpit($veza, $upit);

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
	bazaDisconnect($veza);
?>
