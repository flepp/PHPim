<?php 

$w_config = [
	//url
	'base_url' => '/PHPim/public',					  //chemin relatif au domaine, menant à la racine de l'appli

   	//information de connexion à la bdd
	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
    'db_user' => 'root',							//nom d'utilisateur pour la bdd
    'db_pass' => '',								//mot de passe de la bdd
    'db_name' => 'phpim',								//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//All PROPERTIES FROM USERS TABLE
	'security_user_table' => 'users',
	'security_id_property' => 'id',
	'security_username_property' => 'usr_pseudo',
	'security_password_property' => 'usr_password',
	'security_email_property' => 'usr_email',
	'security_pseudo_property' => 'usr_pseudo',
	'security_role_property' => 'usr_role',

	'security_login_route_name' => 'user_login',
];

require('routes.php');

