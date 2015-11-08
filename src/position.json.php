<?php

	include('php/mdpDB.php');

	include('php/utilitaire.php');

	if(isset($_GET['lat'], $_GET['lon'])) {

		$position = new Position($bdd);
		$position->charger($_GET['lat'], $_GET['lon']);
		echo json_encode($position->getInfo());
	}

?>