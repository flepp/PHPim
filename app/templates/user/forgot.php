<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>
	<div class="container">
	<h1 class="h1">Mot de passe oublié</h1>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="POST" class="custom-form custom-form-blue">
					<div class="form-group custom-form-group">
						<label for="email">Adresse E-Mail : </label>
						<input type="email" id="email" name="usrMail" class="form-control">
					</div>
					<button type="submit" class="custom-button custom-button-gold form-send-button">Envoyer</button>
				</form>
			</div>
		</div>
	</div>
<?php $this->stop('main_content') ?>

