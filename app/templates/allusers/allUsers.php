<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>
	<!--<p>Liste des étudiants:</p>-->
	<br/>
	<table style="width:65%">
	<caption><u>Liste des étudiants:</u></caption>
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
			<?php foreach ($allUsersTable as $detailsUser) : ?>
				<tr>
					<td><a href="allUsers.php?id=<?= $detailsUser['id'] ?>"><?= $detailsUser['usr_name'] ?></a></td>
					<td><a href="allUsers.php?id=<?= $detailsUser['id'] ?>"><?= $detailsUser['usr_firstname'] ?></a></td>
					<td><?= $detailsUser['usr_email'] ?></td>
					<td><?= $detailsUser['usr_birthdate'] ?></td>
					<td><?= $detailsUser['usr_city'] ?></td>
					<td><?= $detailsUser['usr_country'] ?></td>
					<td><?= $detailsUser['usr_street'] ?></td>
					<td><?= $detailsUser['usr_zipcode'] ?></td>
					<td><?= $detailsUser['usr_photo'] ?></td>
					<td><input type="submit" value="Edit"></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

<?php $this->stop('main_content') ?>
