<?php $this->layout('layout', ['title' => 'Modifier Quiz']) ?>
<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Modification de quiz</h1>
	<p>Procédez à la modification d'un quiz</p>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="post" class="custom-form custom-form-gold">
				<div class="form-group custom-form-group">
					<label for="day">Jour : </label>
					<input type="text" class="form-control" id="day" name="quiDay" value="<?= $quizSingle['qui_day']; ?>">
				</div>
				<div class="form-group custom-form-group">
					<label for="title">Titre : </label>
					<input type="text" class="form-control" id="title" name="quiTitle" value="<?= $quizSingle['qui_title'] ?>">
				</div>
				<div class="form-group custom-form-group">
					<label for="link">Lien : </label>
					<input type="text" class="form-control" id="link" name="quiLink" value="<?= $quizSingle['qui_link'] ?>">
				</div>
				<div class="form-group custom-form-group">
					<label for="categories">Catégories : </label>
					<select name="categories" id="categories" class="">
					<?php foreach ($categoryList as $key => $value): ?>
						<option value="<?= $value['id']?>" "<?= $value['id'] == $quizSingle['category_id'] ? ' selected="selected"' : '' ?>">
							<?= $value['cat_name']?>
						</option>
					<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="custom-button custom-button-blue form-send-button"> Modifier </button>
			</form>
		</div>
	</div>
	<a class="custom-button custom-button-gold button-back" href="<?= $this->url('quiz_manage')?>">Retour</a>
</div>
<?php $this->stop('main_content') ?>

