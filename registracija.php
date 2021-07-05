<?php

session_start();
include("baza_konekcija.php");
include("header.php");

$id_novi_korisnik = "";

?>
<h1>Registracija korisnika</h1>

<form action="registriraj_korisnika.php" method="post">
    <label for="korisnik_naziv">Korisnicko ime: </label>
    <input name="korisnik_naziv" style=width:100%; type='text' value="">
    
    <label for="lozinka">Lozinka: </label>
    <input name="lozinka" type="password" style=width:100%; type='text' value="">

    <label for="ime">Ime: </label>
    <input name="ime" style=width:100%; type='text' value="">

    <label for="prezime">Prezime: </label>
    <input name="prezime" style=width:100%; type='text' value="">

    <label for="email">E-mail: </label>
    <input name="email" style=width:100%; type='text' value="">

    <a>
	    <input name="azuriraj" type="submit" value="Registracija"><br>
	</a>
</form>

<?php
include_once("footer.php");
?>