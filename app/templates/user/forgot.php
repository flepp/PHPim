<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<p>User forgot</p>
	<form action="" method="POST">
		<label for="email">Adresse E-Mail : </label>
		<br>
		<input type="email" id="email" name="usrMail">
		<br>
		<button type="submit">Envoyer</button>
		<br>
		<small>En cliquant ce bouton, je prends connaissance du fait que PHPim puisse s'emparer de mon âme et en faire ce qu'il veut.</small>
	</form>
<?php $this->stop('main_content') ?>

