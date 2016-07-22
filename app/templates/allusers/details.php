<?php $this->layout('layout', ['title' => 'Etudiant']) ?>

<?php $this->start('main_content') ?>
	<p>Infos:</p>
	<br/>
	<!-- I'm displaying the specific info for an user -->		
	<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>">
	<br/>
	<ul>
		<li>Nom:<?= ' '.$userInfo['usr_name'] ?></li><br/>
		<li>Prénom:<?= ' '.$userInfo['usr_firstname'] ?></li><br/>
		<li>Email:<?= ' '.$userInfo['usr_email'] ?></li><br/>
		<li>Pseudo:<?= ' '.$userInfo['usr_pseudo'] ?></li><br/>
		<li>Date de naissance:<?= ' '.$userInfo['usr_birthdate'] ?></li><br/>
		<li>Ville:<?= ' '.$userInfo['usr_city'] ?></li><br/>
		<li>Pays:<?= ' '.$userInfo['usr_country'] ?></li><br/>
		<li>Adresse:<?= ' '.$userInfo['usr_street'] ?></li><br/>
		<li>Code postal:<?= ' '.$userInfo['usr_zipcode'] ?></li><br/>
	</ul>
	<!-- I'm redirecting to all users page -->
	<a href="<?= $this->url('allusers_allUsers') ?>">Retour vers liste</a>
	<!-- I'm redirecting to edit user page -->
	<?php if ($userInfo['id'] == $_SESSION['user']['id']): ?>
		<a href="<?= $this->url('user_edit', ['id' => $userInfo['id']]) ?>">Editer</a>
	<?php endif ?>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~CHANGING USER PROFILE FOR ADMIN~~~~~~~~~~~~~~~~~~~~~ -->
	<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?> 
		<h1>Vous êtes connecté en tant que:</h1> 
		<form method="post" action="">
			<select name="userInfo">
				<?php foreach ($usersList as $key => $info): ?>
					<option value="<?= $info['id'] ?>" "<?= $info['id'] == $_SESSION['user']['id'] ? ' selected="selected"' : '' ?>"><?= $info['usr_name'].' ' ?><?= $info['usr_firstname'] ?></option>
				<?php endforeach ?>
			</select>
			<button type="sumit" name="troll">Troll Me</button>
		</form> 
	<?php endif ?>	
<?php $this->stop('main_content') ?>
