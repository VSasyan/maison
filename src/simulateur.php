<!DOCTYPE html>
<html>
	<head>
		<title>Simulateur – District+</title>
		<link rel="icon" type="image/png" href="img/icon.png" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,700,300,600' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="style.css">
    	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_aJha7D3ZAP3tHbdxGGy1m6gNgURs7Zs"></script>
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
				$contact = '';

				$simulateur = 'selected';
				include('php/menu.php');
			?>
		</nav>
		<section>
			<div id="selector">
				<h1> Générez un premier rapport d'implémentation d'écoquartier en un clic ! </h1>
				<p> Pour avoir une visibilité sur les technologies à déployer pour rendre votre quartier autonome en énergie et en eau, nous vous proposons une simulation basée sur la position potentielle du futur écoquartier. </p>
				<h1> Veuillez sélectionner une position</h1>
				<div id="map-canvas"></div>
			</div>
			<div id="result" class="no" >
				<h1>Rapport <span id="city"></span></h1>
				<div id="ajax"></div>
			</div> 
		</section>
	</body>
</html>