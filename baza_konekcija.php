<?php

define("BAZA_KORISNIK", "iwa_2020");
define("BAZA_LOZINKA", "foi2020");
define("POSLUZITELJ", "localhost");
define("BAZA", "iwa_2020_zb_projekt");

function bazaConnect()
{
	$veza = mysqli_connect(POSLUZITELJ, BAZA_KORISNIK, BAZA_LOZINKA);

	if (!$veza) {
		echo "Neuspjeh povezivanja baze: ".mysqli_connect_error();
	}

	mysqli_select_db($veza, BAZA);

	mysqli_set_charset($veza, "utf8");

	return $veza;
}

function bazaDisconnect($veza)
{
	mysqli_close($veza);
}

function bazaUpit($veza, $upit)
{
	$rezultat = mysqli_query($veza, $upit);

	if (mysqli_error($veza) !== "") {
		echo "Neuspjesan upit: " . $upit . " greska: ". mysqli_error($veza);
	}

	return $rezultat;
}
