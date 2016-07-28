<?php $this->layout('layout', ['title' => 'Ajout de catégorie']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Ajouter une catégorie</h1>
	<form action="" method="POST">
		<label for="category">Nom de la catégorie : </label>
		<input type="text" placeholder="Catégorie" name="catName">
		<button type="submit" name="add">Ajouter</button>
	</form>
	<?php foreach ($categoryList as $key => $value): ?>
	<form action="" method="POST">
		<br>
		<label for="category"><?= $value['cat_name']?> : </label>
		<input type="text" value="<?= $value['id']?>" name="catId" hidden>
		<input type="text" value="<?= $value['cat_name']?>" name="catName">
		<button type="submit" name="modify">Modifier</button>
		<button type="submit" name="delete" class="delete">Supprimer</button>
		<br>
	</form>
	<?php endforeach ?>
	<a href="<?= $this->url('quiz_manage'); ?>">Retour</a>
</div>
<?php $this->stop('main_content') ?>

