<?php $this->layout('layout', ['title' => 'Invitations']) ?>

<?php $this->start('main_content') ?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~UPLOADING STUDENT LIST~~~~~~~~~~~~~~~~~~~~~ -->
<h1>Ajouter une liste d'étudiant</h1>
<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="fichierSoumis" value="1">
	<input type="file" name="fichierteleverse">
	<span>*extension permise: .csv / Séparateur ',' ou ';'</span>
	<span>Ordre: Prénom/Nom/Email/Pseudo</span>
	<button type="submit" name="upload">Téléverser</button>
</form>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SENDING INVITATIONS TO STUDENTS~~~~~~~~~~~~~~~~~~~~~ -->
<h1>Choisissez une session</h1> 
<form method="POST" action="">
	<select name="session">
	<?php foreach ($sessionList as $key => $value): ?>
		<option value="<?= $value['id'] ?>"><?= $value['ses_name'] ?></option>
	<?php endforeach ?>
	</select> 
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
	<button type="submit" name="sendInvitations">Envoyez les invitations!</button>
</form>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~CHANGING USER PROFILE FOR ADMIN~~~~~~~~~~~~~~~~~~~~~ -->   
<h1>Vous êtes connecté en tant que:</h1> 
<form method="post" action="">
	<select name="userInfo">
		<?php foreach ($usersList as $key => $info): ?>
			<option value="<?= $info['id'] ?>" "<?= $info['id'] == $_SESSION['user']['id'] ? ' selected="selected"' : '' ?>"><?= $info['usr_name'].' ' ?><?= $info['usr_firstname'] ?></option>
		<?php endforeach ?>
	</select>
	<button type="sumit" name="troll">Troll Me</button>
</form> 

<?php $this->stop('main_content') ?>

