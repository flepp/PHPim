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
		["GET", "/edition/[i:id]", "Users#edit", "user_edit"],
		["POST", "/edition/[i:id]", "Users#editPost", "user_edit_post"],
		["GET", "/gestion-bdd/", "Users#database", "user_database"],
		["POST", "/gestion-bdd/", "Users#databasePost", "user_database_post"],
		/* ----- AllUsers controller ------ */
		["GET", "/etudiant/[i:id]/", "AllUsers#details", "allusers_details"],
		["GET", "/liste-etudiants/", "AllUsers#allUsers", "allusers_allUsers"],
		/* ----- Admin controller ----- */
		["GET", "/administration/sessions/", "Session#session", "session_session"],
		["POST", "/administration/sessions/", "Session#sessionPost", "sessions_session_post"],
		["GET", "/administration/invitations/", "Users#invitations", "user_invitations"],
		["POST", "/administration/invitations/", "Users#invitationsPost", "user_invitations_post"],
		["GET", "/administration/gestion-bdd/", "Session#database", "session_database"],
		["POST", "/administration/gestion-bdd/", "Session#databasePost", "session_database_post"],
		["GET", "/administration/ajout-quiz/", "Quiz#add", "quiz_add"],
		["POST", "/administration/ajout-quiz/", "Quiz#addPost", "quiz_add_post"],
		["GET", "/administration/activation-quiz/", "Quiz#activate", "quiz_activate"],
		["POST", "/administration/activation-quiz/", "Quiz#activatePost", "quiz_activate_post"],
			/* Pass quiz id as POST parameters */
		["GET", "/administration/modification-quiz/[i:id]/", "Quiz#modify", "quiz_modify"],
		["POST", "/administration/modification-quiz/[i:id]/", "Quiz#modifyPost", "quiz_modify_post"],
		["GET", "/administration/modification-categorie/[i:id]/", "Category#modify", "Category_modify"],
		["POST", "/administration/modification-categorie/[i:id]/", "Category#modifyPost", "Category_modify_post"],
		/* ----- Quiz controller ------*/
		["GET", "/quiz/", "Quiz#quiz", "quiz_quiz"]

	);