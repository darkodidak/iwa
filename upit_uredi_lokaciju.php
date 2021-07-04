<?php	
    session_start();
	include("baza_konekcija.php");

    if(isset($_POST["azuriraj"])){

        $veza = bazaConnect();

        $id_lokacije = $_POST["lokacija_id"];
        $id_moderatora = $_POST["moderator_id"];
        $naziv = $_POST["naziv"];

        $upit="UPDATE lokacija SET 
            moderator_id='{$id_moderatora}', 
            naziv='{$naziv}' 
        WHERE lokacija_id = '{$id_lokacije}'";

        $rezultat = bazaUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: lokacije.php");
        }
    }
?>
<?php bazaDisconnect($veza); ?>