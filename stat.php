<?php
	session_start();
	if(isset($_SESSION["tip"]) && (($_SESSION["tip"] == 0) || ($_SESSION["tip"] == 1) || ($_SESSION["tip"] == 2))) { ?>
	
<?php
	include("baza_konekcija.php");
	include("header.php");
?>

<?php
	$veza = bazaConnect();
	$upit = "SELECT l.naziv as lokacija,
					l.lokacija_id as id, 
			COUNT(*) as broj_zivotinja 
			FROM zivotinje_na_lokaciji z, lokacija l 
			WHERE z.lokacija_id=l.lokacija_id 
			GROUP BY l.lokacija_id 
			ORDER BY l.naziv";
	$result = bazaUpit($veza, $upit);
	if (isset($result)) {
		while ($display = mysqli_fetch_array($result)) {
			echo "<br>";
?>
	<a href='zivotinje_na_lokaciji.php?id= <?php echo $display['id'] ?>'>
	<button>
		<?php echo ($display["lokacija"]) ?>
	</button></a>
<?php
		echo "Broj životinja: {$display["broj_zivotinja"]}<br>";
	}
}
?>

<?php bazaDisconnect($veza); ?>

<?php } ?>