<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
<form method="post" action="" enctype="multipart/form-data">
	<div class="container fondCoul">
		<div class="row">
			<div class="col-md-12">
				<h1>Inscription</h1>
				<h2>Bonjour, entrez les informations qui vous ont été transmises par mail</h2>
			</div>
		    <form>
		      <div class="form-group col-md-4 custom-form-group">
		        <label for="Email">* Adresse Email</label>
		        <input type="email" class="form-control" placeholder="Email" name="email" value="">
		      </div>
		      <div class="form-group col-md-4 col-md-offset-4">
		        <label for="Password">* Mot de passe</label>
		        <input type="password" class="form-control" placeholder="Password" name="password" value="">
		      </div>
		      <div class="form-group col-md-12">
		        <label for="Street">Rue</label>
		        <input type="text" class="form-control" placeholder="Rue" name="street" value="">
		      </div>
		      <div class="form-group col-md-4">
		        <label for="City">Ville</label>
		        <input type="text" class="form-control" placeholder="Ville" name="city" value="">
		      </div>
		      <div class="form-group col-md-2 col-md-offset-1">
		        <label for="ZipCode">Code postal</label>
		        <input type="text" class="form-control" placeholder="Code postal" name="zipcode" value="">
		      </div>
		      <div class="form-group col-md-4 col-md-offset-1">
		        <label for="Country">Pays</label>
		        <input type="text" class="form-control" placeholder="Pays" name="country" value="">
		      </div>
		      <div class="form-group col-md-4">
		        <label for="Birthdate">Date de naissance</label>
		        <input type="date" class="form-control" placeholder="Date de naissance" name="birthdate" value="">
		      </div>
		      <div class="form-group col-md-12">
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
</form>
<?php $this->stop('main_content') ?>
