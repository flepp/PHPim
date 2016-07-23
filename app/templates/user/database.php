<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~EXISTING DATABASE SECTION~~~~~~~~~~~~~~~~~~~~~ -->
<section>
	<h1>Vos bases de données existantes</h1>
	<?php foreach ($allDatabases as $key => $databases): ?>
		<div>
			<p><?= $databases['Database'] ?></p>
			<form method="post" action="">
				<input hidden type="text" name="databaseName" value="<?= $databases['Database'] ?>">
				<button type="submit" name="deleteDatabase" class="delete">Supprimer</button>
			</form>
		</div>
	<?php endforeach ?>
</section>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~CREATING DATABASE SECTION~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<h1>Créer une base de données</h1>
<section>
	<form method="post" action="">
		<span><?= $_SESSION['user']['usr_pseudo'].'_' ?></span><input type="text" name="databaseName">
		<button type="submit" name="createDatabase">Créer</button>
	</form>
</section>
<?php $this->stop('main_content') ?>

