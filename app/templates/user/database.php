<?php $this->layout('layout', ['title' => 'Base de données']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<h1 class="h1">Création de base de données</h1>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~CREATING DATABASE SECTION~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<h2>Créer une base de données</h2>
			<form method="post" action="" class="custom-form custom-form-blue">
				Suffixe de la B.D.D : <span><?= $_SESSION['user']['usr_pseudo'].'_' ?></span>
				<div class="row">
					<div class=" col-xs-12 form-group custom-form-group">
						<input type="text" name="databaseName" class="form-control">
					</div>
					<button type="submit" name="createDatabase" class="custom-button custom-button-gold form-send-button">Créer</button>
				</div>
			</form>
		</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~EXISTING DATABASE SECTION~~~~~~~~~~~~~~~~~~~~~ -->
		<div class="col-xs-12 col-sm-6 col-md-6">
			<h2>B.D.D existantes</h2>
			<?php foreach ($allDatabases as $key => $databases): ?>
				<div class="database-row">
					<div class="col-xs-12">
						<p><?= $databases['Database'] ?></p>
						<form method="post" action="" class="custom-inline-form">
							<input hidden type="text" name="databaseName" value="<?= $databases['Database'] ?>">
							<button type="submit" name="deleteDatabase" class="delete custom-button custom-button-blue">Supprimer</button>
						</form>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
</div>
<?php $this->stop('main_content') ?>

