<?php $this->layout('layout', ['title' => 'Activate Quiz']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Gestion des quiz et des catégories</h1>
	<p>
		<a href="<?= $this->url('quiz_add')?>">Ajouter un quiz</a> |
		<a href="<?= $this->url('category_manage')?>">Gestion des catégories</a>
	</p>
<?php foreach ($quizList as $key => $val): ?>
	<div>
		<p><?= $key ?></p>
		<?php foreach ($quizList[$key] as $index => $value): ?>
			<span><?= $value['qui_title'] ?></span>
			<p><a href="<?= $value['qui_link'] ?>">
				<?= $value['qui_link'] ?></a></p>
			<div>
				<form action="<?= $this->url('quiz_manage'); ?>" method="POST">
					<input type="text" hidden value="<?= $value['id']?>" name="quiId">
					<input type="text" value="1" name="quiStatus" hidden>
					<button type="submit">
						Activer
					</button>
				</form>
				<form action="<?= $this->url('quiz_manage'); ?>" method="POST">
					<input type="text" hidden value="<?= $value['id']?>" name="quiId">
					<input type="text" value="0" name="quiStatus" hidden>
					<button type="submit">
						Désactiver
					</button>
				</form>
			</div>
			<p><a href="<?= $this->url('quiz_modify', ['id' => $value['id']])?>">Modifier</a></p>
			<form action="<?= $this->url('quiz_manage'); ?>" method="POST">
				<input type="text" name="deleteQuiz" value="<?= $value['id'] ?>" hidden>
				<input type="text" name="quizName" value="<?= $value['qui_title'] ?>" hidden>
				<button type="submit" name="delete" class="delete">Supprimer</button>
			</form>
		<?php endforeach ?>
	</div>
<?php endforeach ?>
</div>
<?php $this->stop('main_content') ?>