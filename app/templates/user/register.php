<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
<form method="post" action="" enctype="multipart/form-data">
	<div class="container titleRegister">
		<div class="col-lg-8 col-md-offset-2">
			<h1>Inscription</h1>
			<h2>Bonjour, entrez les informations qui vous ont été transmises par mail</h2>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-8 col-md-offset-2 fondCoul">
			<div class="row">
			    <form>
			      <div class="form-group col-md-4 custom-form-group">
			        <label for="Email">* Adresse Email</label>
			        <input type="email" class="form-control" name="email" value="">
			      </div>
			      <div class="form-group col-md-4 col-md-offset-4 custom-form-group">
			        <label for="Password">* Mot de passe</label>
			        <input type="password" class="form-control" name="password" value="">
			      </div>
			      <div class="form-group col-md-12 custom-form-group">
			        <label for="Street">Rue</label>
			        <input type="text" class="form-control" name="street" value="">
			      </div>
			      <div class="form-group col-md-4 custom-form-group">
			        <label for="City">Ville</label>
			        <input type="text" class="form-control" name="city" value="">
			      </div>
			      <div class="form-group col-md-2 col-md-offset-1 custom-form-group">
			        <label for="ZipCode">Code postal</label>
			        <input type="text" class="form-control" name="zipcode" value="">
			      </div>
			      <div class="form-group col-md-4 col-md-offset-1 custom-form-group">
			        <label for="Country">Pays</label>
			        <input type="text" class="form-control" name="country" value="">
			      </div>
			      <div class="form-group col-md-4 custom-form-group">
			        <label for="Birthdate">Date de naissance</label>
			        <input type="date" class="form-control" name="birthdate" value="">
			      </div>
			      <div class="form-group col-md-12 custom-form-group">
			      	<img height="90px" width="90px" src="<?= $this->assetUrl('upload/img/avatar_0.png') ?>">
			        <label for="InputFile">Changez la photo</label>
			        <input type="file" name="photo" value="">
			        <p>(fichiers autorisés: jpg, jpeg, gif, png, maximum 350Ko)</p>
			      <div>* Champs obligatoires</div>
			      <button type="submit" class="btn btn-default">Valider</button>
			      </div>
			    </form>
		    </div>
	    </div>
    </div>
</form>
<?php $this->stop('main_content') ?>
