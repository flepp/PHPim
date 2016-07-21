<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>
	<!-- I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute -->
	<br/>
	<fieldset>
	<legend>Sélection du session*:</legend>
		<form action="" method="">
			<select name="session">
			<?php foreach ($sessionList as $key => $value) : ?>
				<option value="<?= $value['id']  ?>" <?php if ($id_session == $value['id']) : ?>selected="selected"<?php endif; ?>><?= $value['ses_name'] ?>
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
	<?php if(count($allUsersTable) > 0) : ?>
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
	<?php endif ?>

<?php $this->stop('main_content') ?>

