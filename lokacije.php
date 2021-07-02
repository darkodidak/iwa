<?php
	include("bazaa.php");
	include("header.php");
	session_start();
?>
<?php
	if(!isset($_SESSION["id"])){
		header("Location: prijava.php");
	}
	elseif($_SESSION["tip"] != 0){
		header("Location: index.php");
	}
	echo"Dobrodošli " . $_SESSION["ime"] ;
?>
<?php
		$veza = spojiSeNaBazu();
		$upit = "SELECT *FROM lokacija";
		$rezultat = izvrsiUpit($veza, $upit);
?>	
		

<?php
	include("footer.php");
	session_start();
?>
