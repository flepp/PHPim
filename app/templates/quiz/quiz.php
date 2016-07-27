<?php $this->layout('layout', ['title' => 'Quiz']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<div class="row">
	<h1 class="h1">Quiz</h1>
	<p>Évaluez vos compétences acquises en cours en répondant aux quiz élaborés par votre formateur.</p>
<?php if (isset($w_user) && is_array($w_user)): ?>
	<?php if (strtotime($_SESSION['user']['ses_end']) < time()): ?>
		<?php foreach ($quizList as $key => $val): ?>
			<?php foreach ($val as $index => $value): ?>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="quiz">
						<p><span>Jour : <?php $value['qui_day'] ?></span> <span>Cat</span></p>
						<h3 class="quiz-content">
							<a href="<?= $value['qui_link'] ?>">
								<?= $value['qui_title'] ?>
							</a>
						</h3>
					</div>
				</div>
				<!--<div><?php //$value['cat_name'] ?></div>-->
			<?php endforeach ?>
		<?php endforeach ?>
	<?php else: ?>
		<?php foreach ($quizList as $key => $val): ?>
				<?php foreach ($quizList[$key] as $index => $value): ?>
					<?php if ($value['qui_status'] == 1): ?>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="quiz">
							<p><span>Jour : <?php $value['qui_day'] ?></span> <span>Cat</span></p>
							<h3 class="quiz-content">
								<a href="<?= $value['qui_link'] ?>">
									<?= $value['qui_title'] ?>
								</a>
							</h3>
						</div>
					</div>
					<?php endif ?>
				<?php endforeach ?>
		<?php endforeach ?>
	<?php endif ?>
<?php else: ?>
	<?php foreach ($quizList as $key => $val): ?>
			<?php foreach ($quizList[$key] as $index => $value): ?>
				<?php if ($value['qui_status'] == 1): ?>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="quiz">
						<p><span>Jour : <?php $value['qui_day'] ?></span> <span>Cat</span></p>
						<h3 class="quiz-content">
							<a href="<?= $value['qui_link'] ?>">
								<?= $value['qui_title'] ?>
							</a>
						</h3>
					</div>
				</div>
				<?php endif ?>
			<?php endforeach ?>
	<?php endforeach ?>
<?php endif ?>
	</div>
</div>
<?php $this->stop('main_content') ?>

