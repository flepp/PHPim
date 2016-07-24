<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>
<!-- I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute -->
<br/>
<?php if (isset($sessionList) && sizeof($sessionList) > 0): ?>	
	<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?>
	<h1>Choisissez une session:</h1>
		<form action="" method="">
			<select name="session">
			<?php foreach ($sessionList as $key => $value) : ?>
				<option value="<?= $value['id']  ?>" <?php if ($id_session == $value['id']) : ?>selected="selected"<?php endif; ?>><?= $value['ses_name'] ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="submit" value="OK"/>
		</form>
	<?php endif ?>
<?php endif ?>

<br/>

<!-- Here starts the part for "user" statute -->
<?php if(count($allUsersTable) > 0) : ?>
	<br/>
	<?php if ($_SESSION['user']['usr_role'] == 'user'): ?>
		<h1>Liste des étudiants de ma session:</h1>
	<?php else: ?>
		<h1>Les étudiants de <?= $allUsersTable[0]['ses_name']  ?> </h1>
	<?php endif ?>
	<br/>
	<table style="display: inline-table">
		<?php foreach ($allUsersTable as $key => $value): ?>
			<tbody style="display: inline-table">
				<tr>
					<td><img height="178px" width="150px" src="<?= $this->assetUrl('upload/img/'.$value['usr_photo']) ?>" alt=""></td>
					<td><a href="<?= $this->url('allusers_details', ['id' => $value['id']]) ?>"><?= $value['usr_firstname'].' '.$value['usr_name'] ?></a></td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
<?php endif ?>

<?php $this->stop('main_content') ?>

