<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
<form method="post">
	<div class="container fondNoir">
		<div class="row">
			<div class="col-md-12">
				<h1>Connexion</h1>
				<h2>Bonjour, connectez vous avec votre pseudo ou adresse email et votre mot de passe</h2>
			</div>
		    <form>
		    	<div class="form-group col-md-5">
		    		<label for="Email">* Pseudo ou email</label>
		    		<input type="text" class="form-control" placeholder="Email" name="userPseudoOrEmail" value="">
		    	</div>
		    	<div class="form-group col-md-5 col-md-offset-2">
		        	<label for="Password">* Mot de passe</label>
		        	<input type="password" class="form-control" placeholder="Password" name="password" value="">
		    	</div>
		    	<div class="form-group col-md-12">
		    		<div>* Champs obligatoires</div>
		    		<button type="submit" class="btn btn-default">Valider</button>
		    	</div>
		    	<div class="form-group col-md-12">
					<a href="<?= $this->url('user_register') ?>"><button class="btn btn-default">Inscription</button></a>
					<a href="<?= $this->url('user_forgot')?>"><button class="btn btn-default">Mot de passe oublié?</button></a>
					<?php $this->stop('main_content') ?>
				</div>
		    </form>
	    </div>
	</div>
<form>

