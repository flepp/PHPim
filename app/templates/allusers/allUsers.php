<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>
	<!-- I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute -->
	<br/>
	<fieldset>
	<legend>Sélection du session*:</legend>
		<form action="" method="get">
			<select name="session_id">
				<option value="0">sélectionnez une session</option>
				<?php foreach ($sessionList as $currentSession) : ?>
				<option value="<?= $currentId == $currentSession['id']; ?>"<?= $currentSession['ses_name']; ?>
				</option>
				<?php endforeach; ?>
			</select>
			<input type="submit" value="OK"/>
		</form>
		<br/>
		<span>* Champ à utiliser seulement par admin</span>
	</fieldset>
	<br/>

	<!-- Here starts the part for "user" statute -->
	<br/>
	<h4>Liste des étudiants:</h4>
	<br/>
	<table style="display: inline-table">
	<?php foreach ($allUsersTable as $key => $value): ?>
		<tbody style="display: inline-table">
			<tr>
				<td><img height="178px" width="150px" src="<?= $this->assetUrl('upload/img/'.$value['usr_photo']) ?>" alt=""></td>
				<td><a href="<?= $this->url('allusers_details', ['id' => $value['id']]) ?>"><?= ' '.$value['usr_firstname'].' '.$value['usr_name'] ?></a></td>
			</tr>
		</tbody>
	<?php endforeach ?>
	</table>

<?php $this->stop('main_content') ?>
