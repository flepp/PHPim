<?php $this->layout('layout', ['title' => 'Etudiant']) ?>

<?php $this->start('main_content') ?>
	<p>Détails étudiant:</p>
	<br/>
	<!-- I'm displaying the specific info for an user -->		
	<h4>Photo du:<?= ' '.$userInfo['usr_firstname'].' '.$userInfo['usr_name'] ?></h4>
	<br/>
	<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/'.$userInfo['usr_photo']) ?>">
	<br/>
	<ul>
		<li>Nom:<?= ' '.$userInfo['usr_name'] ?></li><br/>
		<li>Prénom:<?= ' '.$userInfo['usr_firstname'] ?></li><br/>
		<li>Email:<?= ' '.$userInfo['usr_email'] ?></li><br/>
		<li>Date de naissance:<?= ' '.$userInfo['usr_birthdate'] ?></li><br/>
		<li>Ville:<?= ' '.$userInfo['usr_city'] ?></li><br/>
		<li>Pays:<?= ' '.$userInfo['usr_country'] ?></li><br/>
		<li>Adresse:<?= ' '.$userInfo['usr_street'] ?></li><br/>
		<li>Code postal:<?= ' '.$userInfo['usr_zipcode'] ?></li><br/>
	</ul>
	<!-- I'm redirecting to all users page -->
	<a href="<?= $this->url('allusers_allUsers') ?>">OK</a>
	<!-- I'm redirecting to edit user page -->
	<a href="<?= $this->url('user_edit', ['id' => $userInfo['id']]) ?>">Editer</a>
		
<?php $this->stop('main_content') ?>
