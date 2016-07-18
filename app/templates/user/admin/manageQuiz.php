<?php $this->layout('layout', ['title' => 'Activate Quiz']) ?>

<?php $this->start('main_content') ?>
	<p>Activate Quiz</p>
	<p>Nombre de quizs : <?= count($quizList) ?></p>
	<p>
		<a href="<?= $this->url('quiz_add')?>">Ajouter un quiz</a> |
		<a href="<?= $this->url('category_manage')?>">Gestion des catégories</a>
	</p>
	<?php foreach ($quizList as $key => $value): ?>
		<div>
			<p><?= $value['qui_day']; ?></p>
			<p><?= $value['qui_title']; ?>
				<span>
				<?php
					if($value['qui_status'] == 0){
						echo 'Inactif';
					}else{
						echo 'Actif';
					}
				?>
				</span>
			</p>
			<p><a href="<?= $value['qui_link'] ?>"><?= $value['qui_link'] ?></a></p>
			<p>Categories :
				<a href="<?= $this->url('category_modify', ['id' => $value['category_id']] )?>">
					<!--  $categoryList[$key]['cat_name'] -->
					<?= $value['cat_name']?>
				</a>
			</p>
			<form action="" method="POST">
				<input type="text" hidden value="<?= $value['id']?>" name="quiId">
				<input type="text" value="1" name="quiStatus" hidden>
				<button type="submit">
					Activer
				</button>
			</form>
			<form action="" method="POST">
				<input type="text" hidden value="<?= $value['id']?>" name="quiId">
				<input type="text" value="0" name="quiStatus" hidden>
				<button type="submit">
					Désactiver
				</button>
			</form>
			<form action="" method="POST">
				<input type="text" name="deleteQuiz" value="<?= $value['id'] ?>" hidden>
				<button type="submit" name="delete" id="delete">Supprimer</button>
			</form>
			<a href="<?= $this->url('quiz_modify', ['id' => $value['id']])?>">Modifier</a>
		</div>
	<?php endforeach ?>
<?php $this->stop('main_content') ?>