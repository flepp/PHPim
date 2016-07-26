<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>

<div class="container" class="fondNoir">
	<div class="row">
		<div class="col">
			<h1>Connexion</h1>
			<h2>Bonjour, connectez vous avec le pseudo ou l'adresse email que vous avez fourni à l'inscription et le mot de passe qui vous ont été transmis par mail</h2>
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
	    	<div>* Champs obligatoires</div>
	    	<button type="submit" class="btn btn-default">Valider</button>
				<a href="<?= $this->url('user_register') ?>"><button class="btn btn-default">Inscription</button></a>
				<a href="<?= $this->url('user_forgot')?>"><button class="btn btn-default">Mot de passe oublié?</button></a>
				<?php $this->stop('main_content') ?>

	    </form>
    </div>
</div>

