<?php

	$w_routes = array(
		/* ---- Defaults ----- */
		['GET', '/', 'Default#home', 'default_home'],
		["GET", "/about/", "Default#about", "default_about"],
		/* ----- Users controller ----- */
		["GET", "/inscription/", "User#register", "user_register"],
		["POST", "/inscription/", "User#registerPost", "user_register_post"],
		["GET", "/connexion/", "User#login", "user_login"],
		["POST", "/connexion/", "User#loginPost", "user_login_post"],
		["GET", "/mdp-oublie/", "User#forgot", "user_forgot"],
		["POST", "/mdp-oublie/", "User#forgotPost", "user_forgot_post"],
		["GET", "/edition/", "User#edit", "user_edit"],
		["POST", "/edition/", "User#editPost", "user_edit_post"],
		["GET", "/gestion-bdd/", "User#database", "user_database"],
		["POST", "/gestion-bdd/", "User#databasePost", "user_database_post"],
		/* ----- AllUsers controller ------ */
		["GET", "/etudiant/[i:id]", "AllUsers#details", "allusers_details"],
		["GET", "/liste-etudiants/", "AllUsers#allUsers", "allusers_allUsers"],
		/* ----- Admin controller ----- */
		["GET", "/administration/sessions", "Admin#sessions", "admin_sessions"],
		["GET", "/administration/invitations", "Admin#invitations", "admin_invitations"],
		["GET", "/administration/gestion-bdd", "Admin#database", "admin_database"],
		["GET", "/administration/activation-quiz", "Admin#activateQuiz", "admin_activateQuiz"],
			/* Pass quiz id as POST parameters */
		["GET", "/administration/modification-quiz/[i:id]", "Admin#modifyQuiz", "admin_modifyQuiz"],
		["POST", "/administration/modification-quiz/[i:id]", "Admin#modifyQuizPost", "admin_modifyQuiz_post"],
		["GET", "/administration/modification-categorie/[i:id]", "Admin#modifyCategory", "admin_modifyCategory"],
		["POST", "/administration/modification-categorie/[i:id]", "Admin#modifyCategoryPost", "admin_modifyCategory_post"],
		/* ----- Quiz controller ------*/
		["GET", "/quiz/", "Quiz#quiz", "quiz_quiz"]

	);