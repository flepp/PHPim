<?php $this->layout('layout-home', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>
<section class="home-header">
	<?php $this->insert('partials/navigation') ?>
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
