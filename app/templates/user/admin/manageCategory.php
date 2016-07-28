<?php $this->layout('layout', ['title' => 'Gestion de catégories']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Gestion de catégorie</h1>
	<div class="row">
		<div class="col-md-6">
			<h2>Ajouter une catégorie</h2>
			<form action="" method="POST" class="custom-form custom-form-gold">
				<div class="form-group custom-form-group">
					<label for="category">Nom de la catégorie : </label>
					<input type="text" placeholder="Catégorie" name="catName" class="form-control">
				</div>
				<button type="submit" name="add" class="custom-button custom-button-blue form-send-button">Ajouter</button>
			</form>
			<a href="<?= $this->url('quiz_manage'); ?>" class="custom-button button-back">Retour</a>
		</div>
		<div class="col-md-6">
			<h2>Modifier / Supprimer</h2>
			<div class="row">
				<div class="col-xs-12">
					<?php foreach ($categoryList as $key => $value): ?>
					<form action="" method="POST" class="custom-form custom-form-blue category-form">
						<div class="custom-form-group">
							<label for="category"><?= $value['cat_name']?> : </label>
							<input type="text" value="<?= $value['id']?>" name="catId" hidden>
							<input type="text" value="<?= $value['cat_name']?>" name="catName" class="form-control">
						</div>
						<button type="submit" name="modify" class="custom-button-gold">Modifier</button>
						<button type="submit" name="delete" class="delete custom-button-gold" >Supprimer</button>
					</form>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->stop('main_content') ?>

