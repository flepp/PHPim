<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
</head>
<body>
	<div class="container">

		<header>
			<nav>
				<a href="<?= $this->url('default_home') ?>">Home</a>
				<a href="<?= $this->url('default_about') ?>">About</a>
				<a href="<?= $this->url('user_register') ?>">Inscription</a>
				<a href="<?= $this->url('user_login') ?>">Connexion</a>
				<a href="<?= $this->url('user_forgot') ?>">MDP Oubli</a>
				<a href="<?= $this->url('user_edit') ?>">Edit</a>
				<a href="<?= $this->url('allusers_allUsers') ?>">Etudiants</a>
				<a href="<?= $this->url('allusers_details') ?>">Etudiant</a>
				<a href="<?= $this->url('session_session') ?>">Sessions</a>
				<a href="<?= $this->url('user_invitations') ?>">Invits</a>
				<a href="<?= $this->url('quiz_quiz') ?>">Quiz</a>
				<a href="<?= $this->url('quiz_activate') ?>">Activate Quiz</a>
				<a href="<?= $this->url('quiz_modify') ?>">Modify Quiz</a>
				<a href="<?= $this->url('session_database') ?>">BDD Session</a>
			</nav>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>