<?php $this->layout('layout', ['title' => 'Ajout']) ?>

<?php $this->start('main_content') ?>
	<p>Ajouter un quiz</p>
	<form action="" method="POST">
		<label for="day">Jour</label>
		<br>
		<input type="text" id="day" name="quiDay">
		<br>
		<label for="title">Titre</label>
		<br>
		<input type="text" id="title" name="quiTitle">
		<br>
		<label for="link">Lien</label>
		<br>
		<input type="text" id="link" name="quiLink">
		<br>
		<button type="submit">Ajouter</button>
	</form>
<?php $this->stop('main_content') ?>

