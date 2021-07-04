<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");

	$id = $_GET["id"];

	$veza = bazaConnect();

	$upit = "SELECT * FROM zivotinja WHERE zivotinja_id ='{$id}'";
	$rezultat_zivotinja = bazaUpit($veza, $upit);
	$rezultat_zivotinja = mysqli_fetch_array($rezultat_zivotinja);	

	$upit = "SELECT * FROM `zivotinje_na_lokaciji` WHERE zivotinja_id='{$id}'";
	$rezultat_lokacije = bazaUpit($veza, $upit);
?>
<h1><?php echo $rezultat_zivotinja["naziv"] ?></h1>
<img style="height: 400px;" src="<?php echo ($rezultat_zivotinja["slika"]) ?>">
<h2>Opis: </h2>
<p><?php echo ($rezultat_zivotinja["opis"]) ?></p>

<h2>Lokacije divlje životinje:</h2>
<?php 
	while($lokacija = mysqli_fetch_array($rezultat_lokacije)) {
		$upit = "SELECT * FROM `lokacija` WHERE lokacija_id='".$lokacija["lokacija_id"]."'"; 
		$rezultat_lokacija = bazaUpit($veza, $upit);
		$rezultat_lokacija = mysqli_fetch_array($rezultat_lokacija);

		echo "<a href=popis_lokacija.php?id=".$lokacija["lokacija_id"].">".$rezultat_lokacija["naziv"]."</a><br>";
	}
?>
<?php
	include("footer.php");
	bazaDisconnect($veza);
?>