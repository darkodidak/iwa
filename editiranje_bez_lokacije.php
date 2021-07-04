<?php

	session_start();
	$id=$_GET["id"];
	

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
	
		<table border="1">
			<caption><b>Informacije o životinji</b></caption>
				<thead>
					<tr>
						<th>Životinja ID</th>
						<th>Korisnik ID</th>
						<th>Naziv</th>
						<th>Slika</th>
						<th>Datum i vrijeme dodavanja</th>
						<th>Opis</th>
					</tr>
				</thead>
			<tbody>
<?php

		include_once("baza_konekcija.php");
		$veza = bazaConnect();
		$upit = "SELECT *FROM zivotinja WHERE zivotinja_id='$id'";
		$rezultat = bazaUpit($veza, $upit);
		
		if(isset($rezultat)){
			while($prikazi=mysqli_fetch_array($rezultat)){
				echo"<tr>";
				echo"<td>{$prikazi[0]}</td>";
				echo"<td>{$prikazi[1]}</td>";
				echo"<td>{$prikazi["naziv"]}</td>";
				echo"<td>";?> <img src="<?php echo $prikazi["slika"] ?>"><?php echo"</td>";
				echo"<td>{$prikazi["datum_vrijeme_dodavanja"]}</td>";
				echo"<td>{$prikazi["opis"]}</td>";
				echo"</tr>";
			}
			
		}
		


?>
			</tbody>
		</table><br>
	
<?php	

			if(isset($_POST["submit"])){
				$greska = "";
				$poruka = "";
				$naziv = $_POST["naziv"];
				$opis = $_POST["opis"];
				$slika = $_POST["slika"];	
			
				if(!isset($naziv) || empty($naziv)){
					$greska .= "Niste unijeli naziv životinje! <br>";
				}

				if(!isset($opis) || empty($opis)){
					$greska .= "Dodajte opis! <br>";
				}
				if(!isset($slika) || empty($slika)){
					$greska .= "Prinesite sliku putem url-a! <br>";
				}
				/*if(!isset($_POST["lokacija"]) || empty($naziv) || empty($opis) || empty($slika)){
					$greska .= "Odaberi lokaciju! <br>";
				}*/
				if(empty($greska)){
					$upit="UPDATE zivotinja SET naziv='{$naziv}', opis='{$opis}', slika='{$slika}' WHERE zivotinja_id='{$id}'";
					bazaUpit($veza, $upit);	
					$poruka = "Novi podaci su uneseni pod ključem: $id";
				}
				
 
				if (isset($_POST["lokacija"]) AND empty($greska)){
					foreach($_POST["lokacija"] as $kljuc => $vrijednost){
						if($_POST["lokacija"][$kljuc]){
							$lokacija = $_POST["lokacija"][$kljuc];
						
							$upit= "INSERT INTO zivotinje_na_lokaciji (zivotinja_id, lokacija_id, admin)
							VALUES($id, $lokacija, 1)";
							bazaUpit($veza, $upit);
							
						}
					}
				}
			}

?>
		
<?php		

		$upit = "SELECT *FROM zivotinja WHERE zivotinja_id='$id'";
		$rezultat = bazaUpit($veza, $upit);
		$prikazi=mysqli_fetch_array($rezultat)

?>
		
		
			<form id="editiranje" name="editiranje" method="post" action="">
				<label for="lokacija">Izaberi lokaciju: </label>
				<input name="lokacija[]" type="checkbox" value="3"/>Amazona
				<input name="lokacija[]" type="checkbox" value="4"/>Antartika
				<input name="lokacija[]" type="checkbox" value="1"/>Costa Rica
				<input name="lokacija[]" type="checkbox" value="2"/>Sahara
				<br>
			
				<label for="naziv">Naziv: </label>
				<input name="naziv" type="text" value="<?php echo $prikazi["naziv"] ?>"/>
				<br>
				
				<label for="opis">Opis: </label>
				<input name="opis" type="text" value="<?php echo $prikazi["opis"] ?>"/>
				<br>
				
				<label for="slika">Slika: </label>
				<input name="slika" type="text" value="<?php echo $prikazi["slika"] ?>"/>
				<br>
			
				<input class="pok" name="submit" type="submit" value="Unesi"><br>
				<input class="pok" id="reset" type="reset" name="reset" value="Inicijaliziraj"><br>
				
			</form> 
	
	</section>
</body>

<footer>
	<p>
		<small>
			<a href="o_autoru.html" style="color: white;">M. Franjković  2020&copy; </a>
		</small>
	</p>
</footer>