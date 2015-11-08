<!DOCTYPE html>
<html>
	<head>
		<title>District+</title>
		<link rel="icon" type="image/png" href="img/icon.png" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,700,300,600' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
		<script src="js/s3Slider.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#s3slider').s3Slider({
					timeOut: 4000
				});
			})
		</script>
	</head>

	<body>
		<nav>
			<?php
				$accueil = '';
				$projet = '';
				$simulateur = '';
				$contact = '';

				$accueil = 'selected';
				include('php/menu.php');
			?>
		</nav>

		<section>
			<div id="s3slider">
				<ul id="s3sliderContent">
				<li class="s3sliderImage">
				<img src="img/video.png">
				<span>Innovation</span>
				</li>
				<li class="s3sliderImage">
				<img src="img/groupe.jpg">
				<span>Solidarité</span>
				</li>
				<li class="s3sliderImage">
				<img src="img/video.png">
				<span>Développement durable</span>
				</li>
				<div class="clear s3sliderImage"></div>
				</ul>
			</div>
			
			<div class="boutton accueil">
				<div class="cel"> 
					<button class="btn">Visiteur</button>
				</div>
				<div class="cel"> 
					<button class="btn">Adhérent</button>
				</div>
				<div class="cel"> 
					<button class="btn">Professionnel</button>
				</div>
			</div>
		</section>
	</body>
</html>