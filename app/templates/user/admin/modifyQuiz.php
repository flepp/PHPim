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
		<input type="text" id="title" name="quiTitle" value="<?= $quizSingle['qui_title'] ?>">
		<br>
		<label for="link">Lien : </label>
		<br>
		<input type="text" id="link" name="quiLink" value="<?= $quizSingle['qui_link'] ?>">
		<br>
		<label for="categories">Catégories : </label>
		<br>
		<select name="categories" id="categories">
			<option value="0">Sélectionnez une catégorie</option>
		<?php foreach ($categoryList as $key => $value): ?>
			<option value="<?= $value['id']?>" "<?= $value['id'] == $quizSingle['category_id'] ? ' selected="selected"' : '' ?>">
				<?= $value['cat_name']?>
			</option>
		<?php endforeach ?>
		</select>
		<br>
		<button type="submit"> Modifier </button>
	</form>
	<a href="<?= $this->url('quiz_manage')?>">Retour</a>
	<?php debug($quizSingle); ?>
<?php $this->stop('main_content') ?>

