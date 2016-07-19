<?php $this->layout('layout', ['title' => 'Réinitialisation mot de passe']) ?>

<?php $this->start('main_content') ?>
	<p>Veuillez réinitialiser votre mot de passe</p>
	<form action="" method="POST">
		<label for="password">Nouveau mot de passe : </label>
		<br>
		<input type="password" id="password" name="password">
		<br>
		<label for="passwordConfirm">Confirmation nouveau mot de passe : </label>
		<br>
		<input type="password" id="passwordConfirm" name="passwordConfirm">
		<br>
		<button type="submit">Envoyer</button>
		<br>
		<small>En cliquant ce bouton, je prends connaissance du fait que PHPim puisse s'emparer de mon âme et en faire ce qu'il veut.</small>
	</form>
<?php $this->stop('main_content') ?>

