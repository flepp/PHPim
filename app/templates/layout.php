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
				<a href="<?= $this->url('admin_sessions') ?>">Sessions</a>
				<a href="<?= $this->url('admin_invitations') ?>">Invits</a>
				<a href="<?= $this->url('admin_activateQuiz') ?>">Activate Quiz</a>
				<a href="<?= $this->url('admin_modifyQuiz') ?>">Modify Quiz</a>
				<a href="<?= $this->url('admin_database') ?>">BDD</a>

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