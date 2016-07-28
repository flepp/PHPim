<?php $this->layout('layout', ['title' => 'Quiz']) ?>

<?php $this->start('main_content') ?>
<h1>Quiz</h1>
<?php if (isset($w_user) && is_array($w_user)): ?>
	<?php if (strtotime($_SESSION['user']['ses_end']) < time()): ?>
		<?php foreach ($quizList as $key => $val): ?>
		<div>
			<p><?= $key ?></p>
			<?php foreach ($quizList[$key] as $index => $value): ?>
				<p><span><?= $value['qui_title'] ?></span> <a href="<?= $value['qui_link'] ?>">
					<?= $value['qui_link'] ?></a></p>
			<?php endforeach ?>
		</div>
		<?php endforeach ?>
	<?php else: ?>
		<?php foreach ($quizList as $key => $val): ?>
			<div>
				<p><?= $key ?></p>
				<?php foreach ($quizList[$key] as $index => $value): ?>
					<?php if ($value['qui_status'] == 1): ?>
						<p><span><?= $value['qui_title'] ?></span> <a href="<?= $value['qui_link'] ?>">
						<?= $value['qui_link'] ?></a></p>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		<?php endforeach ?>
	<?php endif ?>
<?php else: ?>
	<?php foreach ($quizList as $key => $val): ?>
		<div>
			<p><?= $key ?></p>
			<?php foreach ($quizList[$key] as $index => $value): ?>
				<?php if ($value['qui_status'] == 1): ?>
					<p><span><?= $value['qui_title'] ?></span> <a href="<?= $value['qui_link'] ?>">
					<?= $value['qui_link'] ?></a></p>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	<?php endforeach ?>
<?php endif ?>
<?php $this->stop('main_content') ?>

