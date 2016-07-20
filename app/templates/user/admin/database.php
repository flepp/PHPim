<?php $this->layout('layout', ['title' => 'Base de données']) ?>

<?php $this->start('main_content') ?>
<br/>
<br/>
	<form method="POST" action="">
		<p>Choississez une la sesion</p>
		<br>
		<br/>
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

