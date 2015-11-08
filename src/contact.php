<?php

$eleves = array(
	array('De Weyer', 'Dimitri', '', 'LinkedIn', 'https://be.linkedin.com/pub/dimitri-de-weyer/1b/757/6b0', 'Étudiant en Master 2 développement durable, management environnental et géomatique à l\'Université Panthéon Sorbonne.'),
	array('Sasyan', 'Valentin', 'img/perso/valentin.jpg', 'LinkedIn', 'https://www.linkedin.com/in/vsasyan', 'Étudiant à l\'Ecole des Siences Géographiques, Valentin Sasyan est spécialisé en Technique des Systèmes d\'Information.'),
	array('Eljabiri', 'Hanane', 'img/perso/hanane.jpg', 'LinkedIn', 'https://www.linkedin.com/in/hananeeljabiri', "Élève ingénieur à l'Ecole Nationale des Sciences Géographiques, Filière : Architecture des Systèmes de l'Information Géographique."),
	array('Mohamed Cassim', 'Adam', 'img/perso/adam.jpg', 'LinkedIn', 'https://fr.linkedin.com/pub/mohamed-cassim-adam/109/9bb/4b0', "Étudiant en Master de droit mention Développement durable, management environnemental et géomatique à l'Université Panthéon Sorbonne"),
	array('Mougammadoussane', 'Vincent', '', 'LinkedIn', '', ""),
	array('Bruyat', 'Agathe', '', 'LinkedIn', '', "Après l'obtention d'un BTS MUC en 2014, j'ai suivi un double cursus : une classe préparatoire CPGE pour les BAC+2 (classe préparatoire ATS) et une licence 3 Economique et Sociale option RH à l'université Panthéon-Sorbonne. Depuis Septembre 2015 je suis étudiante en Master 1 à Novancia Business School (majeure entreprendriat)."),
	array('Briend', 'Mathilde', 'img/perso/mathilde.jpg', 'LinkedIn', 'https://fr.linkedin.com/pub/mathilde-briend/92/152/bb9', "'A la suite d'un BTS communication, Mathilde a intégré le bachelor de Novancia Business School et suit ce cursus en apprentissage."),
	array('Rolland', 'Donatien', '', 'LinkedIn', '', ""),
	array('Gansonré', 'Ahmed', '', 'LinkedIn', '', "")
);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contacts – District+</title>
		<link rel="icon" type="image/png" href="img/icon.png" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,700,300,600' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.perso').click(function() {
					if ($(this).find('a').length > 0) {window.location.href = $(this).find('a').prop('href');}
				});
			});
		</script>
	</head>

	<body>
		<nav>
			<?php
				$accueil = '';
				$projet = '';
				$simulateur = '';
				$contact = '';

				$contact = 'selected';
				include('php/menu.php');
			?>
		</nav>

		<section>
			<h1>Les membres de l'équipe</h1>
			<?php
				$html = ''; $type = 'g';
				foreach ($eleves as $eleve) {
					if ($type == 'd') {$type = 'g';} else {$type = 'd';}
					$html .= '<div class="perso ' . $type . '">';
						$html .= '<h3>' . $eleve[1] . ' ' . $eleve[0] . '</h3>';
						if ($eleve[2] != '') {$html .= '<img src="' . $eleve[2] . '">';}
						$html .= '<div class="info">';
							$html .= '<p class="desc">' . $eleve[5] . '</p>';
							if ($eleve[4] != '') {$html .= '<p class="contact"><a href="' . $eleve[4] . '" target="_blank">' . $eleve[3] . '</a></p>';}
						$html .= '</div>';
						$html .= '<div style="clear: both"></div>';
					$html .= '</div>';
				}
				echo $html;
			?>
		</section>
	</body>
</html>