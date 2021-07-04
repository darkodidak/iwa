<?php
	session_start();
	include("bazaa.php");
	include("header.php");
?>
<?php 
	if(isset($_SESSION["tip"]) && $_SESSION["tip"] == 0) { ?>


<?php
		$veza = spojiSeNaBazu();
		$upit = "SELECT *FROM korisnik";
		$rezultat = izvrsiUpit($veza, $upit);
?>
			<table>
					<?php 
						if(isset($rezultat)){
							while($redak=mysqli_fetch_array($rezultat)){
								echo "<tr>
									<td>{$redak['korisnik_id']}</td>
									<td>{$redak['tip_id']}</td>
									<td>{$redak['korisnicko_ime']}</td>
									<td>{$redak['ime']}</td>
									<td>{$redak['prezime']}</td>
									<td>{$redak['email']}</td>
									<td>{$redak['slika']}</td>";
									echo"<td>";?> <img src="<?php echo ($redak["slika"]) ?>""width='150' height='150'><?php echo"</td>";
									echo "<td><a href='editiranje_korisnika.php?id={$redak['korisnik_id']}'>Uredi</a></td>";
								echo"</tr>";
							}
							
						}
					?>
</table> 


<?php
	include_once("footer.php");
?>

<?php } ?>
	

	

