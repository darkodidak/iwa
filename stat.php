<?php
	session_start();
	include("bazaa.php");
	include("header.php");
?>
<!DOCTYPE html>
<html >
	<head>
		<title>Divlje životinje</title>
		<meta charset="UTF-8">
<body>
<section>
	<?php  
		$veza = spojiSeNaBazu();
		$upit = "SELECT l.naziv as lokacija, 
		COUNT(*) as broj_zivotinja 
		FROM zivotinje_na_lokaciji z, lokacija l 
		WHERE z.lokacija_id=l.lokacija_id 
		GROUP BY l.lokacija_id 
		ORDER BY l.naziv";
		$result = izvrsiUpit($veza, $upit);
		if(isset($result)){
		 while($display=mysqli_fetch_array($result)){
			echo"<br>";   
			?> 
				<a href='popis_lokacija.php?id=
				<?php 
				if ($display["lokacija"] == 'Costa Rica') {
							echo'1';
				}elseif ($display["lokacija"] == 'Sahara') {
							echo'2'; 
				}elseif ($display["lokacija"] == 'Amazona') {
							echo '3'; 
				}elseif ($display["lokacija"] == 'Antartika') {
							echo '4'; 
				}else 			
				?>'>
				<button>
					<?php echo($display["lokacija"]) ?>
				</button></a>
			<?php  
			echo"Broj životinja: {$display["broj_zivotinja"]}<br>";
			}
		}
	?>
</section>
</body>
<?php zatvoriVezuNaBazu($veza); ?>