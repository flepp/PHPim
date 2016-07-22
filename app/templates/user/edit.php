<?php $this->layout('layout', ['title' => 'Edit']) ?>

<?php $this->start('main_content') ?>
	<!-- I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute -->
<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?> 
	<div>
		<form method="POST" action="">
			<input hidden type="text" name="userStatus" value="1">
			<button type="submit" name="userOn">ON</button>
		</form>
		<form method="POST" action="">
			<input hidden type="text" name="userStatus" value="0">
			<button type="submit" name="userOff">OFF</button>
		</form>
	</div>
<?php endif ?>	
<br/>
<!-- Here starts the part for "user" statute -->
<h1>Modifier votre profil:</h1>
<form method="post" action="" style="margin-left: 20px" enctype="multipart/form-data">
<?php if ($_SESSION['user']['usr_role'] == 'user'): ?>
	<label>Nom:<?= ' '.$userInfo['usr_name'] ?></label><br />
	<label>Prénom:<?= ' '.$userInfo['usr_firstname'] ?></label><br />
	<label>Email:<?= ' '.$userInfo['usr_email'] ?></label><br />
	<label>Pseudo:<?= ' '.$userInfo['usr_pseudo'] ?></label><br />
<?php endif ?>

<!-- I'm inserting a "div" which will be displayed only for "admin"-->
	<div <?php if ($_SESSION['user']['usr_role'] == 'user'){echo ' hidden';} ?>>
		<label>Nom*:</label>
		<input type="text" name="username" value="<?= $userInfo['usr_name'] ?>"><br /><br />
		<label>Prénom*:</label>
		<input type="text" name="userfirstname" value="<?= $userInfo['usr_firstname'] ?>"><br /><br />
		<label>Email*:</label>
		<input type="email" name="useremail" value="<?= $userInfo['usr_email'] ?>"><br /><br />
		<label>Pseudo (min. 3 charactères):</label>
		<input type="text" name="userpseudo" value="<?= $userInfo['usr_pseudo'] ?>"><br /><br />
		<span>Changer la session de l'étudiant:</span>
		<select name="session">
			<option value="0">Pas de session</option>
		<?php foreach ($sessionList as $key => $value) : ?>
			<option value="<?= $value['id'] ?>" "<?= $value['id'] == $_SESSION['user']['session_id'] ? ' selected="selected"' : '' ?>"><?= $value['ses_name'] ?>
			</option>
		<?php endforeach; ?>
		</select>
	</div>

	<br />
	
	<h4>Adresse:</h4>
	<input type="text" name="userstreet" value="<?= $userInfo['usr_street'] ?>"><br /><br />
	<h4>Ville:</h4>
	<input type="text" name="usercity" value="<?= $userInfo['usr_city'] ?>"><br /><br />
	<h4>Code postal:</h4>
	<input type="text" name="userzipcode" value="<?= $userInfo['usr_zipcode'] ?>"><br /><br />
	<h4>Pays:</h4>
	<input type="text" name="usercountry" value="<?= $userInfo['usr_country'] ?>"><br /><br />
	<h4>Date de naissance:</h4>
	<input type="date" name="userbirthdate" value="<?= $userInfo['usr_birthdate'] ?>"><br /><br />
	<h4>Photo d'étudiant:</h4>
	<img height="95px" width="80px" src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>">

	<!-- I'm inserting a new photo -->
	<input type="hidden" name="fichierSoumis" value="1">
	<label for="files"><span class="btn" style="color:#2c3e50; background-color:#bdc3c7">Changer</span></label>
	<input style="visibility: hidden;" id = "files" type="file" name="photo"><br/>
	<input type="submit" name="submitInfo" value="Valider">
</form>

<?php $this->stop('main_content') ?>

