<?php

	$bdd = new PDO('mysql:host=localhost;dbname=maison', 'root', '');
	
	$monfichier = fopen('precipitations.csv', 'r');

	$point = array(); $nb = 0;

	while(!feof($monfichier)) 	{
		$ligne = explode(';', fgets($monfichier));
		$point[] = $ligne[7];
		$nb++;

		if ($nb == 12) {
			$base = array($ligne[0], $ligne[1], $ligne[2], min($point), array_sum($point)/12, max($point));

			// Ajout dans la base :
			$sql = "INSERT INTO pluie (point, lat, lon, min, moy, max) VALUES (" . implode(",", $base) . ");";
			$bdd->exec($sql);
			echo $sql . '<br/>';

			$nb = 0;
			$point = array();
		}
	}

	fclose($monfichier);

?>