<?php $this->layout('layout', ['title' => 'Ajout de quizz']) ?>

<?php $this->start('main_content') ?>
	<h1>Tous les quizs pour la catégorie : <?= $quizList['category_id']?></h1>
	<?php debug($quizList) ?>
	<?php foreach ($quizList as $key => $value): ?>
		<?= $value['category_id'] ?>
	<?php endforeach ?>
	<a href="<?= $this->url('quiz_manage'); ?>">Retour</a>
<?php $this->stop('main_content') ?>

