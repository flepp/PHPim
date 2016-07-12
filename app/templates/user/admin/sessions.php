<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>
	<p>Créer une session </p>
	<form method="POST" action="">
		<fieldset>
			<legend>Ajouter une nouvelle session</legend>
			<label>Nom de la session:</label>
			<input type="text" name="sessionName">
			<label>Date de début:</label>
			<input type="date" name="sessionStart">
			<label>Date de fin:</label>
			<input type="date" name="sessionEnd">
			<button type="submit">Créer</button>
		</fieldset>
	</form>
<?php $this->stop('main_content') ?>

