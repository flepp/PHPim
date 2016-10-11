<?php $this->layout('layout', ['title' => 'Quiz']) ?>

<?php $this->start('main_content') ?>
<div class="container quiz-container">
	<h1 class="h1">Quiz</h1>
	<?php if (isset($w_user) && is_array($w_user)): ?>
		<?php if (strtotime($_SESSION['user']['ses_end']) < time()): ?>
			<?php foreach ($quizList as $key => $val): ?>
			<div>
				<h2><?= $key ?></h2>
				<?php foreach ($quizList[$key] as $index => $value): ?>
					<div class="quiz-item"><a href="<?= $value['qui_link'] ?>">
						<?= $value['qui_title'] ?></a>
					</div>
				<?php endforeach ?>
			</div>
			<?php endforeach ?>
		<?php else: ?>
			<?php foreach ($quizList2 as $key => $val): ?>
				<div>
					<h2><?= $key ?></h2>
					<?php foreach ($quizList2[$key] as $index => $value): ?>
						<div class="quiz-item"><a href="<?= $value['qui_link'] ?>">
							<?= $value['qui_title'] ?></a>
						</div>
					<?php endforeach ?>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	<?php else: ?>
		<?php foreach ($quizList2 as $key => $val): ?>
			<div>
				<h2><?= $key ?></h2>
				<?php foreach ($quizList2[$key] as $index => $value): ?>
					<div class="quiz-item"><a href="<?= $value['qui_link'] ?>">
						<?= $value['qui_title'] ?></a>
					</div>
				<?php endforeach ?>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</div>
<?php $this->stop('main_content') ?>

