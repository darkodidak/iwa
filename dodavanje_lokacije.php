<?php 
session_start();
if(isset($_SESSION["tip"]) && ($_SESSION["tip"] == 0)) { ?>

    <?php
        include("baza_konekcija.php");
        include("header.php");

        echo "<h1>Dodavanje lokacije</h3>";

        $veza = bazaConnect();

        $upit = "SELECT * from korisnik where tip_id=1";
        $rezultat_korisnici = bazaUpit($veza, $upit);

        $upit = "SELECT lokacija_id from lokacija order by lokacija_id DESC";
        $rezultat_lokacija = bazaUpit($veza, $upit);
        $rezultat_lokacija = mysqli_fetch_array($rezultat_lokacija);

        $novi_id = (int)$rezultat_lokacija["lokacija_id"] + 1;
    ?>
    <form action="upit_dodaj_lokaciju.php" method="post">
        <label for="lokacija_id">lokacija_id: </label>
        <input name="lokacija_id" style=width:100%; type='text' readonly value="<?php echo (string)$novi_id ?>">

        <label for="moderator_id">moderator_id:</label>
        <select name="moderator_id" style="width: 100%">
            <?php 
                while($korisnik = mysqli_fetch_array($rezultat_korisnici)) {
                    echo "<option value=".$korisnik['korisnik_id'].">".$korisnik['korisnicko_ime']."</option>";
                }
            ?>
        </select>
        
        <label for="naziv">naziv: </label>
        <input name="naziv" style=width:100%; type='text' value="">

        <a>
            <input name="azuriraj" type="submit" value="Da">
        </a>
    </form>
    <?php
        include("footer.php");
        bazaDisconnect($veza);
    ?>

<?php } ?>