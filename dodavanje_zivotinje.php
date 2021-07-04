<?php
session_start();
if (isset($_SESSION["tip"]) && ($_SESSION["tip"] == 0 || $_SESSION["tip"] == 1)) { ?>

	<?php
	        include("baza_konekcija.php");
			include("header.php");
	
			echo "<h1>Dodavanje Životinje</h3>";

			$veza = bazaConnect();

			$upit = "SELECT zivotinja_id from zivotinja order by zivotinja_id desc";
			$rezultat_zivotinje = bazaUpit($veza, $upit);
			$zadnja_zivotinja = mysqli_fetch_array($rezultat_zivotinje);
			$novi_id = (int)$zadnja_zivotinja["zivotinja_id"] + 1;

			$upit = "SELECT * from lokacija";
        	$rezultat_lokacija = bazaUpit($veza, $upit);

			$date = date("y-m-d h:i:s");
	?>
	<form action="upit_dodaj_zivotinju.php" method="post">
        <label for="zivotinja_id">zivotinja_id: </label>
        <input name="zivotinja_id" style=width:100%; type='text' readonly value="<?php echo (string)$novi_id ?>">

        <label for="korisnik_id">korisnik_id:</label>
        <input name="korisnik_id" style=width:100%; type='text' readonly value="<?php echo $_SESSION["id"] ?>">
        
        <label hidden for="datum_vrijeme_dodavanja">datum_vrijeme_dodavanja: </label>
        <input hidden name="datum_vrijeme_dodavanja" type='text' value="<?php echo $date ?>">
        
        <label for="naziv">naziv:</label>
        <input name="naziv" style=width:100%; type='text' value="">
        
        <label for="opis">opis:</label>
        <input name="opis" style=width:100%; type='text' value="">
        
        <label for="slika">slika:</label>
        <input name="slika" style=width:100%; type='text' value="">

		<label for="lokacija_id">lokacija:</label>
		<select name="lokacija_id" style="width: 100%">
			<?php 
				while($lokacija = mysqli_fetch_array($rezultat_lokacija)) {
					echo "<option value=".$lokacija['lokacija_id'].">".$lokacija['naziv']."</option>";
				}
			?>
		</select>
        <a>
            <input class="pok" name="azuriraj" type="submit" value="Da">
        </a>
    </form>

	<?php
	include_once("footer.php");
	bazaDisconnect($veza);
	?>

<?php } ?>