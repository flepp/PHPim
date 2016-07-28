<?php $this->layout('layout', ['title' => 'Activate Quiz']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Gestion des quiz et des catégories</h1>
	<div>
		<a href="<?= $this->url('quiz_add')?>" class="custom-button custom-button-blue">Ajouter un quiz</a>
		<a href="<?= $this->url('category_manage')?>" class="custom-button custom-button-gold">Gérer les catégories</a>
	</div>
<?php foreach ($quizList as $key => $val): ?>
	<div>
		<h2><?= $key ?></h2>
			<div class="row">
		<?php foreach ($quizList[$key] as $index => $value): ?>
				<div class="col-md-4">
					<div class="quiz">
						<div>
							<form action="<?= $this->url('quiz_manage'); ?>" method="POST" class="custom-inline-form">
								<input type="text" hidden value="<?= $value['id']?>" name="quiId">
								<input type="text" value="1" name="quiStatus" hidden>
								<?php if ($value['qui_status'] == 0): ?>
									<button type="submit" class="custom-button">
										Activer
									</button>
								<?php endif ?>
							</form>
							<form action="<?= $this->url('quiz_manage'); ?>" method="POST" class="custom-inline-form">
								<input type="text" hidden value="<?= $value['id']?>" name="quiId">
								<input type="text" value="0" name="quiStatus" hidden>
								<?php if ($value['qui_status'] == 1): ?>
									<button type="submit" class="custom-button">
										Désactiver
									</button>
								<?php endif ?>
							</form>
						</div>
						<div class="quiz-content">
							<h3><?= $value['qui_title'] ?></h3>
							<p><a href="<?= $value['qui_link'] ?>">
								<?= $value['qui_link'] ?></a>
							</p>
						</div>
						<a href="<?= $this->url('quiz_modify', ['id' => $value['id']])?>" class="custom-button">Modifier</a>
						<form action="<?= $this->url('quiz_manage'); ?>" method="POST" class="custom-inline-form pull-right">
							<input type="text" name="deleteQuiz" value="<?= $value['id'] ?>" hidden>
							<input type="text" name="quizName" value="<?= $value['qui_title'] ?>" hidden>
							<button type="submit" name="delete" class="delete custom-button">Supprimer</button>
						</form>
					</div>
				</div>
		<?php endforeach ?>
			</div>
	</div>
<?php endforeach ?>
</div>
<?php $this->stop('main_content') ?>