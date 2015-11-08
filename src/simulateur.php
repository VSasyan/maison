<!DOCTYPE html>
<html>
	<head>
		<title>Simulateur – District+</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,700,300,600' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="style.css">
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
		<script type="text/javascript" src="js/Chart.Core.js"></script>
		<script type="text/javascript" src="js/Chart.Doughnut.js"></script>
		<script type="text/javascript" src="calculator.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
	</head>

	<body onload="initialize()">
		<nav>
			<?php
				$accueil = '';
				$projet = '';
				$simulateur = '';

				$simulateur = 'selected';
				include('php/menu.php');
			?>
		</nav>
		<section>
			<div id="selector">
				<h1> Veuillez sélectionner votre région</h1>
				<div id="map-canvas"></div>
			</div>
			<div id="result" class="no" >
				<h1>Rapport <span id="city"></span></h1>
				<div id="ajax"></div>
			</div> 
		</section>
	</body>
</html>