<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<div class="container titleRegister">
		<h1 class="h1">Inscription</h1>
		<p>Veuillez entrer les informations qui vous ont été transmises par mail</p>
		<div class="row">
			<div class="col-lg-8">
			    <form method="POST" action="" enctype="multipart/form-data" class="custom-form custom-form-blue">
			    	<div class="row">
					    <div class="col-md-6 custom-form-group">
					      	<label for="Email">* Adresse Email</label>
					      	<input type="email" class="form-control" name="email" value="">
					    </div>
					    <div class="col-md-6 custom-form-group">
					      	<label for="Password">* Mot de passe</label>
					      	<input type="password" class="form-control" name="password" value="">
					    </div>
					    <div class="col-md-12 custom-form-group">
					      	<label for="Street">Rue</label>
					      	<input type="text" class="form-control" name="street" value="">
					    </div>
					    <div class="col-md-7 custom-form-group">
					      	<label for="City">Ville</label>
					      	<input type="text" class="form-control" name="city" value="">
					    </div>
					    <div class="col-md-5 custom-form-group">
					      	<label for="ZipCode">Code postal</label>
					      	<input type="text" class="form-control" name="zipcode" value="">
					    </div>
					    <div class="col-md-6 custom-form-group">
					      	<label for="Country">Pays</label>
					      	<input type="text" class="form-control" name="country" value="">
					    </div>
					    <div class="col-md-6 custom-form-group">
					      	<label for="Birthdate">Date de naissance</label>
					      	<input type="date" class="form-control" name="birthdate" value="">
					    </div>
					    <div class="col-md-12 custom-form-group">
					     	<img height="90px" width="90px" src="<?= $this->assetUrl('upload/img/avatar_0.png') ?>">
					      	<label for="InputFile">Changez la photo</label>
					      	<div class="upload custom-button-gold">Choisissez un fichier
					      	<input type="file" name="photo" value="" class="fileUpload"></div>
					      	<p>(fichiers autorisés: jpg, jpeg, gif, png, maximum 350Ko)</p>
					      	<button type="submit" class="custom-button-gold ">Valider</button>
					    	<div class="form-mandatory-msg">* Champs obligatoires</div>
					    </div>
				    </div>
			    </form>
		    </div>
	    </div>
	</div>
<?php $this->stop('main_content') ?>
