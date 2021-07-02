<?php
	session_start();
	include("bazaa.php");
	include("header.php");
?>
<h1>filtriranje</h1>
<?php  
	$veza = spojiSeNaBazu();
	$upit = "SELECT * FROM lokacija WHERE lokacija_id";
	$rezultat_lokacija = izvrsiUpit($veza, $upit);
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







































