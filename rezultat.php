<?php
	session_start();
	include("bazaa.php");
	include("header.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Divlje životinje</title>
		<meta charset="UTF-8">
	</head>
<body>
<section>
<?php  
	$veza = spojiSeNaBazu();
			$razdobljeod = strtotime($_POST['datum']);
			$pretvarac1 = date('Y.m.d H:i:s', $razdobljeod);
			$razdobljedo = strtotime($_POST['vrijeme']);
			$pretvarac2 = date('Y.m.d H:i:s', $razdobljedo);
		$filtriranje = $_POST["lokacija"];
		$upit = 
		"SELECT * FROM zivotinja a, zivotinje_na_lokaciji b 
		WHERE a.zivotinja_id=b.zivotinja_id 
		AND b.lokacija_id='{$filtriranje}' 
		AND  datum_vrijeme_dodavanja BETWEEN '{$pretvarac1}' AND '{$pretvarac2}'";
		$result = izvrsiUpit($veza, $upit);
			while($display = mysqli_fetch_assoc($result)){
				$razdobljeod = date('d.m.Y H:i:s', $razdobljeod);
				echo"<tr><br>";
				echo"<td>Zivotinja id: {$display["zivotinja_id"]}</td><br>";
				echo"<td>Naziv: {$display["naziv"]}</td><br>";
				echo"<td>Datum i vrijeme dodavanja: {$razdobljeod}</td><br>";
				echo"<td>Slika: " ?><img src="<?php echo $display["slika"]; ?>"> <?php echo"</td><br>";
				echo"</tr>";
			}	
?>
</section>
</body>