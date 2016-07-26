<?php $this->layout('layout', ['title' => 'Invitations']) ?>

<?php $this->start('main_content') ?>
<div class="container"> 
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~UPLOADING STUDENT LIST~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row">
		<div class="col-xs-8 col-sm-6 col-md-6">
			<h1>Ajouter une liste d'étudiant</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="fichierSoumis" value="1">
				<input type="file" name="fichierteleverse" class="file">
				<div class="info-upload">
					<span>*extension permise: .csv / Séparateur ',' ou ';'</span>
					<span>Ordre: Prénom/Nom/Email/Pseudo</span>
				</div>
				<button type="submit" name="upload" class="btn btn-default">Téléverser</button>
			</form>
		</div>
	</section>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SENDING INVITATIONS TO STUDENTS~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row">
		<div class="col-xs-8 col-sm-8 col-md-12">
			<h1>Choisissez une session</h1> 
			<form method="POST" action="">
				<div class="row">
					<div class="col-sm-3 col-md-2">
						<select name="session" class="form-control">
						<?php foreach ($sessionList as $key => $value): ?>
							<option value="<?= $value['id'] ?>"><?= ucfirst ($value['ses_name']) ?></option>
						<?php endforeach ?>
						</select> 
					</div>
				</div>
				<?php if (isset($arrayStudents) && sizeof($arrayStudents) > 0): ?>
					<?php foreach ($arrayStudents as $key => $students): ?>
						<div class="row">
							<div class="col-sm-3 form-group col-md-2">
								<label>#<?= $key.' ' ?>Prénom:</label> 
								<input type="text" name="student[<?= $key ?>][firstname]" value="<?=$students['0'] ?>" class="form-control">
							</div>
							<div class="col-sm-3 form-group col-md-2">
								<label>Nom:</label>
								<input type="text" name="student[<?= $key ?>][name]" value="<?=$students['1'] ?>" class="form-control">
							</div>
							<div class="col-sm-3 form-group col-md-2">
								<label>Pseudo:</label>
								<input type="text" name="student[<?= $key ?>][pseudo]" value="<?=$students['3'] ?>" class="form-control">
							</div>
							<div class="col-sm-3 form-group col-md-2">
								<label>Email:</label>
								<input type="email" name="student[<?= $key ?>][email]" value="<?=$students['2'] ?>" class="form-control">
							</div>
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<button type="submit" name="sendInvitations" class="confirmation btn btn-default">Envoyez les invitations!</button>
			</form>
		</div>
	</section>
</div>
<?php $this->stop('main_content') ?>

