<?php
	session_start();
	include("bazaa.php");
    include("header.php");

    $veza = spojiSeNaBazu();

    $id_zivotinje = $_GET["zivotinja_id"];
    $id_lokacije = $_GET["lokacija_id"];

    $upit = "SELECT * from zivotinja where zivotinja_id=".$id_zivotinje;

    $rezultat = izvrsiUpit($veza, $upit);

    $zivotinja = mysqli_fetch_array($rezultat);
?>

<form action="upit_uredi_zivotinju.php" method="post">
    <label for="naziv">Naziv: </label>
    <input name="naziv" style=width:100%; type='text' value="<?php echo $zivotinja["naziv"] ?>">
    
    <label for="opis">Opis: </label>
    <input name="opis" style=width:100%; type='text' value="<?php echo $zivotinja["opis"] ?>">
    
    <label for="slika">Slika: </label>
    <input name="slika" style=width:100%; type='text' value="<?php echo $zivotinja["slika"] ?>">

    <label hidden for="id_zivotinje">Slika: </label>
    <input hidden name="id_zivotinje" style=width:100%; type='text' value="<?php echo $id_zivotinje ?>">

    <label hidden for="id_lokacije">Slika: </label>
    <input hidden name="id_lokacije" style=width:100%; type='text' value="<?php echo $id_lokacije ?>">

    <a>
	    <input class="pok" name="azuriraj" type="submit" value="Da"><br>
	</a>
</form>

<?php
    include("footer.php");
?>
<?php zatvoriVezuNaBazu($veza); ?>