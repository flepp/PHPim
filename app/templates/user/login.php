<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2><br />

	<div>
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
		<?php endif ?><br><br>
	</div>
	<form method="post">
	<h4>Pseudo ou email</h4><br />
	<input type="text" name="userPseudoOrEmail" value=""><br>
	<br>
	<h4>Mot de passe</h4><br>
	<input type="password" name="password" value=""><br>
	<br>
	<input type="submit" value="Valider">
</form>
<a href="<?= $this->url('user_register') ?>">Inscription</a>
<a href="<?= $this->url('user_forgot')?>">Mot de passe oublié ?</a>
<?php $this->stop('main_content') ?>
