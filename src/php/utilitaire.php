<?php

try {
	$bdd = new PDO(host, user, mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch(Exception $e) {
	echo 'Echec de la connexion à la base de données';
	exit();
}

function __autoload($class_name) {
    include 'php/class/' . $class_name . '.php';
}

define('EAU_PAR_PERSONNE_PAR_MOIS', 3);

?>