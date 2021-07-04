<?php
	include("baza_konekcija.php");
	session_start();


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
	
<?php

	
	if(!isset($_SESSION["id"])){
		header("Location: prijava.php");
	}
	elseif($_SESSION["tip"] != 0){
		header("Location: index.php");
	}
	echo"Dobrodošli " . $_SESSION["ime"] ;
?>

<?php

		include_once("baza_konekcija.php");
		$veza = bazaConnect();
		$upit = "SELECT *FROM korisnik";
		$rezultat = bazaUpit($veza, $upit);
	
?>
					
			<form id="prikaz_korisnika" name="prikaz_korisnika" method="post" action="korisnici.php" >		
				<input method="post" class="pok" name="submit" type="submit" value="Tablica korisnika" ><br>
				<input method="post" class="pok" name="submit" type="hidden" value="<?php ?>" />
			</form>			
			<html>    

<?php if(isset($_POST["submit"])){ ?>
	
			<table>
			
					<?php 
						if(isset($rezultat)){
							while($redak=mysqli_fetch_array($rezultat)){
							
								echo "<tr>
									<td>{$redak['korisnik_id']}</td>
									<td>{$redak['tip_id']}</td>
									<td>{$redak['korisnicko_ime']}</td>
									<td>{$redak['ime']}</td>
									<td>{$redak['prezime']}</td>
									<td>{$redak['email']}</td>
									<td>{$redak['slika']}</td>";
									echo"<td>";?> <img src="<?php echo ($redak["slika"]) ?>""width='150' height='150'><?php echo"</td>";
									echo "<td><a href='editiranje_korisnika.php?id={$redak['korisnik_id']}'>Uredi</a></td>";
								echo"</tr>";
							}
							
						}
					?>
			</table> 
<?php } ?>