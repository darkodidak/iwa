<?php
	session_start();
	include("baza_konekcija.php");
    include("header.php");

    $veza = bazaConnect();

    $id_lokacije = $_GET["lokacija_id"];

    $upit = "SELECT * from korisnik where tip_id=1";

    $rezultat_korisnici = bazaUpit($veza, $upit);

    $upit = "SELECT * from lokacija where lokacija_id=".$id_lokacije;

    $rezultat_lokacija = bazaUpit($veza, $upit);

    $rezultat_lokacija = mysqli_fetch_array($rezultat_lokacija);
?>

<form action="upit_uredi_lokaciju.php" method="post">
    <label for="lokacija_id">lokacija_id: </label>
    <input name="lokacija_id" style=width:100%; type='text' readonly value="<?php echo $rezultat_lokacija["lokacija_id"] ?>">

    <label for="moderator_id">moderator_id:</label>
    <select name="moderator_id" style="width: 100%">
        <?php 
            while($korisnik = mysqli_fetch_array($rezultat_korisnici)) {
                echo "<option value=".$korisnik['korisnik_id'].">".$korisnik['korisnicko_ime']."</option>";
            }
        ?>
    </select>
    
    <label for="naziv">naziv: </label>
    <input name="naziv" style=width:100%; type='text' value="<?php echo $rezultat_lokacija["naziv"] ?>">

    <a>
	    <input name="azuriraj" type="submit" value="Da">
	</a>
</form>

<?php
    include("footer.php");
?>
<?php bazaDisconnect($veza); ?>