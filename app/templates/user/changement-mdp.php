<?php $this->layout('layout', ['title' => 'Changement mot de passe']) ?>

<?php $this->start('main_content') ?>
	<p>Veuillez changer votre mot de passe</p>
	<form action="" method="POST">
		<label for="password">Ancien mot de passe : </label>
		<input type="password" id="password" name="passwordOld">
		<label for="password">Nouveau mot de passe : </label>
		<input type="password" id="password" name="password">
		<label for="passwordConfirm">Confirmation du nouveau mot de passe : </label>
		<input type="password" id="passwordConfirm" name="passwordConfirm">
		<button type="submit" name="changePassword">Envoyer</button>
	</form>

<?php $this->stop('main_content') ?>
