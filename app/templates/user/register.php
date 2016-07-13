<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2><br />

	<form method="post" action="">
		<h4>Email</h4>
		<input type="email" name="email" value=""><br />
		<br />
		<h4>* Pseudo (minimum 3 charactères)</h4>
		<input type="text" name="userpseudo" value=""><br />
		<br />
		<h4>* Mot de passe</h4>
		<input type="password" name="password" value=""><br />
		<br />
		<h4>* Confirmer le mot de passe</h4>
		<input type="password" name="password2" value=""><br />
		<br />
		<h4>Rue</h4>
		<input type="text" name="street" value=""><br />
		<br />
		<h4>Ville</h4>
		<input type="text" name="city" value=""><br />
		<br />
		<h4>Code postal</h4>
		<input type="text" name="zipcode" value=""><br />
		<br />
		<h4>Pays</h4>
		<input type="text" name="street" value=""><br />
		<br />
		<h4>Date de naissance</h4>
		<input type="date" name="birthdate" value=""><br />
		<br />
		<h4>Photo du profil</h4>
		<img height="80px" width="80px" src="../upload/avatar_0.png">

		<?php
		if (!empty($_GET['id'])) {
			$userId = $_GET['id'];
			//print_r($studentId);

			$extensionAutorisees = array('jpg','png','gif');

			// Je récupère mon tableau avec les infos sur le fichier
			foreach ($_FILES as $key => $fichier) {
				// Je teste si le fichier a été uploadé
				if (!empty($fichier) && !empty($fichier['name'])) {
					print_r($fichier);
					if ($fichier['size'] <= 500000) {
						$filename = $fichier['name'];
						$dotPos = strrpos($filename, '.');
						$extension = strtolower(substr($filename, $dotPos+1));
						// Je test si c'est pas un hack (sur l'extension)
						//if (substr($fichier['name'], -4) != '.php') {
						if (in_array($extension, $extensionAutorisees)) {
							// Je déplace le fichier uploadé au bon endroit
							if (move_uploaded_file($fichier['tmp_name'], 'upload/'. 'avatar_' .$userId.'.'.$extension)) {
								echo 'fichier téléversé<br />';
							}
							else {
								echo 'une erreur est survenue<br />';
							}
						}
						else {
							echo 'extension interdite<br />';
						}
					}
					else {
						echo 'fichier trop lourd<br />';
					}
				}
			}
		}
		?>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="fichierSoumis" value="1">
			<input type="file" name="fichierteleverse"><br/>
			<input type="submit" value="Téléverser">
		</form>

		<br />
		<span>* Champs obligatoires</span>
		<br>
		<input type="submit" value="Valider">
	</form>
<?php $this->stop('main_content') ?>

