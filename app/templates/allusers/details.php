<?php $this->layout('layout', ['title' => 'Etudiant']) ?>

<?php $this->start('main_content') ?>
	<p>Détails étudiant:</p>
	<br/>
	<table style="width:70%">
		<thead>
			<tr>
				<td>Nom</td>
				<td>Prénom</td>
				<td>Email</td>
				<td>Date de naissance</td>
				<td>Ville</td>
				<td>Pays</td>
				<td>Adresse</td>
				<td>Code postal</td>
				<td>Photo</td>
			</tr>
		</thead>
		<tbody>
		<!-- I'm displaying the specific info for an user -->		
			<tr>
				<td><?= $userInfo['usr_name'] ?></td>
				<td><?= $userInfo['usr_firstname'] ?></td>
				<td><?= $userInfo['usr_email'] ?></td>
				<td><?= $userInfo['usr_birthdate'] ?></td>
				<td><?= $userInfo['usr_city'] ?></td>
				<td><?= $userInfo['usr_country'] ?></td>
				<td><?= $userInfo['usr_street'] ?></td>
				<td><?= $userInfo['usr_zipcode'] ?></td>
				<td><?= $userInfo['usr_photo'] ?></td>
				<!-- I'm redirecting to all users page -->
				<td><a href="<?= $this->url('allusers_allUsers', ['id' => $value['id']]) ?>">OK</a></td>
				<!-- I'm redirecting to edit user page -->
				<td><a href="<?= $this->url('user_edit', ['id' => $value['id']]) ?>">Editer</a></td>
			</tr>
		</tbody>
	</table>		
		
<?php $this->stop('main_content') ?>
