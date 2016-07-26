<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-theme.css') ?>">

	<!-- CSS personnel -->

	<link rel="stylesheet" href="<?= $this->assetUrl('css/michel.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/paul.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/ibrahima.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/philippe.css') ?>">
	<!-- Pour info: le script doit rester ici SVP -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<header>
			<nav>
				<?php if (isset($w_user) && is_array($w_user)) :?>
					<a href="<?= $this->url('default_home') ?>">Home</a>
					<a href="<?= $this->url('default_about') ?>">About</a>
					<a href="<?= $this->url('allusers_allUsers') ?>">Etudiants</a>
					<?php if ($w_user['usr_role'] == 'admin'): ?>
						<a href="<?= $this->url('session_session') ?>">Sessions</a>
						<a href="<?= $this->url('user_invitations') ?>">Invitations</a>
						<a href="<?= $this->url('quiz_manage') ?>">Gestion Quiz</a>
						<a href="<?= $this->url('session_database') ?>">BDD Session</a>
					<?php endif ?>
					<a href="<?= $this->url('quiz_quiz') ?>">Quiz</a>
					<a href="<?= $this->url('user_database') ?>">BDD utilisateur</a>
					<a href="<?= $this->url('allusers_details', ['id' => $_SESSION['user']['id']]) ?>">Mon Profil</a>
					<a href="<?php echo $this->url('user_logout'); ?>">Déconnexion</a>
					<span>Bonjour <?= ' '.$w_user['usr_pseudo'] ?></span><img src="?"/>
				<?php else : ?>
					<a href="<?= $this->url('default_home') ?>">Home</a>
					<a href="<?= $this->url('default_about') ?>">About</a>
					<a href="<?= $this->url('quiz_quiz') ?>">Quiz</a>
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
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>

</body>
</html>