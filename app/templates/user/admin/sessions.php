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
	<!---------------SESSION WITH STUDENTS----------- -->
	<ul>
		<?php foreach($sessionList as $key => $value) : ?>
			<li><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?> status(<?= $value['ses_status'] ?>)</li> 
			<div>
				<form method="POST" action="">
					<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
					<input hidden type="text" name="sessionStatus" value="1">
					<button type="submit" name="sessionOn" class="enableSession">ON</button>
				</form>
				<form method="POST" action="">
					<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
					<input hidden type="text" name="sessionStatus" value="0">
					<button type="submit" name="sessionOff" class="disableSession">OFF</button>
				</form>
			</div>
			<div>
				<button type="button" class="button_edit">Editer</button>
			</div>
			<form hidden method="POST" action="" class="show_edit">
				<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<input type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input type="date" name="sessionStart" value="<?= $value['ses_start'] ?>">
				<input type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>">
				<button type="submit" name="sessionEdit" class="update">Modifier</button>
			</form>
		<?php endforeach; ?>
	</ul>
	<!---------------SESSION WITH NO STUDENTS----------- -->
	<ul>
		<?php foreach($sessionList2 as $key => $value) : ?>
			<li><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?> status(<?= $value['ses_status'] ?>)</li> 
			<div>
				<button type="button" class="button_edit">Editer</button>
			</div>
			<form method="POST" action="">
				<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<button type="submit" name="sessionDelete" class="delete">Supprimer</button>
			</form>
			<form hidden method="POST" action="" class="show_edit">
				<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<input type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
				<input type="date" name="sessionStart" value="<?= $value['ses_start'] ?>">
				<input type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>">
				<button type="submit" name="sessionEdit" class="update">Modifier</button>
			</form>
		<?php endforeach; ?>
	</ul>
</section>

<?php $this->stop('main_content') ?>