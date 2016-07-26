<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Condensed" rel="stylesheet">
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
	<header class="header-navigation">
		<nav class="navbar">
			<div class="container container-i">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= $this->url('default_home') ?>">PHPim</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?= $this->url('default_home') ?>">Accueil</a></li>
						<li><a href="<?= $this->url('quiz_quiz') ?>">Quiz</a></li>
						<?php if (isset($w_user) && is_array($w_user)) :?>
						<?php if ($w_user['usr_role'] == 'admin'): ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $this->url('session_session') ?>">Sessions</a></li>
								<li><a href="<?= $this->url('user_invitations') ?>">Invitations</a></li>
								<li><a href="<?= $this->url('quiz_manage') ?>">Gestion Quiz</a></li>
								<li><a href="<?= $this->url('session_database') ?>">BDD Session</a></li>
							</ul>
						</li>
						<?php endif ?>
						<?php endif; ?>
						<?php if (isset($w_user) && is_array($w_user)) :?>
						<li><a href="<?= $this->url('user_database') ?>">Mes B.D.D</a></li>
						<li><a href="<?= $this->url('allusers_allUsers') ?>">Etudiants</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $this->url('allusers_details', ['id' => $_SESSION['user']['id']]) ?>">Mon Profil</a></li>
								<li><a href="<?php echo $this->url('user_logout'); ?>">Déconnexion</a></li>
							</ul>
						</li>
						<?php else: ?>
						<li><a href="<?php echo $this->url('user_login'); ?>">Connexion</a></li>
						<li><a href="<?php echo $this->url('user_register'); ?>">Inscription</a></li>
						<?php endif ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
	</header>
	<main>
		<?php $this->insert('partials/notifications') ?>
		<?= $this->section('main_content') ?>
	</main>
	<footer>
	</footer>
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>
	</body>
</html>