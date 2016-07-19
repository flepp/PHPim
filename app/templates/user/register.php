<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2><br />

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
		
		<span>* Champs obligatoires</span>
		<br>
		<input type="submit" value="Valider">
	</form>
<?php $this->stop('main_content') ?>

