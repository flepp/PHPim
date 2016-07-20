<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<section>
		<h1>Vos bases de données existantes</h1>
		<br> 
		<br> 
		<?php if (isset($_SESSION['errorList'])): ?>
			<?php foreach ($_SESSION['errorList'] as $error): ?>
				<p><?= $error ?></p>			
			<?php endforeach ?>
			<?php unset($_SESSION['errorList']); ?>
		<?php endif ?>
		<?php if (isset($_SESSION['successList'])): ?>
			<?php foreach ($_SESSION['successList'] as $success): ?>
				<p><?= $success ?></p>
			<?php endforeach ?>
			<?php unset($_SESSION['successList']); ?>			
		<?php endif ?>
		<br>
		<br>
		<?php foreach ($allDatabases as $key => $databases): ?>
			<div>
				<p><?= $databases['Database'] ?></p>
				<form method="post" action="">
					<input hidden type="text" name="databaseName" value="<?= $databases['Database'] ?>">
					<button type="submit" name="deleteDatabase">Supprimer</button>
				</form>
			</div>
			<br/>
			<br/>
		<?php endforeach ?>
	</section>
	<section>
		<h1>Créer une base de données</h1>
		<br> 
		<br> 
		<?php if (isset($_SESSION['errorList2'])): ?>
			<?php foreach ($_SESSION['errorList2'] as $error): ?>
				<p><?= $error ?></p>			
			<?php endforeach ?>
			<?php unset($_SESSION['errorList2']); ?>
		<?php endif ?>
		<?php if (isset($_SESSION['successList2'])): ?>
			<?php foreach ($_SESSION['successList2'] as $success): ?>
				<p><?= $success ?></p>
			<?php endforeach ?>
			<?php unset($_SESSION['successList2']); ?>			
		<?php endif ?>
		<br>
		<br>
		<br>
		<br>
		<form method="post" action="">
			<input type="text" name="databaseName">
			<button type="submit" name="createDatabase">Créer</button>
		</form>
	</section>
<?php $this->stop('main_content') ?>

