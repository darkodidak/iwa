<?php

	session_start();

?>

<!DOCTYPE html>
<html lang="hr">
	<head>
		<title>Divlje životinje</title>
		<meta name="author" content="Moreno Franjković">
		<meta name="datum" content="6.2.2021.">
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="stil.css"/>
	</head>
		<nav>
		<?php include "menii.php";?>
	</nav>
	
<body>
	<section>
<?php
			include_once("bazaa.php");
			$veza = spojiSeNaBazu();
			$id_azuriranja_zivotinje = $_GET["id"];
			$id = $_SESSION["id"];
			
				if(isset($_POST["gumb"])){
					$greska = "";
					$poruka = "";
					$naziv = $_POST["naziv"];
					$opis = $_POST["opis"];
					$slika = $_POST["slika"];

						if(!isset($naziv) || empty($naziv)){
							$greska .= "Niste unijeli naziv životinje! <br>";
						}
			
						if(!isset($opis) || empty($opis)){
							$greska .= "Niste opis životinje! <br>";
						}
					
						if(!isset($slika) || empty($slika)){
							$greska .= "Unesite sliku! <br>";
						}
					
						if(empty($greska)){
							$poruka = "Kreirana je životinja! <br>";
							$upit="UPDATE zivotinja SET korisnik_id='{$id}', datum_vrijeme_dodavanja = NOW(), naziv = '{$naziv}', opis='{$opis}', slika='{$slika}' WHERE zivotinja_id = '{$id_azuriranja_zivotinje}'";
							$rezultat = izvrsiUpit($veza, $upit);
						}
				}
				
			$upit = "SELECT *FROM zivotinja WHERE zivotinja_id = '{$id_azuriranja_zivotinje}'";
			$rezultat = izvrsiUpit($veza, $upit);
			$rezultat_ispis = mysqli_fetch_assoc($rezultat);
	
			zatvoriVezuNaBazu($veza);
			
			
?>

		
			<form id="editiranje_zivotinja" name="editiranje" method="post" action="" href="moderator_stranica.php" >
				<label for="naziv">Naziv: </label>
				<input name="naziv" type="text" value="<?php echo $rezultat_ispis["naziv"] ?>"/>
				<br>
				
				<label for="opis">Opis: </label>
				<input name="opis" type="text" value="<?php echo $rezultat_ispis["opis"] ?>"/>
				<br>
				
				<label for="slika">Slika: </label>
				<input name="slika" type="text" value="<?php echo $rezultat_ispis["slika"] ?>"/>
				<br>
				<a href="moderator_stranica.php">
					<input class="pok" name="gumb" type="submit" value="Unesi" onclick="window.location='moderator_stranica.php'" href="moderator_stranica.php"><br>
				</a>
				<input class="pok" id="reset" type="reset" name="reset" value="Inicijaliziraj"><br>
			</form>
		
			
			<div>
				<?php 
				
					if(isset($greska)){
						echo "<p style ='color:red'>$greska</p>";
					} 
					if(isset($poruka)){
					echo "<p style ='color:green'>$poruka</p>";
					} 
					
				?>
			</div>
			
	</section>
</body>

<footer>
	<p>
		<small>
			<a href="o_autoru.html" style="color: white;">M. Franjković  2020&copy; </a>
		</small>
	</p>
</footer>