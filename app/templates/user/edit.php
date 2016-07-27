<?php $this->layout('layout', ['title' => 'Edit']) ?>

<?php $this->start('main_content') ?>

	<!-- ~~~~ I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute ~~~ -->
<div class="container container-paul">
	<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?> 
		<div class="on-off">
			<form method="POST" action="">
				<input hidden type="text" name="userStatus" value="1">
				<button class="btn btn-default" type="submit" name="userOn">ON</button>
			</form>
			<form method="POST" action="">
				<input hidden type="text" name="userStatus" value="0">
				<button class="btn btn-default" type="submit" name="userOff">OFF</button>
			</form>
		</div>
	<?php endif ?>	

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Here starts the part for "user" statute ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	
	<h1>Modifier votre profil:</h1>
	<form method="post" action="" style="margin-left: 20px" enctype="multipart/form-data">
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
						<label for="inputName">Nom:</label>
						<input type="text" name="username" value="<?= $userInfo['usr_name'] ?>">
						<label for="inputFirstName">Prénom:</label>
						<input type="text" name="userfirstname" value="<?= $userInfo['usr_firstname'] ?>">
						<label for="inputEmail">Email*:</label>
						<input type="email" name="useremail" value="<?= $userInfo['usr_email'] ?>">
						<label for="inputPseudo">Pseudo (min. 3 charactères):</label>
						<input type="text" name="userpseudo" value="<?= $userInfo['usr_pseudo'] ?>">
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
			
		
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~ I'm displaying info for "user" and admin" statuts ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
				<div class="col-xs-6">
					<div class="form-group">
						<label>Adresse:</label>
						<input type="text" name="userstreet" value="<?= $userInfo['usr_street'] ?>">
						<label>Ville:</label>
						<input type="text" name="usercity" value="<?= $userInfo['usr_city'] ?>">
						<label>Code postal:</label>
						<input type="text" name="userzipcode" value="<?= $userInfo['usr_zipcode'] ?>">
						<label>Pays:</label>
						<input type="text" name="usercountry" value="<?= $userInfo['usr_country'] ?>">
						<label>Date de naissance:</label>
						<input type="date" name="userbirthdate" value="<?= $userInfo['usr_birthdate'] ?>">
					</div>
				</div>
			</div>
		<label>Photo d'étudiant:</label>
		<img height="95px" width="80px" src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>">
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ I'm inserting a new photo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<input type="hidden" name="fichierSoumis" value="1">
		<label for="files"><span class="btn btn-default">Changer</span></label>
		<input style="visibility: hidden;" id = "files" type="file" name="photo">
		<input class="btn btn-default" type="submit" name="submitInfo" value="VALIDER">
	</form>
</div>

<?php $this->stop('main_content') ?>


<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>