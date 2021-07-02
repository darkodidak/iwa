</div>
<nav>
		<?php if(isset($_SESSION["id"])){ ?>
				<li><a href="index.php">Početna stranica</a></li>
				<li><a href="filtriranje.php">Filtriraj</a></li>
				<li><a href="stat.php">Statistika</a></li>
				<?php if(isset($_SESSION["tip"]) && ($_SESSION["tip"]) == 1) { ?>
				<li><a href="dodavanje_zivotinje.php">Dodaj novu životinju</a></li>
				<li><a href="moderator_stranica.php">Moderator stranica</a></li>
				<?php } ?>
				
		<?php } ?>
		
		<?php if(isset($_SESSION["tip"]) && $_SESSION["tip"] == 0) { ?>
		
				<li><a href="dodavanje_zivotinje.php">Dodaj novu životinju</a></li>
				<li><a href="korisnici.php">Korisnici</a></li>
				<li><a href="registracija.php">Registracija</a></li>
		<?php } ?>
		<?php if(!isset($_SESSION["id"])){ ?>
		<div id="meni_prijava">
			<li><a href="prijava.php">Prijava</a></li>
		<?php } else { ?>
			<li><a href="prijava.php?odjava=1">Odjava</a></li>
		</div>
		<?php } ?>
	
</nav>
</div>