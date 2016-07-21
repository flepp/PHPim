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
		<input type="file" name="fichierteleverse">
		<br/>
		<p>*extension permise: .csv / Séparateur ',' ou ';'</p>
		<p>Ordre: Prénom/Nom/Email/Pseudo</p>
		<br/>
		<button type="submit" name="upload">Téléverser</button>
	</form>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<form method="POST" action="">
		<p>Choisissez une session</p>
		<br> 
		<select name="session">
		<?php foreach ($sessionList as $key => $value): ?>
			<option value="<?= $value['id'] ?>"><?= $value['ses_name'] ?></option>
		<?php endforeach ?>
		</select>
		<br> 
		<br>
		<br>
		<br>
		<?php if (isset($arrayStudents) && sizeof($arrayStudents) > 0): ?>
			<?php foreach ($arrayStudents as $key => $students): ?>
				<div>
					<label>#<?= $key.' ' ?>Prénom:</label> 
					<input type="text" name="student[<?= $key ?>][firstname]" value="<?=$students['0'] ?>">
					<label>Nom:</label>
					<input type="text" name="student[<?= $key ?>][name]" value="<?=$students['1'] ?>">
					<label>Pseudo:</label>
					<input type="text" name="student[<?= $key ?>][pseudo]" value="<?=$students['3'] ?>">
					<label>Email:</label>
					<input type="email" name="student[<?= $key ?>][email]" value="<?=$students['2'] ?>">
				</div>
			<?php endforeach ?>
		<?php endif ?>
		<br>
		<button type="submit" name="sendInvitations">Envoyez les invitations!</button>
	</form>
	<br> 
	<br> 
	<br> 
	<p>Se connecter en tant que:</p>
	<br> 
	<br>
	<form method="post" action="">
		<select name="userInfo">
			<?php foreach ($usersList as $key => $info): ?>
				<option value="<?= $info['id'] ?>"><?= $info['usr_name'].' ' ?><?= $info['usr_firstname'] ?></option>
			<?php endforeach ?>
		</select>
		<button type="sumit" name="troll">Troll Me!</button>
	</form>
	<br> 
	<br>

<?php $this->stop('main_content') ?>

