<?php $this->layout('layout', ['title' => 'Edit']) ?>

<?php $this->start('main_content') ?>
	<!-- I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute -->
	<br/>
	<fieldset>
	<legend>Sélection du session*:</legend>
		<form action="" method="">
			<select name="session">
			<?php foreach ($sessionList as $key => $value) : ?>
				<option value="<?= $value['id'] ?>"><?= $value['ses_name'] ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="submit" value="OK"/>
		</form>
		<br/>
		<span>* Champ à utiliser seulement par admin</span>
	</fieldset>
	<br/>
	<br/>
	<!-- Here starts the part for "user" statute -->
	<p>Edition détails étudiant:</p>
	<br/>
	<form method="post" action="" style="margin-left: 20px" enctype="multipart/form-data">
		<h4>Nom:<?= ' '.$userInfo['usr_name'] ?></h4><br />
		<h4>Prénom:<?= ' '.$userInfo['usr_firstname'] ?></h4><br />
		<h4>Email:<?= ' '.$userInfo['usr_email'] ?></h4><br />
		<!-- I'm inserting a "div" which will be displayed only for "admin"-->
		<div>
			<h4>Nom*:</h4>
			<input type="text" name="username" value="<?= ' '.$userInfo['usr_name'] ?>"><br /><br />
			<h4>Prénom*:</h4>
			<input type="text" name="userfirstname" value="<?= ' '.$userInfo['usr_firstname'] ?>"><br /><br />
			<h4>Email*:</h4>
			<input type="email" name="useremail" value="<?= ' '.$userInfo['usr_email'] ?>"><br /><br />
			<h4>Pseudo (min. 3 charactères):</h4>
			<input type="text" name="userpseudo" value="<?= ' '.$userInfo['usr_pseudo'] ?>"><br /><br />
			<span>* Champs à éditer seulement par admin</span>
		</div><br />
		
		<h4>Mot de passe:</h4>
		<input type="password" name="userpassword" value="<?= ' '.$userInfo['usr_password'] ?>"><br /><br />
		<h4>Adresse:</h4>
		<input type="text" name="userstreet" value="<?= ' '.$userInfo['usr_street'] ?>"><br /><br />
		<h4>Ville:</h4>
		<input type="text" name="usercity" value="<?= ' '.$userInfo['usr_city'] ?>"><br /><br />
		<h4>Code postal:</h4>
		<input type="text" name="userzipcode" value="<?= ' '.$userInfo['usr_zipcode'] ?>"><br /><br />
		<h4>Pays:</h4>
		<input type="text" name="usercountry" value="<?= ' '.$userInfo['usr_country'] ?>"><br /><br />
		<h4>Date de naissance:</h4>
		<input type="date" name="userbirthdate" value="<?= ' '.$userInfo['usr_birthdate'] ?>"><br /><br />
		<h4>Photo d'étudiant:</h4>
		<img height="95px" width="80px" src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>">

		<!-- I'm inserting a new photo -->
		<input type="hidden" name="fichierSoumis" value="1">
		<label for="files"><span class="btn" style="color:#2c3e50; background-color:#bdc3c7">Changer</span></label>
		<input style="visibility: hidden;" id = "files" type="file" name="photo"><br/>
		<input type="submit" name="submitInfo" value="Valider">
	</form>

<?php $this->stop('main_content') ?>

