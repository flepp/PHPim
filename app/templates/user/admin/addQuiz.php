<?php $this->layout('layout', ['title' => 'Ajout de quiz']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Ajouter un quiz</h1>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="POST" class="custom-form custom-form-blue">
				<div class="form-group custom-form-group">
					<label for="day">Jour</label>
					<input type="text" id="day" name="quiDay" class="form-control">
				</div>
				<div class="form-group custom-form-group">
					<label for="title">Titre</label>
					<input type="text" id="title" name="quiTitle" class="form-control">
				</div>
				<div class="form-group custom-form-group">
					<label for="link">Lien</label>
					<input type="text" id="link" name="quiLink" class="form-control">
				</div>
				<div class="form-group custom-form-group">
					<label for="categories">Catégories : </label>
					<select name="categories" id="categories">
					<?php foreach ($categoryList as $key => $value): ?>
						<option value="<?= $value['id']?>"><?= $value['cat_name']?></option>
					<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="custom-button custom-button-gold form-send-button">Ajouter</button>
			</form>
		</div>
	</div>
	<a class="custom-button button-back" href="<?= $this->url('quiz_manage'); ?>">Retour</a>
</div>
<?php $this->stop('main_content') ?>

