<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<nav>
				<a href="<?= $this->url('default_home') ?>">Home</a>
				<a href="<?= $this->url('default_about') ?>">About</a>
				<a href="<?= $this->url('allusers_allUsers') ?>">Etudiants</a>
				<a href="<?= $this->url('session_session') ?>">Sessions</a>
				<a href="<?= $this->url('user_database') ?>">BDD utilisateur</a>
				<a href="<?= $this->url('user_invitations') ?>">Invits</a>
				<a href="<?= $this->url('quiz_quiz') ?>">Quiz</a>
				<a href="<?= $this->url('quiz_manage') ?>">Gestion Quiz</a>
				<a href="<?= $this->url('session_database') ?>">BDD Session</a>

				<?php if (isset($w_user) && is_array($w_user)) :?>
					Bonjour <?= ' '.$w_user['usr_pseudo'] ?>
					<a href="<?php echo $this->url('user_logout'); ?>">Déconnexion</a>
				<?php else : ?>
					<a href="<?php echo $this->url('user_register'); ?>">Inscription</a>
					<a href="<?php echo $this->url('user_login'); ?>">Connexion</a>
				<?php endif; ?>
			</nav>
		</header>

		<section>
			<?php $this->insert('partials/notifications') ?>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
</body>
</html>