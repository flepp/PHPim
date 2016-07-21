<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2>

	<form method="post">
		Pseudo ou email
		<input type="text" name="userPseudoOrEmail" value="">

		Mot de passe
		<input type="password" name="password" value="">

		<input type="submit" value="Valider">
	</form>
<a href="<?= $this->url('user_register') ?>">Inscription</a>
<a href="<?= $this->url('user_forgot')?>">Mot de passe oublié ?</a>
<?php $this->stop('main_content') ?>
