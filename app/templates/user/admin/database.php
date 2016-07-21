<?php $this->layout('layout', ['title' => 'Base de données']) ?>

<?php $this->start('main_content') ?>
<br/>
<br/>
	<form method="POST" action="">
		<p>Choississez une la sesion</p>
		<br>
		<br/>
		<br/> 
		<br/> 
		<select name="session">
		<?php foreach ($sessionList as $key => $value): ?>
			<option value="<?= $value['id'] ?>"><?= $value['ses_name'] ?></option>
		<?php endforeach ?>
		</select>
		<br/>
		<br/>
		<label>Suffixe de la database:</label>
		<input type="text" name="suffixe">
		<br/>
		<br/>
		<button type="submit">Créer</button>
	</form>
<?php $this->stop('main_content') ?>

