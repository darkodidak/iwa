<?php
	session_start();
	include("bazaa.php");
	include("header.php");

    $veza = spojiSeNaBazu();

    $id_lokacije = $_GET["id"];

    $upit = "SELECT * FROM zivotinje_na_lokaciji 
    left join zivotinja on zivotinje_na_lokaciji.zivotinja_id=zivotinja.zivotinja_id 
    where zivotinje_na_lokaciji.lokacija_id=".$id_lokacije;

    $rezultat = izvrsiUpit($veza, $upit);

    while($zivotinja = mysqli_fetch_array($rezultat)) {
        echo "<table><tr>
            <td>{$zivotinja['naziv']}</td>
            <td>{$zivotinja['zivotinja_id']}</td>
            <td>{$zivotinja['korisnik_id']}</td>
            <td>{$zivotinja['lokacija_id']}</td>";
            if ($zivotinja["admin"] == 0) {
                echo "<td><a style=height:20px; width:20px; background-colro:red; 
                href=\"obrisi_zivotinju.php?lokacija_id=".$id_lokacije."&zivotinja_id=".$zivotinja["zivotinja_id"]."\">Obrisi</a></td>";
            }
        echo "<td><a style=height:20px; width:20px; background-colro:red; 
        href=\"uredi_zivotinju.php?&zivotinja_id=".$zivotinja["zivotinja_id"]."&lokacija_id=".$id_lokacije."\">Uredi</a></td>";
        echo "</tr></table>";
    }
?>
<?php
	include("footer.php");
?>