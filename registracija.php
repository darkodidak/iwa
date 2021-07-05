<?php
	
	session_start();
	include_once("baza_konekcija.php");
	include_once("header.php");
	$veza = bazaConnect();
	$id_novi_korisnik="";


		if(isset($_POST["submit"])){
			$greska = "";
			$poruka = "";
			$korime = $_POST["korime"];
			$lozinka = $_POST["lozinka"];
			$ime = $_POST["ime"];
			$prezime = $_POST["prezime"];
			$email = $_POST["email"];
		
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

			
		
				if(empty($greska)){
					$poruka = "Kreirali ste račun! <br>";
					@mail($email, "Aktivacijski link", $poruka);
					$upit="INSERT INTO korisnik (tip_id, ime, prezime, email, korisnicko_ime, lozinka)
					VALUES (2, '{$ime}', '{$prezime}', '{$email}', '{$korime}', '{$lozinka}')";
					bazaUpit($veza, $upit);	
					$id_novi_korisnik = mysqli_insert_id($veza);
					$poruka = "Unesen je novi korisnik pod ključem: $id_novi_korisnik";
				}
		}
	

		
?>


<!DOCTYPE html>
<html lang="hr">
	<head>
		<title>Divlje životinje</title>
		<meta name="author" content="Moreno Franjković">
		<meta name="datum" content="6.2.2021.">
		<meta charset="UTF-8">
	
	</head>
<body>
<section>
		<h2>Registracija korisnika</h2>
			<h3>Forma za registraciju novog korisnika: </h3>
			<form id="prijava" name="prijava" method="post" action="registracija.php">
				<label for="korime">Korisničko ime: </label>
				<input name="korime" type="text" />
				<br>
				
				<label for="lozinka">Lozinka: </label>
				<input name="lozinka" type="password" />
				<br>
				
				<label for="ime">Ime: </label>
				<input name="ime" type="text" />
				<br>
				
				<label for="prezime">Prezime: </label>
				<input name="prezime" type="text" />
				<br>
				
				
				<label for="email">E-mail: </label>
				<input name="email" type="email" />
				<br>
				
				<input name="submit" type="submit" value="Unesi"><br>
	
				
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

<?php
	include_once("footer.php");
	bazaDisconnect($veza);
?>
	
