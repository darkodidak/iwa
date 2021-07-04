<?php	
    session_start();
	include("bazaa.php");

    if(isset($_POST["azuriraj"])){

        $veza = spojiSeNaBazu();

        $id_lokacije = $_POST["lokacija_id"];
        $id_moderatora = $_POST["moderator_id"];
        $naziv = $_POST["naziv"];

        $upit="UPDATE lokacija SET 
            moderator_id='{$id_moderatora}', 
            naziv='{$naziv}' 
        WHERE lokacija_id = '{$id_lokacije}'";

        $rezultat = izvrsiUpit($veza, $upit);

        if ($rezultat == true) {
            header("Location: lokacije.php");
        }
    }
?>
<?php zatvoriVezuNaBazu($veza); ?>