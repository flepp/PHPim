<?php $this->layout('layout', ['title' => 'Modify Quiz']) ?>

<?php $this->start('main_content') ?>
	<p>Modify Quiz</p>
	<form action="" method="post">
		<label for="day">Jour : </label>
		<br>
		<input type="text" id="day" name="quiDay" value="<?= $quizSingle['qui_day']; ?>">
		<br>
		<label for="title">Titre : </label>
		<br>
		<input type="text" id="title" name="quiTitle" value="<?php echo $quizSingle['qui_title'] ?>">
		<br>
		<label for="link">Lien : </label>
		<br>
		<input type="text" id="link" name="quiLink" value="<?= $quizSingle['qui_link'] ?>">
		<br>
		<button type="submit"> Modifier </button>
	</form>
	<a href="<?= $this->url('quiz_activate')?>">Retour</a>
	<?php debug($quizSingle); ?>
<?php $this->stop('main_content') ?>

