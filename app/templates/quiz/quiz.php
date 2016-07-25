<?php $this->layout('layout', ['title' => 'Quiz']) ?>

<?php $this->start('main_content') ?>
	<p>Quiz</p>
	<form action="" method="POST">
		<input type="text" value="<?= $_SESSION['user']['session_id'] ?>" name="sesId">
	</form>
	<?php if (isset($w_user) && is_array($w_user)): ?>
		<?php if (strtotime($_SESSION['user']['ses_end']) < time()): ?>
			<?php foreach ($quizList as $key => $value): ?>
						<div>
							<p>Jour : <?= $value['qui_day']; ?></p>
							<p>
								<a href="<?= $value['qui_link'] ?>">
									<?= $value['qui_title'] ?>
								</a>
							</p>
						</div>
			<?php endforeach ?>
		<?php else: ?>
			<?php foreach ($quizList as $key => $value): ?>
				<?php if ($value['qui_status'] == 1): ?>
					<div>
						<p>Jour : <?= $value['qui_day']; ?></p>
						<p>
							<a href="<?= $value['qui_link'] ?>">
								<?= $value['qui_title'] ?>
							</a>
						</p>
					</div>
				<?php else : ?>
					<? return false; ?>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
	<?php else: ?>
		<?php foreach ($quizList as $key => $value): ?>
				<?php if ($value['qui_status'] == 1): ?>
					<div>
						<p>Jour : <?= $value['qui_day']; ?></p>
						<p>
							<a href="<?= $value['qui_link'] ?>">
								<?= $value['qui_title'] ?>
							</a>
						</p>
					</div>
				<?php else : ?>
					<? return false; ?>
				<?php endif ?>
			<?php endforeach ?>
	<?php endif ?>
<?php $this->stop('main_content') ?>

