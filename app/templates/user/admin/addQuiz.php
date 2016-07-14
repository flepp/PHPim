<?php $this->layout('layout', ['title' => 'Ajout']) ?>

<?php $this->start('main_content') ?>
	<p>Ajouter un quiz</p>
	<form action="" method="POST">
		<label for="day">Jour</label>
		<br>
		<input type="text" id="day" name="quiDay">
		<br>
		<label for="title">Titre</label>
		<br>
		<input type="text" id="title" name="quiTitle">
		<br>
		<label for="link">Lien</label>
		<br>
		<input type="text" id="link" name="quiLink">
		<br>
		<select name="categories">
			<option value="0">Sélectionnez une catégorie</option>
			<?php foreach ($categoryList as $key => $value): ?>
				<option value="<?= $value['id']?>"><?= $value['cat_name']?></option>
			<?php endforeach ?>
		</select>
		<br>
		<button type="submit">Ajouter</button>
	</form>
	<a href="<?= $this->url('quiz_activate'); ?>">Retour</a>
<?php $this->stop('main_content') ?>

