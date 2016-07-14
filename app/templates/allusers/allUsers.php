<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>
	<!--<p>Liste des étudiants:</p>-->
	<br/>
	<table style="width:15%">
	<caption><u>Liste des étudiants:</u></caption>
	<?php foreach ($allUsersTable as $key => $value): ?>
		<tbody>
			<tr>
				<td> <img height="120px" width="170px" src="<?= $value['usr_photo']?>" alt=""> </td>
				<td>
					<table>
						<tr>
							<td><a href="allUsers.php?id=<?= $value['id']?>">Details</a></td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	<?php endforeach ?>
	</table>

<?php $this->stop('main_content') ?>
