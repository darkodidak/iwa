<?php
	include("bazaa.php");
	session_start();
?>
<?php
$idurl=$_GET["id"];	
	$veza = spojiSeNaBazu();
	$upit = "SELECT * FROM zivotinja WHERE zivotinja_id ='{$idurl}'";
	$result1 = izvrsiUpit($veza, $upit);
	$ispisi = mysqli_fetch_array($result1);	
?>
<?php if(isset($ispisi)){ ?>	
				<h2><?php echo ($ispisi["naziv"]) ?></h2>
				<p><img src="<?php echo ($ispisi["slika"]) ?>"width='200' height='255'></p>
				<h2>Opis: </h2>
				<p><?php echo ($ispisi["opis"]) ?></p>
		<?php }  ?>		
<?php
    $idurl=$_GET["id"];	
	$veza = spojiSeNaBazu();
	$upit = "SELECT * FROM `zivotinje_na_lokaciji` WHERE zivotinja_id='{$idurl}'";
	$rezz = izvrsiUpit($veza, $upit);
		echo "<h2>Lokacije divlje životinje: </h2>";
		if(isset($rezz)){
			while($prikazi = mysqli_fetch_array($rezz)){ 
				$upit = "SELECT * FROM `lokacija` WHERE lokacija_id='{$prikazi["lokacija_id"]}'"; 
				$result2 = izvrsiUpit($veza, $upit);
				if(isset($result2)){ 
					while($prikazi = mysqli_fetch_array($result2)){
						echo"<tr><br>";   
						echo"<td>"; ?> 
							<a href='popis_lokacija.php?id=<?php echo ($prikazi["lokacija_id"]) ?>'>
								<?php echo($prikazi["naziv"]) ?>
							</a>
					<?php echo"</td>"; ?> 
					<?php echo"<td>"; ?> 
					<?php if(isset($_SESSION["tip"]) && $_SESSION["tip"] == 0){ ?>
							<p>Lokacija ID: <?php echo ($prikazi["lokacija_id"]) ?></p>
					<?php echo"</td>"; ?>
					<?php echo"</tr>";
							} 
					} 
				} 
			} 
		}
?>