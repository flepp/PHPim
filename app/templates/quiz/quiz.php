<?php $this->layout('layout', ['title' => 'Quiz']) ?>

<?php $this->start('main_content') ?>
	<h1>Quiz</h1>
	<?php foreach ($quizList as $key => $val): ?>
	<div>
		<p><?= $key ?></p>
		<?php foreach ($quizList[$key] as $index => $value): ?>
			<p><span><?= $value['qui_title'] ?></span> <a href="<?= $value['qui_link'] ?>">
				<?= $value['qui_link'] ?></a></p>
		<?php endforeach ?>
	</div>
<?php endforeach ?>
<?php $this->stop('main_content') ?>

