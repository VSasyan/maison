<!DOCTYPE html>
<html>
	<head>
		<title>Accompagnement – District+</title>
		<link rel="icon" type="image/png" href="img/icon.png" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,700,300,600' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			
				$('#envoyer').click(function(e){e.preventDefault();})
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
				$accompagnement = '';

				$accompagnement = 'selected';
				include('php/menu.php');
			?>
		</nav>
		<section>
			<center>
			<h1>L’espace réservé aux Écopotes, habitants des quartiers District+</h1>
			</center>
			<center>
			<p>Consultez à tout moment la consommation énergétique de votre habitat et de votre quartier </p>
			<p>Obtenez des Écopoints à échanger dans vos commerces</p>
			<p> Organisez des évènements communautaires avec vos voisins</p>
			</center>
			<center>
			<h3>	Connectez vous !</h3>
			</center>
			<form method="post" action="ex6.php"  name="formsaisi" > 

				<fieldset>
					<legend> Identification </legend>	
					<p>
					<label class="lbl-formulaire" id="lpseudo"> pseudo <label/>
					<input type="text" id="pseudo" />
					</p>
					<p>
					<label class="lbl-formulaire" for="lmdp"> Mot de passe <label/>
					<input type="text" id="mdp"/>
					</p>
					
				</fieldset>
		
				<center>
					<button id="envoyer" class="btn">Connexion</button>
				</center>
			</form>
			<center>
			<p>
			Pas encore Écopote ? Exprimez votre intérêt pour un projet de construction d’écoquartier 
			</p>
			
			<p>District+ dans votre commune sur notre page <a href="projet.php">Les projets</a>
			</p>
			</center>

		</section>
	</body>
</html>