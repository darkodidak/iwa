<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Divlje životinje</title>
		<meta charset="UTF-8">
	<section>
<?php 
	$url=$_GET["id"];
	$veza = bazaConnect();
	$upit = "SELECT * FROM `zivotinje_na_lokaciji` WHERE `lokacija_id`='{$url}'";
	$result = bazaUpit($veza, $upit);
		if(isset($result)){ 
			while($result1 = mysqli_fetch_array($result)){ 
				$upit = "SELECT * FROM `zivotinja` WHERE `zivotinja_id`='{$result1["zivotinja_id"]}'";
				$rezz = bazaUpit($veza, $upit);
					if(isset($rezz)){ 
						while($display = mysqli_fetch_array($rezz)){ 
						?>	
					<?php	echo"<br>";?>
								<a href='info_zivotinja.php?id=<?php echo $display["zivotinja_id"] ?>'>
									<?php echo($display["naziv"]) ?>
								</a>
					<?php
					} 
				}
			} 
		} 
		
?> 
	</section>
</body>
<?php
	include("footer.php");
	bazaDisconnect($veza);
?>