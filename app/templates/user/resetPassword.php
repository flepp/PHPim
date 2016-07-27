<?php $this->layout('layout', ['title' => 'Réinitialisation mot de passe']) ?>

<?php $this->start('main_content') ?>
	<p>Veuillez réinitialiser votre mot de passe</p>
	<form action="" method="POST">
		<label for="password">Nouveau mot de passe : </label>
		<input type="password" id="password" name="password">
		<label for="passwordConfirm">Confirmation du nouveau mot de passe : </label>
		<input type="password" id="passwordConfirm" name="passwordConfirm">
		<button type="submit">Envoyer</button>
	</form>

<?php $this->stop('main_content') ?>

