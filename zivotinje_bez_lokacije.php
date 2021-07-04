<?php
	session_start();
	include("bazaa.php");
	include("header.php");
?>
<?php
		$veza = spojiSeNaBazu();

		$session_user = $_SESSION;

		if ($session_user["tip"] == 0) {
			$upit = "SELECT zivotinja.zivotinja_id, zivotinja.naziv
            FROM `zivotinja` 
            left join zivotinje_na_lokaciji on zivotinja.zivotinja_id=zivotinje_na_lokaciji.zivotinja_id 
            where zivotinje_na_lokaciji.zivotinja_id IS NULL";
		}

		$rezultat = izvrsiUpit($veza, $upit);

        while($zivotinja_bez_lokacije = mysqli_fetch_array($rezultat)) {
            
            echo "<table>
                    <tr>
                        <td>".$zivotinja_bez_lokacije['zivotinja_id']."</td>
                        <td>".$zivotinja_bez_lokacije['naziv']."</td>
                        <td><a href=zivotinja_bez_lokacije_dodaj.php?id=".$zivotinja_bez_lokacije["zivotinja_id"].">Dodaj Lokaciju</a></td>
				    </tr>
                </table>";
        }
?>	

<?php
	include("footer.php");
    zatvoriVezuNaBazu($veza);
?>
