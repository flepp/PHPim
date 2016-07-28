<?php $this->layout('layout', ['title' => 'Invitations']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<h1 class="h1">Liste d'étudiants</h1>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~UPLOADING STUDENT LIST~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row">
		<div class="col-xs-12">
			<p>Vous pouvez, via le formulaire ce-dessous, ajouter une liste d'étudiants présente sur un fichier CSV et l'affecter à une session.</p>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5">
		<h2>Ajoutez une liste d'étudiants</h2>
			<form action="" method="post" enctype="multipart/form-data" class="custom-form-blue custom-form">
				<input type="hidden" name="fichierSoumis" value="1">
				<input type="file" name="fichierteleverse" class="file">
				<div class="info-upload">
					<span>*extension permise: .csv / Séparateur ',' ou ';'</span>
					<span>Ordre: Prénom/Nom/Email/Pseudo</span>
				</div>
				<button type="submit" name="upload" class="form-send-button custom-button-gold">Téléverser</button>
			</form>
		</div>
	</section>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SENDING INVITATIONS TO STUDENTS~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row invites">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h2>Choisissez une session</h2>
			<form method="POST" action="" class="">
				<select name="session" class="form-control">
				<option value="-1">Choisissez une session</option>
				<?php foreach ($sessionList as $key => $value): ?>
					<option value="<?= $value['id'] ?>"><?= ucfirst ($value['ses_name']) ?></option>
				<?php endforeach ?>
				</select>
				<?php if (isset($arrayStudents) && sizeof($arrayStudents) > 0): ?>
					<?php foreach ($arrayStudents as $key => $students): ?>
						<div class="database-row">
							<div class="form-group custom-form-group">
								<div class="col-md-3">
									<label for="firstname">#<?= $key.' ' ?>Prénom:</label>
									<input type="text" name="student[<?= $key ?>][firstname]" value="<?=$students['0'] ?>" id="firstname" class="form-control" >
								</div>
								<div class="col-md-3">
									<label>Nom:</label>
									<input type="text" name="student[<?= $key ?>][name]" value="<?=$students['1'] ?>" class="form-control">
								</div>
								<div class="col-md-3">
									<label>Pseudo:</label>
									<input type="text" name="student[<?= $key ?>][pseudo]" value="<?=$students['3'] ?>" class="form-control">
								</div>
								<div class="col-md-3">
									<label>Email:</label>
									<input type="email" name="student[<?= $key ?>][email]" value="<?=$students['2'] ?>" class="form-control">
								</div>
							</div>
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<button type="submit" name="sendInvitations" class="confirmation custom-button custom-button-blue">Envoyer</button>
			</form>
		</div>
	</section>
</div>
<?php $this->stop('main_content') ?>

