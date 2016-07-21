<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>

<h1>Créer une session </h1>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION CREATION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
<section>
	<form method="POST" action="">
		<fieldset>
			<legend>Ajouter une nouvelle session</legend>
			<label>Nom de la session:</label>
			<input type="text" name="sessionName">
			<label>Date de début:</label>
			<input type="date" name="sessionStart">
			<label>Date de fin:</label>
			<input type="date" name="sessionEnd">
			<button type="submit" name="sessionCreate">Créer</button>
		</fieldset>
	</form>
</section>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION EDITION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
<section>
	<h1>Liste des sessions:</h1>
	<ul>
		<?php foreach($sessionList as $key => $value) : ?>
			<li><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?> status(<?= $value['ses_status'] ?>)</li> 
			<div>
				<form method="POST" action="">
					<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
					<input hidden type="text" name="sessionStatus" value="1">
					<button type="submit" name="sessionOn">ON</button>
				</form>
				<form method="POST" action="">
					<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
					<input hidden type="text" name="sessionStatus" value="0">
					<button type="submit" name="sessionOff">OFF</button>
				</form>
			</div>
			<form method="POST" action="">
				<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<button type="button">Editer</button>
				<button type="submit" name="sessionDelete">Supprimer</button>
			</form>
			<form method="POST" action="">
				<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<input type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input type="date" name="sessionStart" value="<?= $value['ses_start'] ?>">
				<input type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>">
				<button type="submit" name="sessionEdit">Modifier</button>
			</form>
		<?php endforeach; ?>
	</ul>
</section>

<?php $this->stop('main_content') ?>