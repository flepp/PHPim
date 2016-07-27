<?php $this->layout('layout', ['title' => 'Edit']) ?>

<?php $this->start('main_content') ?>

<div class="container container-paul">
	<!-- ~~~~ I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute ~~~ -->
	<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?> 
		<div class="on-off">
			<form method="POST" action="">
				<div class="form-group">
					<input hidden type="text" name="userStatus" value="1">
					<button class="btn btn-default" type="submit" name="userOn">Activer</button>
				</div>
			</form>
			<form method="POST" action="">
				<div class="form-group">
					<input hidden type="text" name="userStatus" value="0">
					<button class="btn btn-default" type="submit" name="userOff">Désactiver</button>
				</div>
			</form>
		</div>
	<?php endif ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Here starts the part for "user" statute ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	
	<h1>Modifier votre profil:</h1>
	<form method="post" action="" enctype="multipart/form-data">
	<?php if ($_SESSION['user']['usr_role'] == 'user'): ?>
		<div class="form-group">
			<label for="inputName">Nom:<?= ' '.$userInfo['usr_name'] ?></label>
			<label for="inputFirstName">Prénom:<?= ' '.$userInfo['usr_firstname'] ?></label>
			<label for="inputEmail">Email:<?= ' '.$userInfo['usr_email'] ?></label>
			<label for="inputPseudo">Pseudo:<?= ' '.$userInfo['usr_pseudo'] ?></label>
		</div>
	<?php endif ?>
	<!-- ~~~~~~~~~~~~~~~~~~ I'm inserting a "div" which will be displayed only for "admin" statute ~~~~~~~~~~~~~~~~~~ -->
		<?php if ($_SESSION['user']['usr_role'] == 'user'){echo ' hidden';} ?>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<div class="inputs-admin">
							<label for="inputName">Nom:</label>
							<input class="form-control" type="text" name="username" value="<?= $userInfo['usr_name'] ?>">
							<label for="inputFirstName">Prénom:</label>
							<input class="form-control" type="text" name="userfirstname" value="<?= $userInfo['usr_firstname'] ?>">
							<label for="inputEmail">Email:</label>
							<input class="form-control" type="email" name="useremail" value="<?= $userInfo['usr_email'] ?>">
							<label for="inputPseudo">Pseudo (min. 3 charactères):</label>
							<input class="form-control" type="text" name="userpseudo" value="<?= $userInfo['usr_pseudo'] ?>">
							<label for="changeSession">Changer la session de l'étudiant:</label>
							<select name="session">
								<option value="0">Pas de session</option>
							<?php foreach ($sessionList as $key => $value) : ?>
								<option value="<?= $value['id'] ?>" "<?= $value['id'] == $_SESSION['user']['session_id'] ? ' selected="selected"' : '' ?>"><?= $value['ses_name'] ?>
								</option>
							<?php endforeach; ?>
							</select>
						</div>	
					</div>	
				</div>
			
		
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~ I'm displaying info for "user" and admin" statuts ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
				<div class="col-xs-6">
					<div class="form-group">
						<label for="inputAddress">Adresse:</label>
						<input class="form-control" type="text" name="userstreet" value="<?= $userInfo['usr_street'] ?>">
						<label for="inputCity">Ville:</label>
						<input class="form-control" type="text" name="usercity" value="<?= $userInfo['usr_city'] ?>">
						<label for="inputZipcode">Code postal:</label>
						<input class="form-control" type="text" name="userzipcode" value="<?= $userInfo['usr_zipcode'] ?>">
						<label for="inputCountry">Pays:</label>
						<input class="form-control" type="text" name="usercountry" value="<?= $userInfo['usr_country'] ?>">
						<label for="inputBirthdate">Date de naissance:</label>
						<input class="form-control" type="date" name="userbirthdate" value="<?= $userInfo['usr_birthdate'] ?>">
					</div>
				</div>
			</div>
		<label for="inputPhoto">Photo d'étudiant:</label>
		<img src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>">
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ I'm inserting a new photo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<input type="hidden" name="fichierSoumis" value="1">
		<label for="files"><span class="btn btn-default">Changer</span></label>
		<input id = "files" type="file" name="photo">
		<div class="btn-valider">
			<input class="btn btn-default" type="submit" name="submitInfo" value="VALIDER">
		</div>
	</form>
</div>

<?php $this->stop('main_content') ?>
