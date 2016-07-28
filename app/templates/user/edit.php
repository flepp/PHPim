<?php $this->layout('layout', ['title' => 'Edit']) ?>

<?php $this->start('main_content') ?>

<div class="container ">
	<!-- ~~~~ I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute ~~~ -->
	<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?>
		<div class="row">
			<div class="col-xs-12 make-space">
				<form method="POST" action="" class="custom-inline-form">
					<div class="form-group custom-form-group">
						<input hidden type="text" name="userStatus" value="1">
						<button type="submit" name="userOn" class="custom-button custom-button-blue">Activer</button>
					</div>
				</form>
				<form method="POST" class="custom-inline-form">
					<div class="form-group custom-form-group">
						<input hidden type="text" name="userStatus" value="0">
						<button  type="submit" name="userOff" class="custom-button custom-button-gold">Désactiver</button>
					</div>
				</form>
			</div>
		</div>
	<?php endif ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Here starts the part for "user" statute ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

	<div class="row">
			<div class="col-md-6">
			<h1 class="h1">Modifier votre profil:</h1>
				<form method="post" action="" enctype="multipart/form-data" class="custom-form custom-form-gold edit-form">
				<?php if ($_SESSION['user']['usr_role'] == 'user'): ?>
					<div class="form-group custom-form-group">
						<label for="inputName">Nom:<?= ' '.$userInfo['usr_name'] ?></label>
						<label for="inputFirstName">Prénom:<?= ' '.$userInfo['usr_firstname'] ?></label>
						<label for="inputEmail">Email:<?= ' '.$userInfo['usr_email'] ?></label>
						<label for="inputPseudo">Pseudo:<?= ' '.$userInfo['usr_pseudo'] ?></label>
					</div>
				<?php endif ?>
				<!-- ~~~~~~~~~~~~~~~~~~ I'm inserting a "div" which will be displayed only for "admin" statute ~~~~~~~~~~~~~~~~~~ -->
					<?php if ($_SESSION['user']['usr_role'] == 'user'){echo ' hidden';} ?>
						<div class="form-group custom-form-group">
							<label for="inputName">Nom:</label>
							<input class="form-control" type="text" name="username" value="<?= $userInfo['usr_name'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label for="inputFirstName">Prénom:</label>
							<input class="form-control" type="text" name="userfirstname" value="<?= $userInfo['usr_firstname'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label for="inputEmail">Email:</label>
							<input class="form-control" type="email" name="useremail" value="<?= $userInfo['usr_email'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label for="inputPseudo">Pseudo (min. 3 charactères):</label>
							<input class="form-control" type="text" name="userpseudo" value="<?= $userInfo['usr_pseudo'] ?>">
						</div>
						<div class="form-group custom-form-group">
								<label for="changeSession">Changer la session de l'étudiant:</label>
								<select name="session">
									<option value="0">Pas de session</option>
								<?php foreach ($sessionList as $key => $value) : ?>
									<option value="<?= $value['id'] ?>" "<?= $value['id'] == $_SESSION['user']['session_id'] ? ' selected="selected"' : '' ?>"><?= $value['ses_name'] ?>
									</option>
								<?php endforeach; ?>
								</select>
						</div>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~ I'm displaying info for "user" and admin" statuts ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<div class="form-group custom-form-group">
							<label for="inputAddress">Adresse:</label>
							<input class="form-control" type="text" name="userstreet" value="<?= $userInfo['usr_street'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label for="inputCity">Ville:</label>
							<input class="form-control" type="text" name="usercity" value="<?= $userInfo['usr_city'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label for="inputZipcode">Code postal:</label>
							<input class="form-control" type="text" name="userzipcode" value="<?= $userInfo['usr_zipcode'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label for="inputCountry">Pays:</label>
							<input class="form-control" type="text" name="usercountry" value="<?= $userInfo['usr_country'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label for="inputBirthdate">Date de naissance:</label>
							<input class="form-control" type="date" name="userbirthdate" value="<?= $userInfo['usr_birthdate'] ?>">
						</div>
						<div class="form-group custom-form-group">
							<label>Ma photo</label>
							<div class="img-wrap">
								<div class="embed-responsive embed-responsive-4by3 img-gallery-div" style="background-image : url(<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>)">
										<div class="embed-responsive-item"></div>
								</div>
							</div>
						</div>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ I'm inserting a new photo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<div class="form-group custom-form-group">
						<input type="hidden" name="fichierSoumis" value="1">
						<input id="files" type="file" name="photo" >
						<label for="files">
							<span class="custom-button custom-button-blue">Changer</span>
						</label>
					</div>
					<button class="custom-button custom-button-blue" type="submit" name="submitInfo">Valider</button>
				</form>
			</div>
	</div>
</div>

<?php $this->stop('main_content') ?>
