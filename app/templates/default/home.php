<?php $this->layout('layout', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>
	<h2>BIENVENUE SUR LA PLATEFORME DE QUIZ DE WEBFORCE3</h2>
	<section>
		<p>
			Cette plateforme vous offre la possibilité d'accéder aux quiz PHP du jour ainsi que la gestion de vos bases de données.
		</p>
		- Projet PHPim - <br>
		<a href="<?= $this->url('quiz_quiz') ?>">Quiz</a>
	</section>
<?php $this->stop('main_content') ?>
