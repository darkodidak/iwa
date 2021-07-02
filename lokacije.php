<?php
	include("bazaa.php");
	include("header.php");
	session_start();
?>
<?php 
	if(isset($_SESSION["tip"]) && ($_SESSION["tip"] == 0 || $_SESSION["tip"] == 1)) { ?>
<?php
		$veza = spojiSeNaBazu();
		$upit = "SELECT *FROM lokacija";
		$rezultat = izvrsiUpit($veza, $upit);
?>	
			<table
					<?php 
						if(isset($rezultat)){
							while($redak1=mysqli_fetch_array($rezultat)){
								$upit = "SELECT *FROM korisnik WHERE korisnik_id='{$redak1["1"]}'";
								$rezultat1 = izvrsiUpit($veza, $upit);
								while($mod=mysqli_fetch_array($rezultat1)){
									echo"<tr>
									<td>{$redak1['lokacija_id']}</td>
									<td>{$redak1['moderator_id']}</td>
									<td>{$redak1['naziv']}</td>";
									echo"<td><a href='editiranje_lokacije.php?id={$redak1['lokacija_id']}'>Ažuriraj</a></td>";
									echo"</tr>";
								}	
							}
							
						}
					?>

			</table> 
<?php } ?>
	
