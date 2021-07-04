<?php
	session_start();
	include("bazaa.php");
    include("header.php");

    $veza = spojiSeNaBazu();

    $upit = "SELECT * from korisnik where tip_id=1";

    $rezultat_korisnici = izvrsiUpit($veza, $upit);

    $upit = "SELECT lokacija_id from lokacija order by lokacija_id DESC";

    $rezultat_lokacija = izvrsiUpit($veza, $upit);

    $rezultat_lokacija = mysqli_fetch_array($rezultat_lokacija);

    $novi_id = (int)$rezultat_lokacija["lokacija_id"] + 1;
?>

<form action="upit_dodaj_lokaciju.php" method="post">
    <label for="lokacija_id">lokacija_id: </label>
    <input name="lokacija_id" style=width:100%; type='text' readonly value="<?php echo (string)$novi_id ?>">

    <label for="moderator_id">moderator_id:</label>
    <select name="moderator_id" style="width: 100%">
        <?php 
            while($korisnik = mysqli_fetch_array($rezultat_korisnici)) {
                echo "<option value=".$korisnik['korisnik_id'].">".$korisnik['korisnicko_ime']."</option>";
            }
        ?>
    </select>
    
    <label for="naziv">naziv: </label>
    <input name="naziv" style=width:100%; type='text' value="">

    <a>
	    <input class="pok" name="azuriraj" type="submit" value="Da">
	</a>
</form>

<?php
    include("footer.php");
?>