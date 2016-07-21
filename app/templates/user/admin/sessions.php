<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>
<br/>
<br/>
<br/>
<br/>
<h1>Créer une session </h1>
<br/>
<br/>
	<?php if (isset($_SESSION['errorCreation'])): ?>
			<?php foreach ($_SESSION['errorCreation'] as $error): ?>
				<p><?= $error ?></p>			
			<?php endforeach ?>
			<?php unset($_SESSION['errorCreation']); ?>
		<?php endif ?>
		<?php if (isset($_SESSION['successCreation'])): ?>
			<?php foreach ($_SESSION['successCreation'] as $success): ?>
				<p><?= $success ?></p>
			<?php endforeach ?>
			<?php unset($_SESSION['successCreation']); ?>			
		<?php endif ?>
	<br/>
<section>
	<form method="POST" action="">
		<fieldset>
			<legend>Ajouter une nouvelle session</legend><br/><br/>
			<label>Nom de la session:</label><br/>
			<input type="text" name="sessionName"><br/><br/>
			<label>Date de début:</label><br/>
			<input type="date" name="sessionStart"><br/><br/>
			<label>Date de fin:</label><br/>
			<input type="date" name="sessionEnd"><br/><br/>
			<button type="submit" name="sessionCreate">Créer</button>
		</fieldset>
	</form>
	<br/>
	<br/>
	<br/>
	<h2>Liste des sessions:</h2>
	<br/>
	<br/>
	<?php if (isset($_SESSION['success'])): ?>
		<?php foreach ($_SESSION['success'] as $error): ?>
			<p><?= $error ?></p>			
		<?php endforeach ?>
		<?php unset($_SESSION['success']); ?>
	<?php endif ?>
	<?php if (isset($_SESSION['errorUpdated'])): ?>
		<?php foreach ($_SESSION['errorUpdated'] as $error): ?>
			<p><?= $error ?></p>			
		<?php endforeach ?>
		<?php unset($_SESSION['errorUpdated']); ?>
	<?php endif ?>
	<br/>
	<br/>
	<ul>
		<?php foreach($sessionList as $key => $value) : ?>
		<li style="display:inline"><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?> status(<?= $value['ses_status'] ?>)</li> 
		<div style="display:inline">
			<form method="POST" action="" style="display:inline">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<input hidden type="text" name="sessionStatus" value="1">
				<button type="submit" name="sessionOn">ON</button>
			</form>
			<form method="POST" action="" style="display:inline">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<input hidden type="text" name="sessionStatus" value="0">
				<button type="submit" name="sessionOff">OFF</button>
			</form>
		</div>
		<form method="POST" action="" style="display:inline">
			<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
			<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
			<button type="submit" name="sessionDelete">Supprimer</button>
		</form>
		<form method="POST" action="">
			<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
			<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
			<input type="text" name="sessionName" placeholder="<?= $value['ses_name'] ?>">
			<input type="date" name="sessionStart" placeholder="<?= $value['ses_start'] ?>">
			<input type="date" name="sessionEnd" placeholder="<?= $value['ses_end'] ?>">
			<button type="submit" name="sessionEdit">Éditer</button>
		</form>
		<br>
		<br>
		<br>
		<?php endforeach; ?>
	</ul>
</section>
<?php $this->stop('main_content') ?>