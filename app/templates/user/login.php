<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2><br />

	<form method="post">
	<h4>Pseudo ou email</h4><br />
	<input type="text" name="userpseudo" value=""><br>
	<br>
	<h4>Mot de passe</h4><br>
	<input type="password" name="password" value=""><br>
	<br>
	<input type="submit" value="Valider">
</form>
<?php $this->stop('main_content') ?>

