<?php
// Ajout user accès distant
$sql = 'CREATE USER \''.$username.'\'@\'%\' IDENTIFIED BY \''.$password.'\'';
// Ajout user accès local
$sql = 'CREATE USER \''.$username.'\'@\'localhost\' IDENTIFIED BY \''.$password.'\'';
// Donne les droits au user distant sur ses tables
$sql = 'GRANT ALL PRIVILEGES ON `'.$username.'\_%` .  * TO \''.$username.'\'@\'%\'';
// Donne les droits au user local sur ses tables
$sql = 'GRANT ALL PRIVILEGES ON `'.$username.'\_%` .  * TO \''.$username.'\'@\'localhost\'';
// Création d'une base de données pour le user
$sql = '
	CREATE DATABASE IF NOT EXISTS `'.$username.'_sql1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci
';
// Gmail
$username = 'wf3@progweb.fr';
$password = 'wra8ESa+Am&3';