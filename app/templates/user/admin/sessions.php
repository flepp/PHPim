<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>
	<br/>
	<br/>
	<br/>
	<br/>
	<h1>Créer une session </h1><br/><br/><br/>
	<form method="POST" action="">
		<fieldset>
			<legend>Ajouter une nouvelle session</legend><br/><br/>
			<label>Nom de la session:</label><br/>
			<input type="text" name="sessionName"><br/><br/>
			<label>Date de début:</label><br/>
			<input type="date" name="sessionStart"><br/><br/>
			<label>Date de fin:</label><br/>
			<input type="date" name="sessionEnd"><br/><br/>
			<button type="submit">Créer</button>
		</fieldset>
	</form>
	<br/>
	<br/>
	<br/>
	<h2>Liste des sessions:</h2>
	<br/>
	<br/>
	<ul>
		<?php foreach($sessionList as $key => $value) : ?>
		<li><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?>(<?= $value['ses_status'] ?>)</li> 
		<div>
			<form method="POST" action="">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<input hidden type="text" name="sessionStatus" value="1">
				<button type="submit">ON</button>
			</form>
			<form method="POST" action="">
				<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
				<input hidden type="text" name="sessionStatus" value="0">
				<button type="submit">OFF</button>
			</form>
		</div>
		<?php endforeach; ?>
	</ul>
<?php $this->stop('main_content') ?>

