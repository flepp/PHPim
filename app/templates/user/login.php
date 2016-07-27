<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<div class="container titleRegister">
		<h1 class="h1">Connexion</h1>
		<p>Bonjour, connectez vous avec votre pseudo ou adresse email et votre mot de passe</p>
		<div class="row">
			<div class="col-lg-6 col-lg">
			    <form method="POST" class="custom-form custom-form-blue">
			    	<div class="custom-form-group">
			    		<label for="Email">* Pseudo ou email</label>
			    		<input type="text" class="form-control" name="userPseudoOrEmail" value="">
			    	</div>
			    	<div class="custom-form-group">
			        	<label for="Password">* Mot de passe</label>
			        	<input type="password" class="form-control" name="password" value="">
			    	</div>
			    	<div class="custom-form-group">
			    		<button type="submit" class="custom-button-gold">Valider</button>
			    		<div class="form-mandatory-msg">* Champs obligatoires</div>
			    	</div>
			    </form>
		    	<div class="login-optional">
					<a href="<?= $this->url('user_register') ?>" >Inscription</a>
					<a href="<?= $this->url('user_forgot')?>">Mot de passe oublié?</a>
				</div>
		    </div>
		</div>
	</div>
<?php $this->stop('main_content') ?>
