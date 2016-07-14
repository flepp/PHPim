<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>
	<br/>
	<br/>
	<br/>
	<h1>Ajouter une liste d'étudiant</h1>
	<br/>
	<br/>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="fichierSoumis" value="1">
		<input type="file" name="fichierteleverse"><br/><br/>
		<input type="submit" value="Téléverser">
	</form>
<?php $this->stop('main_content') ?>

