<?php $this->layout('layout', ['title' => 'Etudiant']) ?>

<?php $this->start('main_content') ?>

	<!-- ~~~~~~~~~~~~~~~~~ I'm displaying the specific info for an user ~~~~~~~~~~~~~ -->		
	<div class="container container-paul">
		<div class="row">
			<div class="col-xs-6">
				<h1>Informations personnelles:</h1>
				<img height="360px" width="300px" src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>"><br/><br/>
				<ul class="list-details">
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
				<!-- I'm redirecting to edit user page -->
				<?php if ($userInfo['id'] == $_SESSION['user']['id']): ?>
					<a class="btn btn-default" href="<?= $this->url('user_edit', ['id' => $userInfo['id']]) ?>">Editer</a>
				<?php endif ?>
			</div>
			<div class="col-xs-6">
				<!-- ~~~~~~~~~~~~~~~~~ I'm changing the user profile for admin ~~~~~~~~~~~~~~~~~~ -->
				<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?> 
					<h4>Vous êtes connecté en tant que:</h4> 
					<form method="post" action="">
						<div class="form-group">
							<select name="userInfo">
								<?php foreach ($usersList as $key => $info): ?>
									<option value="<?= $info['id'] ?>" "<?= $info['id'] == $_SESSION['user']['id'] ? ' selected="selected"' : '' ?>"><?= $info['usr_name'].' ' ?><?= $info['usr_firstname'] ?></option>
								<?php endforeach ?>
							</select>
							<button class="btn btn-default" type="submit" name="troll">Troll me</button>
						</div>
					</form> 
				<?php endif ?>
				<input hidden id="address" type="textbox" value="<?= $userInfo['usr_city'].', '.$userInfo['usr_street'] ?>">
			    
			    <div id="map"></div>

			</div>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~ I'm redirecting to all users page ~~~~~~~~~~~~~~~~~~~ -->
			<div class="retour-vers-liste">
				<a class="btn btn-default" href="<?= $this->url('allusers_allUsers') ?>">Retour vers liste</a>
			</div>
    </div>  
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfSWVubN0FtFttDkHjBWTbwINb-VFNbVc&signed_in=true&callback=initMap"async defer>
	</script>
<?php $this->stop('main_content') ?>
