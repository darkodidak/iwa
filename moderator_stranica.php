<?php

	session_start();
	include_once("header.php");

?>
<?php 
	if(isset($_SESSION["tip"]) && $_SESSION["tip"] == 1) { ?>

<!DOCTYPE html>
<html lang="hr">
	<head>
		<title>Divlje životinje</title>
		<meta charset="UTF-8">
	
	</head>

<body>
	<section>
	<div>
	<?php
	
		include ("baza_konekcija.php");
		$veza = bazaConnect();
		$upit = "SELECT * FROM lokacija WHERE moderator_id='{$_SESSION["id"]}'";
		$rezultat = bazaUpit($veza, $upit);
		
			if(isset($rezultat)){
				while ($prikazi=mysqli_fetch_array($rezultat)){
					echo "<tr><br>";
					echo "<td>{$prikazi["naziv"]}</td><br>";
					echo "</tr>"; ?>
					
		<form id="prikaz_zivotinja_na_lokaciji" name="prikaz" method="post" action="moderator_stranica.php" >	
		
				<input method="post" class="pok" name="submit" type="submit" value="Prikaži životinje" ><br>
				<input method="post" class="pok" name="submit" type="hidden" value="<?php echo $prikazi["lokacija_id"]?>" />
						
		</form>
						
			<?php	echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<p style ='color:white'>Nemate dodijeljenu lokaciju!</p>";
			}
			
			if(isset($_POST["submit"])){
				$upit = "SELECT * FROM zivotinje_na_lokaciji WHERE lokacija_id='{$_POST["submit"]}'";
				$rez = bazaUpit($veza, $upit);
				
					if(isset($rez)){
						while($prikazii=mysqli_fetch_assoc($rez)){
							$upit = "SELECT * FROM zivotinja WHERE zivotinja_id='{$prikazii["zivotinja_id"]}'";
							$rezz = bazaUpit($veza, $upit); ?>
							<?php	if(isset($rezz)){
									while($prikaziii=mysqli_fetch_array($rezz)){ ?>
									
										<table border="1">
										<caption>Ispis unesenih životinja</caption>
											<thead>
												<tr>
													<th>Životinja ID</th>
													<th>Slika</th>
													<th>Naziv</th>
													<th>Ažuriraj</th>
													<th>Ukloni sa lokacije</th>
													<th>Dodano od drugog korisnika</th>
												</tr>
											</thead>
										<tbody> <?php
										
										
											echo"<tr>";
											echo"<td>{$prikaziii[0]}</td>";
											echo"<td>"; ?><a class="slika_tablica"> <img src="<?php echo $prikaziii["slika"]; ?>"></a><?php echo "</td>";
											echo"<td>{$prikaziii["naziv"]}</td>";
											echo"<td><a href='editiranje_zivotinje.php?id={$prikaziii[0]}'>Ažuriraj</a></td>";
											echo"<td>"; ?>
											
											<form id="ukloni" name="prikaz" method="post" >	
		
												<input method="post" class="pok" name="submitt" type="submit" value="Ukloni" ><br>
												<input method="post" class="pok" name="submitt" type="hidden" value="<?php echo $prikaziii["zivotinja_id"]?>" />
											
											</form>
											
								<?php		echo"</td>";
											
											if(($prikaziii["korisnik_id"]) == ($_SESSION["id"])){
													echo"<td> 0 </td>";
											}	else {
													echo"<td> 1 </td>";
											}
											echo"</tr>"; ?>
											
										</tbody>
									</table>
									
										<?php
									}
								}
						}
					} 
			}
			
			
			if(isset($_POST["submitt"])){
				$upit = "SELECT * FROM zivotinje_na_lokaciji WHERE zivotinja_id ='{$_POST["submitt"]}'";
				$rezultat = bazaUpit($veza, $upit);
				
					if(isset($rezultat)){
						while($prikazi=mysqli_fetch_assoc($rezultat)){
							if(($prikazi["admin"]) == 0){
								
								$upit = "DELETE FROM zivotinje_na_lokaciji WHERE zivotinja_id ='{$_POST["submitt"]}' AND admin='0'";
								$rezultat = bazaUpit($veza, $upit);
								
									echo"Životinja je uklonjena!";
									
							} else {
								
									echo"Životinja nemože biti uklonjena, jer je dodana od strane administratora!";
									
							}
							
						}
					}
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
<?php } ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	