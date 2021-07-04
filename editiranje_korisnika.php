<?php
	session_start();
	include("baza_konekcija.php");
	$veza = bazaConnect();
	$id_azuriranja_korisnik = $_GET["id"];

	
		if(isset($_POST["submit"])){
			$greska = "";
			$poruka = "";
			$korime = $_POST["korime"];
			$lozinka = $_POST["lozinka"];
			$ime = $_POST["ime"];
			$prezime = $_POST["prezime"];
			$email = $_POST["email"];
			$slika = $_POST["slika"];

			
			if(!isset($korime) || empty($korime)){
				$greska .= "Niste unijeli korisničko ime! <br>";
			
			}
		
			if(!isset($ime) || empty($ime)){
				$greska .= "Niste unijeli ime! <br>";
					
			}
			if(!isset($prezime) || empty($prezime)){
				$greska .= "Niste unijeli prezime! <br>";
			
			}
			if(!isset($ime) || empty($ime)){
				$greska .= "Niste unijeli ime! <br>";
			
			}
			if(!isset($email) || empty($email)){
				$greska .= "Niste unijeli e-mail! <br>";
			
			}
			if(!isset($slika) || empty($slika)){
				$greska .= "Niste unijeli sliku! <br>";
			}
		
			if(empty($greska)){
				$poruka = "Kreirali ste račun! <br>";
				$upit="UPDATE korisnik SET tip_id='{$_POST["tip_id"]}', korisnicko_ime='{$korime}', lozinka='{$lozinka}', ime='{$ime}', prezime='{$prezime}', email='{$email}', slika='{$slika}'
				WHERE korisnik_id = '{$id_azuriranja_korisnik}'";
				bazaUpit($veza, $upit);	
				$poruka = "Podaci su ažurirani pod ključem: $id_azuriranja_korisnik";
			}
		
		
		}
	
		$upit = "SELECT *FROM korisnik WHERE korisnik_id = '{$id_azuriranja_korisnik}'";
		$rezultat = bazaUpit($veza, $upit);
		$rezultat_ispis = mysqli_fetch_assoc($rezultat);
		$upit = "SELECT *FROM tip_korisnika WHERE tip_id";
		$rezultat_tipovi = bazaUpit($veza, $upit);	
?>


<?php 
	if(isset($_SESSION["tip"]) && $_SESSION["tip"] == 0) { ?>
<!DOCTYPE html>
<html lang="hr">
	<head>
		<title>Divlje životinje</title>
		<meta charset="UTF-8">
	</head>
<body>
	<section>
		<h2>Ažuriranje korisnika</h2>
			<h3>
				<?php  
				
				echo"AŽuriraj korisnika: $id_azuriranja_korisnik";
				
				?>
			</h3>
			<form id="prijava" name="prijava" method="post" action="">
				<label for="tip_id">Tip ID: </label><br>
				<input type="radio" name="tip_id" value="2" />Korisnik
				<input type="radio" name="tip_id" value="1" />Voditelj
				<br>
			
				<label for="korime">Korisničko ime: </label>
				<input name="korime" type="text" value="<?php echo $rezultat_ispis["korisnicko_ime"] ?>"/>
				<br>
				
				<label for="lozinka">Lozinka: </label>
				<input name="lozinka" type="password" value="<?php echo $rezultat_ispis["lozinka"] ?>"/>
				<br>
				
				<label for="ime">Ime: </label>
				<input name="ime" type="text" value="<?php echo $rezultat_ispis["ime"] ?>"/>
				<br>
				
				<label for="prezime">Prezime: </label>
				<input name="prezime" type="text" value="<?php echo $rezultat_ispis["prezime"] ?>"/>
				<br>
				
				<label for="email">E-mail: </label>
				<input name="email" type="email" value="<?php echo $rezultat_ispis["email"] ?>"/>
				<br>
				
				<label for="slika">Slika: </label>
				<input name="slika" type="text" value="<?php echo $rezultat_ispis["slika"] ?>"/>
				<br>
				
				<input class="pok" name="submit" type="submit" value="Unesi"><br>
				<input class="pok" id="reset" type="reset" name="reset" value="Inicijaliziraj"><br>
				
			</form> 
	</section>
</body>
<?php } ?>
<?php bazaDisconnect($veza);?> 
	
