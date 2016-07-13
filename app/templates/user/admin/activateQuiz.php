<?php $this->layout('layout', ['title' => 'Activate Quiz']) ?>

<?php $this->start('main_content') ?>
	<p>Activate Quiz</p>
	<p>Vous avez un total de <?= count($quizList) ?> quizs.</p>
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
			<form action="" method="POST">
				<input type="text" hidden value="<?= $value['id']?>" name="quiId">
				<input type="text" value="0" name="quiStatusTwo" hidden>
				<button type="submit" name="submitDeact">
					Désactiver
				</button>
			</form>
			<form action="" method="POST">
				<input type="text" hidden value="<?= $value['id']?>" name="quiId">
				<input type="text" value="1" name="quiStatusOne" hidden>
				<button type="submit" name="submitAct">
					Activer
				</button>
			</form>
			<a href="<?= $this->url('quiz_modify', ['id' => $value['id']])?>">Modifier</a>
		</div>
	<?php endforeach ?>
<?php $this->stop('main_content') ?>

