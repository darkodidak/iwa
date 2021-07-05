<?php
session_start();

if (isset($_GET["odjava"])) {
	session_destroy();
	header("Location: index.php");
}

include("baza_konekcija.php");
include("header.php");

?>
<a href="index.php">Početna stranica</a>
<h2>Prijava korisnika</h2>

<form action="prijavi_korisnika.php" method="post">
    <label for="korisnik_naziv">Ime: </label>
    <input name="korisnik_naziv" style=width:100%; type='text' value="">
    
    <label for="lozinka">lozinka: </label>
    <input name="lozinka" type="password" style=width:100%; type='text' value="">

    <a>
	    <input name="azuriraj" type="submit" value="Prijava"><br>
	</a>
</form>

<?php
include("footer.php");
?>