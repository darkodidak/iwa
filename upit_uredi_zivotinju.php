<?php	
    session_start();
	include("bazaa.php");

    if(isset($_POST["azuriraj"])){

        $veza = spojiSeNaBazu();

        $id_korisnika = $_SESSION["id"];

        $naziv = $_POST["naziv"];
        $opis = $_POST["opis"];
        $slika = $_POST["slika"];
        $id_zivotinje = $_POST["id_zivotinje"];
        $id_lokacije = $_POST["id_lokacije"];

        $date = date("y-m-d h:i:s");


        $upit="UPDATE zivotinja SET 
            korisnik_id='{$id_korisnika}', 
            datum_vrijeme_dodavanja = '$date', 
            naziv = '{$naziv}', 
            opis='{$opis}', 
            slika='{$slika}' 
        WHERE zivotinja_id = '{$id_zivotinje}'";

        $rezultat = izvrsiUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: zivotinje_na_lokaciji.php?id=".$id_lokacije);
        }
    }
?>
<?php zatvoriVezuNaBazu($veza); ?>