<nav>
	<div class="row">
		<?php if(!isset($_SESSION["id"])){ ?>
					<li><a href="prijava.php">Prijava</a></li>
					<?php } else { ?>
					<li><a href="prijava.php?odjava=1">Odjava</a></li>
				<?php } ?>
		<?php if(isset($_SESSION["id"])){ ?>
	</div>
	<div class="row">
		<table>
			<tr>
				<th class="column1666 navigation-button"><a href="index.php">Početna stranica</a></th>
				<th class="column1666 navigation-button"><a href="filtriranje.php">Filtriraj</a></th>
				<th class="column1666 navigation-button"><a href="stat.php">Statistika</a></th>
				<th>
					<?php 
					if(isset($_SESSION["tip"]) && ($_SESSION["tip"]) == 1) { 
					?>
				<th>
				<th class="column1666 navigation-button"><a href="dodavanje_zivotinje.php">Dodaj novu životinju</a></th>
				<th class="column1666 navigation-button"><a href="moderator_stranica.php">Moderator stranica</a></th>
				<th class="column1666 navigation-button">
					<?php } ?>
					<?php
					if(isset($_SESSION["tip"]) && $_SESSION["tip"] == 0) { ?>
				<th class="column1666 navigation-button"><a href="dodavanje_zivotinje.php">Dodaj novu životinju</a></th>
				<th class="column1666 navigation-button"><a href="korisnici.php">Korisnici</a></th>
				<th class="column1666 navigation-button"><a href="registracija.php">Registracija</a></th>
				<?php } ?>
			</tr>
		</table>
	</div>	
	<?php } ?>
</nav>