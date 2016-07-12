<?php

	$w_routes = array(
		/* ---- Defaults ----- */
		['GET', '/', 'Default#home', 'default_home'],
		["GET", "/about/", "Default#about", "default_about"],
		/* ----- Users controller ----- */
		["GET", "/inscription/", "Users#register", "user_register"],
		["POST", "/inscription/", "Users#registerPost", "user_register_post"],
		["GET", "/connexion/", "Users#login", "user_login"],
		["POST", "/connexion/", "Users#loginPost", "user_login_post"],
		["GET", "/mdp-oublie/", "Users#forgot", "user_forgot"],
		["POST", "/mdp-oublie/", "Users#forgotPost", "user_forgot_post"],
		["GET", "/edition/", "Users#edit", "user_edit"],
		["POST", "/edition/", "Users#editPost", "user_edit_post"],
		["GET", "/gestion-bdd/", "Users#database", "user_database"],
		["POST", "/gestion-bdd/", "Users#databasePost", "user_database_post"],
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