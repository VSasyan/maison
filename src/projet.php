<!DOCTYPE html>
<html>
	<head>
		<title>Projets – District+</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,700,300,600' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#button button').click(function(){
					$('#button').animate({
						height : 0
					}, 800, function() {$(this).hide();});
					$('#participation').animate({
						height : $("#participation").prop('scrollHeight')
					}, 800);
					$('html, body').animate({
						scrollTop:$('#participation').offset().top
					}, 'slow');
				})
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

				$projet = 'selected';
				include('php/menu.php');
			?>
		</nav>
		<section>

			<h1 class="i">District+ - « Le Quartier des 4 Saisons »</h1>

			<p>L’écoquartier  « Les Quatres Saisons » est un quartier urbain à caractéristiques écologiques modernes. Il concilie autant que possible les différents enjeux environnementaux dans le but de réduire l'impact du bâti sur la nature.</p>
			<p>L’écoquartier est non seulement une forme d’urbanisme qui réduit votre consommation en énergie est en eau mais c’est aussi un cadre de vie agréable qui puise toute sa force de concepts innovants de mutualisation, d’économie collaborative solidaire  et de partage.</p>

			<h2>Visite virtuelle</h2>
			<div id="visite">
				<img src="img/logo_red.png" class="red"/>
				<img src="img/logo.png" class="black"/>
			</div>

			<center id="button">
				<button class="btn">Intéressé ?</button>
			</center>

			<div id="participation" style="height:0px;" class="expand">
				<h2>Participer au projet</h2>

				<form method="post" action="ex6.php" name="formsaisi" > 

					<fieldset>
						<legend>Informations personnelles</legend>
						<p>
							<label class="lbl-formulaire" > Nom </label>
							<input type="text" id="nom" />
						</p>
						<p>
							<label class="lbl-formulaire" for="Prénom"> Prénom </label>
							<input type="text" id="prenom"/>
						</p>
						<p>
							<label class="lbl-formulaire" > Email </label>
							<input type="text" id="email" />
						</p>
						<p>
							<label class="lbl-formulaire" > Téléphone </label>
							<input type="text" id="telephone"/>
						</p>
						<p>
							<label class="lbl-formulaire" > Adresse </label>
							<input type="text" id="adresse"/>
						</p>
						<p>
							<label class="lbl-formulaire" > Code postal </label>
							<input type="text" id="code_postal"/>
						</p>
						<p>
							<label class="lbl-formulaire" > Ville </label>
							<input type="text" id="code_postal"/>
						</p>
						<p>
							<label class="lbl-formulaire" >Je suis </label>
							<select class="mySelect">
								<option>Un Particulier</option>
								<option>Un Professionnel</option>
							</select>
						</p>
					</fieldset>
					
					<fieldset>
						<legend>Informations relatives au projet</legend>
						<p>
							<label class="lbl-formulaire">Localisation du Quartier :</label>
							<select class="mySelect">
								<option>Île de France</option>
							</select>
						</p>
						<p>
							<label class="lbl-formulaire">Quelles informations supplémentaires souhaitez-vous obtenir ?</label>
							<textarea></textarea>
						</p>
					</fieldset>

					<center>
						<button id="envoyer" class="btn">Envoyer</button>
					</center>

				</form>
			
			</div>

		</section>
	</body>
</html>