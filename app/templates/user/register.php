<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2><br />

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
	<form method="post" action="" enctype="multipart/form-data">
		<h4>* Email</h4>
		<input type="email" name="email" value=""><br />
		<br />
		<h4>* mot de passe</h4>
		<input type="password" name="password" value=""><br />
		<br />
		<h4>* Pseudo (minimum 3 charactères)</h4>
		<input type="text" name="userpseudo" value=""><br />
		<br />
		<h4>Rue</h4>
		<input type="text" name="street" value=""><br />
		<br />
		<h4>Ville</h4>
		<input type="text" name="city" value=""><br />
		<br />
		<h4>Code postal</h4>
		<input type="text" name="zipcode" value=""><br />
		<br />
		<h4>Pays</h4>
		<input type="text" name="country" value=""><br />
		<br />
		<h4>Date de naissance</h4>
		<input type="date" name="birthdate" value=""><br />
		<br />
		
		<img height="90px" width="90px" src="<?= $this->assetUrl('upload/img/avatar_0.png') ?>"><br />

		<input type="hidden" name="fichierSoumis" value="1">
		<label for="files">Ajouter une photo</label>
		<input style="visibility: hidden;" id = "files" type="file" name="photo"><br />

		<span>* Champs obligatoires</span>
		<br>
		<input type="submit" value="Valider">
	</form>
<?php $this->stop('main_content') ?>

