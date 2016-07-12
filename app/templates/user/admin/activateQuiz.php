<?php $this->layout('layout', ['title' => 'Activate Quiz']) ?>

<?php $this->start('main_content') ?>
	<p>Activate Quiz</p>
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
						<input type="text" value="<?= $value['qui_status']?>" name="quiStatus" hidden>
						<form action="" method="POST">
							<button type="submit" name="submit">
								Activer
							</button>
						</form>
						<a href="<?= $this->url('quiz_modify', ['id' => $value['id']])?>">Modifier</a>
					</div>
	<?php endforeach ?>
<?php $this->stop('main_content') ?>

