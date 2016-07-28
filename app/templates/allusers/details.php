<?php $this->layout('layout', ['title' => 'Etudiant']) ?>

<?php $this->start('main_content') ?>

	<!-- ~~~~~~~~~~~~~~~~~ I'm displaying the specific info for an user ~~~~~~~~~~~~~ -->
				<!-- ~~~~~~~~~~~~~~~~~ I'm changing the user profile for admin ~~~~~~~~~~~~~~~~~~ -->
	<div class="container">
		<h1 class="h1">Informations personnelles:</h1>
	</div>
	<input hidden id="address" type="textbox" value="<?= $userInfo['usr_country'].', '.$userInfo['usr_city'].', '.$userInfo['usr_street'] ?>">
    <div id="map"></div>
	<div class="container">
		<div class="row">
			<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?> 
					<div class="col-md-6 col-md-push-6">
						<form method="post" action="" class="custom-form custom-form-blue">
							<p class="form-group custom-form-group">Vous êtes connecté en tant que:</p> 
							<div class="form-group">
								<select name="userInfo">
									<?php foreach ($usersList as $key => $info): ?>
										<option value="<?= $info['id'] ?>" "<?= $info['id'] == $_SESSION['user']['id'] ? ' selected="selected"' : '' ?>"><?= $info['usr_name'].' ' ?><?= $info['usr_firstname'] ?></option>
									<?php endforeach ?>
								</select>
								<button class="custom-button custom-button-gold" type="submit" name="troll">Troll me</button>
							</div>
						</form>
					</div>
			<?php endif ?>
			<div class="col-md-6 col-md-pull-6">
				<div class="details-list custom-form-gold">
					<div class="form-group custom-form-group">
							<div class="img-wrap">
								<div class="embed-responsive embed-responsive-4by3 img-gallery-div" style="background-image : url(<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>)">
										<div class="embed-responsive-item"></div>
								</div>
							</div>
					</div>
					<ul >
						<li>Nom:<?= ' '.$userInfo['usr_name'] ?></li>
						<li>Prénom:<?= ' '.$userInfo['usr_firstname'] ?></li>
						<li>Email:<?= ' '.$userInfo['usr_email'] ?></li>
						<li>Pseudo:<?= ' '.$userInfo['usr_pseudo'] ?></li>
						<li>Date de naissance:<?= ' '.$userInfo['usr_birthdate'] ?></li>
						<li>Ville:<?= ' '.$userInfo['usr_city'] ?></li>
						<li>Pays:<?= ' '.$userInfo['usr_country'] ?></li>
						<li>Adresse:<?= ' '.$userInfo['usr_street'] ?></li>
						<li>Code postal:<?= ' '.$userInfo['usr_zipcode'] ?></li>
					</ul>
					<?php if ($userInfo['id'] == $_SESSION['user']['id']): ?>
						<a class="custom-button custom-button-blue" href="<?= $this->url('user_edit', ['id' => $userInfo['id']]) ?>">Editer</a>
					<?php endif ?>
				</div>
				<!-- I'm redirecting to edit user page -->
			</div>	<!-- ~~~~~~~~~~~~~~~~~~~~~~ I'm redirecting to all users page ~~~~~~~~~~~~~~~~~~~ -->
    	</div>
		<div class="retour-vers-liste">
			<a class="custom-button custom-button-blue button-back" href="<?= $this->url('allusers_allUsers') ?>">Retour vers liste</a>
		</div>
	</div>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfSWVubN0FtFttDkHjBWTbwINb-VFNbVc&signed_in=true&callback=initMap"async defer>
	</script>
<?php $this->stop('main_content') ?>
