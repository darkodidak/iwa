<?php
	session_start();
	include("baza_konekcija.php");
    include("header.php");

    $veza = bazaConnect();

    $id_korisnika = $_GET["id"];
    


    $upit = "SELECT * from korisnik where korisnik_id=".$id_korisnika;

    $rezultat_korisnici = bazaUpit($veza, $upit);

    $rezultat_korisnici = mysqli_fetch_array($rezultat_korisnici);
?>

<form action="upit_uredi_korisnika.php" method="post">
    <label for="korisnik_id">korisnik_id: </label>
    <input name="korisnik_id" style=width:100%; type='text' readonly value="<?php echo $rezultat_korisnici["korisnik_id"] ?>">

    <label for="tip_id"> 
    <input name="tip_id" type="radio" value="2"  value=""> Korisnik
    </label>
	
    <label for="tip_id">
    <input name="tip_id" type="radio" value="1"  value=""> Voditelj
    </label> <br>



    <label for="lozinka">lozinka: </label>
    <input name="lozinka" style=width:100%; type='password' value="<?php echo $rezultat_korisnici["lozinka"] ?>">

    <label for="ime">ime: </label>
    <input name="ime" style=width:100%; type='text' value="<?php echo $rezultat_korisnici["ime"] ?>">

    <label for="prezime">prezime: </label>
    <input name="prezime" style=width:100%; type='text' value="<?php echo $rezultat_korisnici["prezime"] ?>">

    <label for="korisnicko_ime">korisnicko_ime:: </label>
    <input name="korisnicko_ime" style=width:100%; type='text' value="<?php echo $rezultat_korisnici["korisnicko_ime"] ?>">

    <label for="email">email: </label>
    <input name="email" style=width:100%; type='text' value="<?php echo $rezultat_korisnici["email"] ?>">

    <label for="slika">slika: </label>
    <input name="slika" style=width:100%; type='text' value="<?php echo $rezultat_korisnici["slika"] ?>">

    <a>
	    <input name="azuriraj" type="submit" value="Da">
	</a>
</form>

<?php
    include("footer.php");
?>
<?php bazaDisconnect($veza); ?>