<?php $this->layout('layout-home', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>
<section class="home-header">
	<header>
		<nav class="navbar">
			<div class="container">
				<div class="row">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?= $this->url('default_home') ?>"><span>PHP</span><span>im</span></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?= $this->url('default_home') ?>"><span>Accueil</span></a></li>
							<li><a href="<?= $this->url('quiz_quiz') ?>"><span>Quiz</span></a></li>
							<?php if (isset($w_user) && is_array($w_user)) :?>
							<?php if ($w_user['usr_role'] == 'admin'): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Administration</span> <span class="caret"></span></a>
								<ul class="dropdown-menu nav-sub-menu">
									<li class="col-sm-4">
										<a href="<?= $this->url('session_session') ?>">
											<span>Sessions</span>
										</a>
									</li>
									<li class="col-sm-4">
										<a href="<?= $this->url('user_invitations') ?>">
											<span>Invitations</span>
										</a>
									</li>
									<li class="col-sm-4">
										<a href="<?= $this->url('quiz_manage') ?>">
											<span>Gestion Quiz</span>
										</a>
									</li>
									<li class="col-sm-4">
										<a href="<?= $this->url('session_database') ?>">
											<span>BDD Session</span>
										</a>
									</li>
								</ul>
							</li>
							<?php endif ?>
							<?php endif; ?>
							<?php if (isset($w_user) && is_array($w_user)) :?>
							<li><a href="<?= $this->url('user_database') ?>"><span>Mes B.D.D</span></a></li>
							<li><a href="<?= $this->url('allusers_allUsers') ?>"><span>Etudiants</span></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle profile-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="profile-text">Profil<span class="caret"></span></span>
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
										<path d="M128,160c0,70.692,57.308,128,128,128s128-57.308,128-128S326.692,32,256,32S128,89.308,128,160z M384,320H128  C57.308,320,0,377.309,0,448v32h4.033h503.934H512v-32C512,377.309,454.692,320,384,320z"/>
									</svg>
								</a>
								<ul class="dropdown-menu nav-sub-menu">
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
				</div><!-- /.row -->
			</div><!-- /.container -->
		</nav>
	</header>
	<div class="home-hero">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<h1 class="home-heading col-xs-12">Bienvenue sur la <span class="heading-separator">plateforme de quiz</span> de l'école <span>Webforce 3</span></h1>
			      	<div class="intro-text intro-text-top">
				      	<p>
				        	L'application PHPim propose une gestion centralisée des bases de données des étudiants de la formation webforce3, ainsi qu'un accès rapide aux quiz mis au point par les formateurs.
				        </p>
			        </div>
		        </div>
	        	<div class="intro-link-wrap">
	        		<a class="intro-link" href="<?= $this->url('quiz_quiz') ?>">
	        		Quiz
					<span>Accéder aux quiz</span>
					<img src="<?= $this->assetUrl('img/arrow.png'); ?>" alt="">
	        		</a>
	        	</div>
			</div>
		</div>
	</div>
</section>
<section class="home-hero-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="intro-text intro-text-bottom">
						<p>
							Gérez vos bases de données en toute simplicité. En quelques clics, vous pourrez procéder à la création d'autant de bases de données que nécessaire, à utiliser pour les exercices dispensés par votre formateur.
						</p>
					</div>
				</div>
			</div>
		</div>
</section>

<?php $this->stop('main_content') ?>
