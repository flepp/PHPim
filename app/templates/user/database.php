<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~CREATING DATABASE SECTION~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row col-sm-6 col-md-6">
		<div class="col-xs-8 col-sm-6 col-md-6">
			<h1>Créer une base de données</h1>
			<form method="post" action="">
				<div class="row">
					<div class=" col-xs-2 col-sm-3 form-group col-md-2">
						<span><?= $_SESSION['user']['usr_pseudo'].'_' ?></span>
					</div>
					<div class=" col-xs-6 col-sm-9 form-group col-md-8">
						<input type="text" name="databaseName" class="form-control">
					</div>
				</div>
				<button type="submit" name="createDatabase" class="btn btn-default">Créer</button>
			</form>
		</div>
	</section>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~EXISTING DATABASE SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row col-sm-6 col-md-6">
		<div class="col-xs-8 col-sm-6 col-md-6">
			<h1>B.D.D existantes</h1>
			<?php foreach ($allDatabases as $key => $databases): ?>
				<div class="row">
					<div class="col-xs-8">
						<p><?= $databases['Database'] ?></p>
					</div>
					<div class="col-xs-4">
						<form method="post" action="">
							<input hidden type="text" name="databaseName" value="<?= $databases['Database'] ?>">
							<button type="submit" name="deleteDatabase" class="delete btn btn-default">Supprimer</button>
						</form>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
</div>
<?php $this->stop('main_content') ?>

