<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>
	<p>Tous les etudiants:</p>
	<br/>
	<ul>
		<li>Etudiant 1</li><!-- only for testing-->
		<li>...</li><!-- only for testing-->
		<li>Etudiant 18</li><!-- only for testing-->
	<?php foreach ($allUsersTable as $key=>$value) : ?>
		<li><?= $value['usr_firstname'].' '.$value['usr_name'] ?></li>
	<?php endforeach; ?>	
	</ul>
	
<?php $this->stop('main_content') ?>
