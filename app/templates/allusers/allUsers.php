<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>
	<!--<p>Liste des étudiants:</p>-->
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
