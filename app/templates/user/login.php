<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
<form method="post">
	<div class="container fondCoul">
		<div class="row">
			<div class="col-md-12">
				<h1>Connexion</h1>
				<h2>Bonjour, connectez vous avec votre pseudo ou adresse email et votre mot de passe</h2>
			</div>
		    <form>
		    	<div class="form-group col-md-4 col-md-offset-4">
		    		<label for="Email">* Pseudo ou email</label>
		    		<input type="text" class="form-control" placeholder="Email" name="userPseudoOrEmail" value="">
		    	</div>
		    	<div class="form-group col-md-4 col-md-offset-4">
		        	<label for="Password">* Mot de passe</label>
		        	<input type="password" class="form-control" placeholder="Password" name="password" value="">
		    	</div>
		    	<div class="form-group col-md-12">
		    		<div>* Champs obligatoires</div>
		    		<button type="submit" class="btn btn-default">Valider</button>
		    	</div>
		    </form>
	    	<div class="form-group col-md-12">
	    		<div class="pressMe">
				<a href="<?= $this->url('user_register') ?>" >Inscription</a></div>
				<div class="pressMe">
				<a href="<?= $this->url('user_forgot')?>">Mot de passe oublié?</a></div>
				<?php $this->stop('main_content') ?>
			</div>
	    </div>
	</div>
<form>
