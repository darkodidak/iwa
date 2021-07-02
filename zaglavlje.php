<?php
	include("baza.php");
	if(session_id()=="")session_start();

	$trenutna=basename($_SERVER["PHP_SELF"]);
	$putanja=$_SERVER['REQUEST_URI'];
	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	$vel_str=5; // broj prikazanih elemenata na stranici s korisnicima
	$vel_str_video=20; 	// broj prikazanih elemenata na stranici s video materijalima

	if(isset($_SESSION['aktivni_korisnik'])){
		$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		$aktivni_korisnik_id=$_SESSION["aktivni_korisnik_id"];
	}
?>
<!DOCTYPE html>
<html>
	<head>
	
		<title>Ogledna aplikacija - Demo videoteka</title>
		<meta name="autor" content="IWA Webmaster"/>
		<meta name="datum" content="10.10.2016."/>
		<meta charset="utf-8"/>
		<link href="video.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="video.js"></script>
	</head>
	<body onload="forma();">
		<header>
			<span>
				<strong>Izgradnja Web aplikacija - Ogledna aplikacija</strong>
				<br/>
				<?php
					echo "<strong>Trenutna lokacija: </strong>".$trenutna."<br/>";
					if($aktivni_korisnik===0){
						echo "<span><strong>Status: </strong>Neprijavljeni korisnik</span><br/>";
						echo "<a id='tekst' onclick='sakrijMeni();' class='link' href='#'>sakrij meni</a><br/>";
						echo "<a class='link' href='login.php'>prijava</a>";
					}
					else{
						echo "<span><strong>Status: </strong>Dobrodošli, $aktivni_korisnik_ime</span><br/>";
						echo "<a id='tekst' onclick='sakrijMeni();' class='link' href='#'>sakrij meni</a><br/>";
						echo "<a class='link' href='prijava.php?logout=1'>odjava</a>";
					}
				?>
			</span>
		</header>
		<nav id="navigacija" class="menu">
			<?php
				switch(true){
					case $trenutna:
						switch($aktivni_korisnik_tip>=0) {
							case 'true':
								echo '<a href="index.php"';
								if($trenutna=="index.php")echo ' class="aktivna"';
								echo ">Početna stranica</a>";
								echo '<a href="korisnici.php"';
								if($trenutna=="korisnici.php")echo ' class="aktivna"';
								echo ">Detaljne informacije</a>";
								echo '<a href="materijali.php"';
								if($trenutna=="materijali.php")echo ' class="aktivna"';
								echo ">FILMOVI</a>";
								echo '<a href="posudbe.php"';
								if($trenutna=="posudbe.php")echo ' class="aktivna"';
								echo ">POSUDBE</a>";
								echo '<a href="posudbe.php"';
								if($trenutna=="posudbe.php")echo ' class="aktivna"';
								echo ">UREDI ŽIVOTINJU</a>";
								break;

							default:
								echo '<a href="index.php"';
								if($trenutna=="index.php")echo ' class="aktivna"';
								echo ">POČETAK</a>";
								echo '<a href="korisnici.php"';
								if($trenutna=="korisnici.php")echo ' class="aktivna"';
								echo ">KORISNICI</a>";
								echo '<a href="materijali.php"';
								if($trenutna=="materijali.php")echo ' class="aktivna"';
								echo ">FILMOVI</a>";
								break;
						}

					default:
						break;
				}
			?>
		</nav>
		<section id="sadrzaj">
	

<?php
	include_once("footer.php");
?>
