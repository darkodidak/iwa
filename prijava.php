<?php
session_start();

if (isset($_GET["odjava"])) {
	session_destroy();
	header("Location: index.php");
}

include("baza_konekcija.php");
include("header.php");

$veza = bazaConnect();
if (isset($_POST["submit"])) {
	$korime = $_POST["korime"];
	if (isset($korime) && !empty($korime) && isset($_POST["lozinka"]) && !empty($_POST["lozinka"])) {
		$upit = "SELECT * FROM korisnik 
			WHERE korisnicko_ime='{$korime}'
			AND lozinka = '{$_POST["lozinka"]}'";
		$rezultat = bazaUpit($veza, $upit);
		$prijava = false;
		while ($red = mysqli_fetch_array($rezultat)) {
			$prijava = true;
			$_SESSION["id"] = $red[0];
			$_SESSION["ime"] = $red["ime"];
			$_SESSION["prezime"] = $red["prezime"];
			$_SESSION["tip"] = $red["tip_id"];
		}

		if ($prijava) {
			header("Location: index.php");
			exit();
		} else {
			$greska = "Korisničko ime i lozinka se ne podudaraju!";
		}
	} else {
		$greska = "Korisničko ime i/ili lozinka nisu uneseni!";
	}
}
?>
<section>
	<li><a href="index.php">Početna stranica</a></li>
	<h2>Prijava korisnika</h2>
	<form id="prijava" name="prijava" method="post" action="prijava.php">
		<label for="korime">Korisničko ime: </label>
		<input name="korime" type="text" />
		<br>
		<label for="lozinka">Lozinka: </label>
		<input name="lozinka" type="password" />
		<br>
		<input class="pok" name="submit" type="submit" value="unesi">
	</form>
	<div>
		<?php
		if (isset($greska)) {
			echo "<p style ='color:red'>$greska</p>";
		}
		if (isset($poruka)) {
			echo "<p style ='color:green'>$poruka</p>";
		}
		?>
	</div>
</section>

<?php 
	include("footer.php");
	bazaDisconnect($veza); 
?>