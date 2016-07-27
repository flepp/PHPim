<?php $this->layout('layout', ['title' => 'Base de données']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<h1 class="h1">Création de base de données</h1>
	<p>Cette page vous permet de créer une base de données pour tous les étudiants.</p>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~CREATING DATABASE FOR SESSION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<form method="POST" action="" class="custom-form-gold custom-form">
				<select name="session" class="form-control">
				<?php foreach ($sessionList as $key => $value): ?>
					<option value="<?= $value['id'] ?>"><?= ucfirst ($value['ses_name']) ?></option>
				<?php endforeach ?>
				</select>
				<div class="form-group custom-form-group ">
					<label>Suffixe de la database:</label>
					<input type="text" name="suffixe" class="form-control">
				</div>
				<button type="submit" class="form-send-button custom-button-blue">Créer</button>
			</form>
		</div>
	</section>
</div>

<?php $this->stop('main_content') ?>

