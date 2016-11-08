<?php

	//autochargement des classes
	require("../vendor/autoload.php");

	//configuration
	require("../app/config.php");

	//rares fonctions globales
	require("../W/globals.php");

	define('PATHUPLOAD', dirname(__FILE__).'/assets/upload/text/');

	define('IMAGEUPLOAD', dirname(__FILE__).'/assets/upload/img/');

	//instancie notre appli en lui passant la config et les routes
	$app = new W\App($w_routes, $w_config);

	//exécute l'appli
	$app->run();