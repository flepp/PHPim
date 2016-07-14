<?php $this->layout('layout', ['title' => 'Categories']) ?>

<?php $this->start('main_content') ?>
	<p>Categories</p>
	<form action="" method="POST">
		<label for="category">Categories : </label>
		<input type="text" id="category" value="<?= $categoryList['cat_name']?>">
		<br>
		<button type="submit">Modifier</button>
	</form>
<?php $this->stop('main_content') ?>

