<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");
?>
<?php 
	if(isset($_SESSION["tip"])) { ?>
<h1>Filtriranje</h1>
<?php  
	$veza = bazaConnect();
	$upit = "SELECT * FROM lokacija WHERE lokacija_id";
	$rezultat_lokacija = bazaUpit($veza, $upit);
?>
	<form name="forma" method="post" action="rezultat.php">
		<label for="lokacija"><strong>Filtriraj lokaciju životinje</strong></label><br>
		<select name="lokacija">
			<?php 
			while($lokacija = mysqli_fetch_assoc($rezultat_lokacija)){
				echo"<option value='{$lokacija["lokacija_id"]}'>{$lokacija["naziv"]}</option>";
			}	
			?>
	</select><br>
	<label for="datum">Datum od:</label>
	<input name="datum" type="text" value="" placeholder="dd.mm.gggg hh:mm:ss"  />
	<br>
	<label></label>
	<label for="vrijeme">Datum do:</label>
	<input name="vrijeme" type="text" value="" placeholder="dd.mm.gggg hh:mm:ss"/>
	<br>
	<input class="pok" name="submit" type="submit" value="Filtriraj" href="rezultat.php"><br>
	</form>
	</section>

<?php
	include_once("footer.php");
?>

<?php }
bazaDisconnect($veza);
?>
	








































