<?php $this->layout('layout', ['title' => 'Quiz']) ?>

<?php $this->start('main_content') ?>
	<p>Quiz</p>

		<?php foreach ($quizList as $key => $value): ?>
				<?php if ($value['qui_status'] == 0): ?>
					<div>
						<p><?= $value['qui_day']; ?></p>
						<p><?= $value['qui_title']; ?></p>
						<p><a href="<?= $value['qui_link'] ?>"><?= $value['qui_link'] ?></a></p>
					</div>
				<?php else : ?>
					<? return false; ?>
				<?php endif ?>
		<?php endforeach ?>

<?php $this->stop('main_content') ?>

