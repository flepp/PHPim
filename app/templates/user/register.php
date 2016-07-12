<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2><br />

	<form method="post" action="">
		<h4>Pseudo</h4><br />
		<input type="text" name="userpseudo" value="" /><br />
		<br />
		<h4>Email</h4><br />
		<input type="email" name="email" value=""><br>
		<br>
		<h4>Mot de passe</h4><br>
		<input type="password" name="password" value=""><br>
		<br>
		<h4>Confirmer le mot de passe</h4><br>
		<input type="password" name="password2" value=""><br>
		<br>
		<input type="submit" value="Valider">
	</form>
<?php $this->stop('main_content') ?>

