<?php $this->layout('layout', ['title' => 'Base de données']) ?>

<?php $this->start('main_content') ?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~CREATING DATABASE FOR SESSION~~~~~~~~~~~~~~~~~~~~~ -->
<h1>Choississez une la sesion</h1>
<form method="POST" action="">
	<select name="session">
	<?php foreach ($sessionList as $key => $value): ?>
		<option value="<?= $value['id'] ?>"><?= $value['ses_name'] ?></option>
	<?php endforeach ?>
	</select>
	<label>Suffixe de la database:</label>
	<input type="text" name="suffixe">
	<button type="submit">Créer</button>
</form>

<?php $this->stop('main_content') ?>

