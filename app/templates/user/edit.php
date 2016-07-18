<?php $this->layout('layout', ['title' => 'Edit']) ?>

<?php $this->start('main_content') ?>
	<br/>
	<p>Edition détails étudiant:</p>
	<br/>
	<form method="post" action="" style="margin-left: 20px">
		<h4>Nom:<?= ' '.$userInfo['usr_name'] ?></h4><br />
		<h4>Prénom:<?= ' '.$userInfo['usr_firstname'] ?></h4><br />
		<h4>Email:<?= ' '.$userInfo['usr_email'] ?></h4><br />
		<h4>Pseudo (min. 3 charactères):</h4>
		<input type="text" name="userpseudo" value="<?= ' '.$userInfo['usr_pseudo'] ?>"><br />
		<br />
		<h4>Mot de passe:</h4>
		<input type="password" name="userpassword" value="<?= ' '.$userInfo['usr_password'] ?>"><br />
		<br />
		<h4>Adresse:</h4>
		<input type="text" name="userstreet" value="<?= ' '.$userInfo['usr_street'] ?>"><br />
		<br />
		<h4>Ville:</h4>
		<input type="text" name="usercity" value="<?= ' '.$userInfo['usr_city'] ?>"><br />
		<br />
		<h4>Code postal:</h4>
		<input type="text" name="userzipcode" value="<?= ' '.$userInfo['usr_zipcode'] ?>"><br />
		<br />
		<h4>Pays:</h4>
		<input type="text" name="usercountry" value="<?= ' '.$userInfo['usr_country'] ?>"><br />
		<br />
		<h4>Date de naissance:</h4>
		<input type="date" name="userbirthdate" value="<?= ' '.$userInfo['usr_birthdate'] ?>"><br />
		<br />
		<h4>Photo d'étudiant:</h4>
		<img height="95px" width="80px" src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>">

		<!-- I'm inserting a new photo -->
		<input type="hidden" name="fichierSoumis" value="1">
		<label for="files"><span class="btn" style="color:#2c3e50; background-color:#bdc3c7">Changer</span></label>
		<input style="visibility: hidden;" id = "files" type="file" name="photo"><br/>
		<input type="submit" value="Valider">
	</form>

<?php $this->stop('main_content') ?>

