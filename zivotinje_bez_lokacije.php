<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");
?>
<?php
		$veza = bazaConnect();

		$session_user = $_SESSION;

		if ($session_user["tip"] == 0) {
			$upit = "SELECT zivotinja.zivotinja_id, zivotinja.naziv
            FROM `zivotinja` 
            left join zivotinje_na_lokaciji on zivotinja.zivotinja_id=zivotinje_na_lokaciji.zivotinja_id 
            where zivotinje_na_lokaciji.zivotinja_id IS NULL";
		}

		$rezultat = bazaUpit($veza, $upit);

        echo "<table>
		<tr>
			<td class=column3333>ID</td>
			<td class=column3333>NAZIV</td>
			<td class=column3333>DODAJ LOKACIJU</td>
		</tr>
		";

        while($zivotinja_bez_lokacije = mysqli_fetch_array($rezultat)) {
            
            echo "  <tr>
                        <td class=column3333>".$zivotinja_bez_lokacije['zivotinja_id']."</td>
                        <td class=column3333>".$zivotinja_bez_lokacije['naziv']."</td>
                        <td class=column3333><a href=zivotinja_bez_lokacije_dodaj.php?id=".$zivotinja_bez_lokacije["zivotinja_id"].">Dodaj Lokaciju</a></td>
				    </tr>
                ";
        }

        echo "</table>";
?>	

<?php
	include("footer.php");
    bazaDisconnect($veza);
?>
