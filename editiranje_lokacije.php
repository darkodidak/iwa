<?php
		include("baza_konekcija.php");
		include("footer.php");
		session_start();
?>
<?php
	if($_SESSION["tip"] == 0){
		include("footer.php");
	} elseif($_SESSION["tip"] != 0){
		header("Location: index.php");
	}
	echo"Dobrodošli " . $_SESSION["ime"] ;
?>
<!DOCTYPE html>
<html lang="hr">
	<head>
		<title>Divlje životinje</title>
		<meta charset="UTF-8">
	</head>
<body>
	<section>
				<tbody>
					<?php
		$veza = bazaConnect();
		$upit = "SELECT * FROM lokacija";
		$rezultat = bazaUpit($veza, $upit);
?>
			<table>
					<?php 
						if(isset($rezultat)){
							while($redak=mysqli_fetch_array($rezultat)){
								echo  "<td>{$redak['naziv']}</td>";
							}
						}
?>		
							<?php
		
		$upit = "SELECT * FROM lokacija z, korisnik l WHERE z.moderator_id=l.korisnik_id";
		$rezultat1 = bazaUpit($veza, $upit);
?>
			<table>
					<?php 
						if(isset($rezultat1)){
							while($redak=mysqli_fetch_array($rezultat1)){
								echo  "<td>{$redak['ime']}</td>";
								echo  "<td>{$redak['prezime']}</td>";
								echo  "<td>{$redak['naziv']}</td>";
							}
						}
						
?>		
			</table> 	
<?php
$greska = "";
$id=$_GET["id"];
$upit ="SELECT * FROM lokacija WHERE lokacija_id='{$id}'";
$rezultattt = bazaUpit($veza, $upit);
$rezultat_ispis = mysqli_fetch_assoc(rezultattt);
if($moderator_id) {
$moderator_id = $_POST ['moderator_id'];
$lokacija = $_POST ['lokacija'];
$query = "UPDATE lokacija SET 
		  moderator_id = '$moderator_id';
		  lokacija		  = '$lokacija';"	  
}
else($moderator_id)
{
$moderator_id = "";
$lokacija = "";
$id			 = $_POST ['novi_id'];
$query_unos = "INSERT INTO lokacija 
			   (moderator_id, lokacija)
			   VALUES 
			   ('$moderator_id', '$lokacija')";
}
?>	

















?>
			<br><br>
			<form method="post">
				<label for="moderator_id">Moderator ID: </label>
				<input name="moderator_id" type="text" value="<?php echo $rezultat_ispis["moderator_id"] ?>"/>
				<br>
				<label for="lokacija">Naziv lokacije: </label>
				<input name="lokacija" type="text" value="<?php echo $rezultat_ispis["naziv"] ?>"/>
				<br><br>
				<input class="pok" name="submit" type="submit" value="Unesi" />
				
				<br>
			</form>

		
	
	
	</section>
</body>			
