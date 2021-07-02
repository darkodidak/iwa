<?php
	session_start();
	include("bazaa.php");
	include("footer.php");
?>
<!DOCTYPE html>
<h1>Divlje životinje</h1>
<?php
	$veza = spojiSeNaBazu();
	$upit = "SELECT * FROM `zivotinja` ORDER BY `zivotinja`.`datum_vrijeme_dodavanja` DESC";
	$slika = izvrsiUpit($veza, $upit);
		if(isset($slika)){
			while($ispisi = mysqli_fetch_array($slika)){ ?>
			<br>
				<a href='info_zivotinja.php?id=<?php echo $ispisi[0] ?>'>
				<img src ="<?php echo $ispisi["slika"] ?>"width='200' height='255'>
				</a> <?php 
				echo "</td>";
				echo "<td>{$ispisi["naziv"]}</td>";
				echo "</tr>";?>
			</table><?php
}
}	
?>