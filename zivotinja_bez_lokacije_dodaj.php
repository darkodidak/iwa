<?php
	session_start();
	include("baza_konekcija.php");
    include("header.php");

    $veza = bazaConnect();

    $upit = "SELECT * from lokacija";

    $rezultat_lokacija = bazaUpit($veza, $upit);
    
    $id_zivotinja = $_GET["id"];
?>

<form action="upit_dodaj_lokaciju_zivotinji.php" method="post">
    <label for="zivotinja_id">zivotinja_id: </label>
    <input name="zivotinja_id" style=width:100%; type='text' readonly value="<?php echo $id_zivotinja ?>">

    <label for="lokacija_id">lokacija_id:</label>
    <select name="lokacija_id" style="width: 100%">
        <?php 
            while($lokacija = mysqli_fetch_array($rezultat_lokacija)) {
                echo "<option value=".$lokacija['lokacija_id'].">".$lokacija['naziv']."</option>";
            }
        ?>
    </select>
    <a>
	    <input class="pok" name="azuriraj" type="submit" value="Dodaj Lokaciju">
	</a>
</form>

<?php
    include("footer.php");
?>