<?php $this->layout('layout', ['title' => 'Réinitialisation mot de passe']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Réinitialisation de votre mot de passe</h1>
	<p>Veuillez compléter les deux champs ce-dessous afin de réinitialiser votre mot de passe</p>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="POST" class="custom-form custom-form-blue">
				<div class="form-group custom-form-group">
					<label for="password">Nouveau mot de passe : </label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group custom-form-group">
					<label for="passwordConfirm">Confirmation nouveau mot de passe : </label>
					<input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control">
				</div>
				<button type="submit" class="custom-button custom-button-gold form-send-button">Envoyer</button>
			</form>
		</div>
	</div>
</div>
<?php $this->stop('main_content') ?>

