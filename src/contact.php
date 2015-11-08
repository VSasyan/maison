<?php

$eleves = array(
	array('De Weyer', 'Dimitri', 'img/perso/no.jpg', '', '', ''),
	array('Sasyan', 'Valentin', 'img/perso/no.jpg', 'LinkedIn', 'https://www.linkedin.com/in/vsasyan', 'Etudiant à l\'Ecole des Siences Géographiques, Valentin Sasyan est spécialisé en Technique des Systèmes d\'Information.'),
	array('Eljabiri', 'Hanane', 'img/perso/no.jpg', '', '', ''),
	array('Mohamed Cassim', 'Adam', 'img/perso/no.jpg', '', '', ''),
	array('Mougammadoussane', 'Vincent', 'img/perso/no.jpg', '', '', ''),
	array('Bruyat', 'Agathe', 'img/perso/no.jpg', '', '', ''),
	array('Briend', 'Mathilde', 'img/perso/no.jpg', '', '', ''),
	array('Rolland', 'Donatien', 'img/perso/no.jpg', '', '', ''),
	array('Gansonré', 'Ahmed', 'img/perso/no.jpg', '', '', '')
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
					window.location.href = $(this).find('a').prop('href');
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
						$html .= '<img src="' . $eleve[2] . '">';
						$html .= '<div class="info">';
							$html .= '<p class="desc">' . $eleve[5] . '</p>';
							$html .= '<p class="contact"><a href="' . $eleve[4] . '" target="_blank">' . $eleve[3] . '</a></p>';
						$html .= '</div>';
						$html .= '<div style="clear: both"></div>';
					$html .= '</div>';
				}
				echo $html;
			?>
		</section>
	</body>
</html>