<?php $this->layout('layout', ['title' => 'Base de données']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~CREATING DATABASE FOR SESSION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row">
		<div class="col-xs-8 col-sm-6 col-md-6">
			<h1>Choisissez une sesion</h1>
			<form method="POST" action="">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<select name="session" class="form-control">
						<?php foreach ($sessionList as $key => $value): ?>
							<option value="<?= $value['id'] ?>"><?= ucfirst ($value['ses_name']) ?></option>
						<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8 form-group col-md-4">
						<label>Suffixe de la database:</label>
						<input type="text" name="suffixe" class="form-control">
					</div>
				</div>
				<button type="submit" class="btn btn-default">Créer</button>
			</form>
		</div>
	</section>
</div>

<?php $this->stop('main_content') ?>

