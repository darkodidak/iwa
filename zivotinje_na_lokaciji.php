<?php
	session_start();
	include("baza_konekcija.php");
	include("header.php");

    $veza = bazaConnect();

    $id_lokacije = $_GET["id"];

    $upit = "SELECT * FROM zivotinje_na_lokaciji 
    left join zivotinja on zivotinje_na_lokaciji.zivotinja_id=zivotinja.zivotinja_id 
    where zivotinje_na_lokaciji.lokacija_id=".$id_lokacije;

    $rezultat = bazaUpit($veza, $upit);

    echo "<table>
    <tr>
        <td class=column1666>NAZIV</td>
        <td class=column1666>ID</td>
        <td class=column1666>KORISNIK ID</td>
        <td class=column1666>LOKACIJA ID</td>
        <td class=column1666>UREDI</td>
        <td class=column1666>OBRISI</td>
    </tr>
    ";

    while($zivotinja = mysqli_fetch_array($rezultat)) {
        echo "<tr>
            <td class=column1666>{$zivotinja['naziv']}</td>
            <td class=column1666>{$zivotinja['zivotinja_id']}</td>
            <td class=column1666>{$zivotinja['korisnik_id']}</td>
            <td class=column1666>{$zivotinja['lokacija_id']}</td>
            <td class=column1666><a href=\"uredi_zivotinju.php?&zivotinja_id=".$zivotinja["zivotinja_id"]."&lokacija_id=".$id_lokacije."\">Uredi</a></td>";

        if ($zivotinja["admin"] == 0) {
            echo "<td class=column1666><a style=height:20px; width:20px; background-colro:red; 
            href=\"upit_obrisi_zivotinju.php?lokacija_id=".$id_lokacije."&zivotinja_id=".$zivotinja["zivotinja_id"]."\">Obrisi</a></td>";
        }

        echo "</tr>";
    }

    echo "</table>";
?>
<?php
	include("footer.php");
?>
<?php bazaDisconnect($veza); ?>