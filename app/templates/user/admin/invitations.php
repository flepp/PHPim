<?php $this->layout('layout', ['title' => 'Invitations']) ?>

<?php $this->start('main_content') ?>
	<br/>
	<br/>
	<br/>
	<h1>Ajouter une liste d'étudiant</h1>
	<br/>
	<br/>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="fichierSoumis" value="1">
		<input type="file" name="fichierteleverse"><br/><br/>
		<button type="submit" name="updload">Téléverser</button>
	</form>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<form method="POST" action="">
		<p>Choississez une la sesion</p>
		<br> 
		<select name="session">
		<?php foreach ($sessionList as $key => $value): ?>
			<option value="<?= $value['id'] ?>"><?= $value['ses_name'] ?></option>
		<?php endforeach ?>
		</select>
		<br> 
		<br> 
		<?php if (isset($_SESSION['errorList']) && $_SESSION['errorList'] > 0): ?>
			<?php foreach ($_SESSION['errorList'] as $error): ?>
				<p><?= $error ?></p>			
			<?php endforeach ?>
		<?php endif ?>
		<?php if (isset($_SESSION['successList']) && $_SESSION['successList'] > 0): ?>
			<?php foreach ($_SESSION['successList'] as $success): ?>
				<p><?= $success ?></p>			
			<?php endforeach ?>
		<?php endif ?>
		<br>
		<br>
		<?php foreach ($arrayStudents as $key => $students): ?>
			<div>
				<label>#<?= $key.' ' ?>Prénom:</label> 
				<input type="text" name="student[<?= $key ?>][firstname]" value="<?=$students['0'] ?>">
				<label>Nom:</label>
				<input type="text" name="student[<?= $key ?>][name]" value="<?=$students['1'] ?>">
				<label>Email:</label>
				<input type="email" name="student[<?= $key ?>][email]" value="<?=$students['2'] ?>">
			</div>
		<?php endforeach ?>
		<br>
		<br>
		<br>
		<button type="submit" name="sendInvitations">Envoyez les invitations!</button>
	</form>
	<br> 
	<br> 
	<br> 

<?php $this->stop('main_content') ?>

