<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2>
	<h4>Bonjour, entrez les informations qui vous ont été transmises par mail</h4>
	<form method="post" action="" enctype="multipart/form-data">
		* Email
		<input type="email" name="email" value="">
		
		* mot de passe
		<input type="password" name="password" value="">
		
		Rue
		<input type="text" name="street" value="">
		
		Ville
		<input type="text" name="city" value="">
		
		Code postal
		<input type="text" name="zipcode" value="">
		
		Pays
		<input type="text" name="country" value="">
		
		Date de naissance
		<input type="date" name="birthdate" value="">
		
		
		<img height="90px" width="90px" src="<?= $this->assetUrl('upload/img/avatar_0.png') ?>">

		<input type="hidden" name="fichierSoumis" value="1">
		<label for="files">Ajoutez votre photo (fichiers autorisés: jpg, jpeg, gif, png, maximum 350Ko)</label>
		<input style="visibility: hidden;" id = "files" type="file" name="photo">

		<div>* Champs obligatoires</div>
		
		<input type="submit" value="Valider">
	</form>
<?php $this->stop('main_content') ?>

