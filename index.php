<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");
?>
<h1>Divlje životinje</h1>
<?php
	$veza = bazaConnect();
	$upit = "SELECT * FROM `zivotinja` ORDER BY `zivotinja`.`datum_vrijeme_dodavanja` DESC";
	$zivotinje = bazaUpit($veza, $upit);
	
	if(isset($zivotinje)){
		
		$i = 0;

		while($zivotinja = mysqli_fetch_array($zivotinje)) {
			if ($i % 3 == 0) {
				echo "<div class=row>";
			}

			echo "
				<a href=info_zivotinja.php?id=".$zivotinja["zivotinja_id"].">
					<img style=height:250px; src=".$zivotinja["slika"].">
					<i>".$zivotinja["naziv"]."</i>
				</a>&nbsp;
			";

			$i += 1;

			if ($i % 3 == 0 && $i != 0) {
				echo "</div><br><br>";
			}
		}
	}
	
?>
<?php
	include("footer.php");
	bazaDisconnect($veza);
?>