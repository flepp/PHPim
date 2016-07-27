<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<div class="container titleRegister">
		<div class="row">
			<div class="col-lg-6 col-md-offset-3">
				<h1>Connexion</h1>
				<h2>Bonjour, connectez vous avec votre pseudo ou adresse email et votre mot de passe</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
			    <form method="POST" class=" custom-form custom-form-blue">
			    	<div class="custom-form-group">
			    		<label for="Email">* Pseudo ou email</label>
			    		<input type="text" class="form-control" name="userPseudoOrEmail" value="">
			    	</div>
			    	<div class="custom-form-group">
			        	<label for="Password">* Mot de passe</label>
			        	<input type="password" class="form-control" name="password" value="">
			    	</div>
			    	<div class="custom-form-group">
			    		<div>* Champs obligatoires</div>
			    		<button type="submit" class="custom-button-gold">Valider</button>
			    	</div>
			    </form>
		    	<div class="form-group col-md-12 pressMe">
		    		<div>
					<a href="<?= $this->url('user_register') ?>" >Inscription</a>
					<a href="<?= $this->url('user_forgot')?>">Mot de passe oublié?</a>
					</div>
					<?php $this->stop('main_content') ?>
				</div>
		    </div>
	</div>
