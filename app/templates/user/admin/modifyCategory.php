<?php $this->layout('layout', ['title' => 'Modifier la catégorie']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Modification de categories</h1>
	<form action="" method="POST">
		<label for="category">Categorie : </label>
		<input type="text" id="catId" value="<?= $singleCategory['id']?>" name="catId" hidden>
		<input type="text" id="catName" value="<?= $singleCategory['cat_name']?>" name="catName">
		<?php debug($singleCategory) ?>
		<?php debug($_POST) ?>
		<br>
		<button type="submit" class="update">Modifier</button>
	</form>
	<a href="<?= $this->url('quiz_manage') ?>">Retour</a>
</div>
<?php $this->stop('main_content') ?>

