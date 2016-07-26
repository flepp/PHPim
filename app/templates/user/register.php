<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2>
	<h4>Bonjour, entrez les informations qui vous ont été transmises par mail</h4>

<div class="container">
    <form>
      <div class="form-group">
        <label for="Email1">* Adresse Email</label>
        <input type="email" class="form-control" id="InputEmail1" placeholder="Email" name="email" value="">
      </div>
      <div class="form-group">
        <label for="Password">* Mot de passe</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password" value="">
      </div>
      <div class="form-group">
        <label for="Street">Rue</label>
        <input type="text" class="form-control" id="InputStreet" placeholder="Rue" name="street" value="">
      </div>
      <div class="form-group">
        <label for="City">Rue</label>
        <input type="text" class="form-control" id="InputCity" placeholder="Ville" name="city" value="">
      </div>
      <div class="form-group">
        <label for="ZipCode">Code postal</label>
        <input type="text" class="form-control" id="InputZipCode" placeholder="Code postal" name="zipcode" value="">
      </div>
      <div class="form-group">
        <label for="Country">Ville</label>
        <input type="text" class="form-control" id="InputCountry" placeholder="Pays" name="country" value="">
      </div>
      <div class="form-group">
        <label for="Birthdate">Date de naissance</label>
        <input type="date" class="form-control" id="InputBirthdate" placeholder="Date de naissance" name="birthdate" value="">
      </div>
      <div class="form-group">
      	<img height="90px" width="90px" src="<?= $this->assetUrl('upload/img/avatar_0.png') ?>">
        <label for="InputFile">Changez la photo</label>
        <input type="file" id="exampleInputFile" name="street" value="">
        <p class="help-block">(fichiers autorisés: jpg, jpeg, gif, png, maximum 350Ko)</p>
      </div>
      <div>* Champs obligatoires</div>
      <button type="submit" class="btn btn-default">Valider</button>
    </form>
  </div>

<?php $this->stop('main_content') ?>

