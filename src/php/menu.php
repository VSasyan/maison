<?php
	$menu = '';
	$menu .= '<li><a class="' . $accueil . '" href="index.php">Accueil</a></li>';
	$menu .= '<li><a title="Qui sommes nous ?">L\'Accompagnement</a></li>';
	$menu .= '<li><a class="' . $projet . '" href="projet.php">Les Projets</a></li>';
	$menu .= '<li><a class="' . $simulateur . '" href="simulateur.php">Simulateur</a></li>';
	$menu .= '<li><a class="' . $contact . '" href="contact.php">Contacts</a></li>';
?>
<ul class="double"><?php echo $menu; ?></ul>
<ul class="premier"><?php echo $menu; ?></ul>
<div id="banner"></div>