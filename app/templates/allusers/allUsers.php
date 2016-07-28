<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>

<!-- ~~~~~ I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute ~~~ -->
<?php if (isset($sessionList) && sizeof($sessionList) > 0): ?>	
	<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?>
	<div class="container">
		<h1 class="h1">Choisissez une session</h1>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="" class="custom-form custom-form-blue">
					<div class="form-group custom-form-group">
						<select name="session">
						<?php foreach ($sessionList as $key => $value) : ?>
							<option value="<?= $value['id']  ?>" <?php if ($id_session == $value['id']) : ?>selected="selected"<?php endif; ?>><?= $value['ses_name'] ?>
							</option>
						<?php endforeach; ?>
						</select>
					<button class="custom-button custom-button-gold form-send-button" type="submit" name="Valider">Valider</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php endif ?>
<?php endif ?>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Here starts the part for "user" statute ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<?php if(count($allUsersTable) > 0) : ?>
				<?php if ($_SESSION['user']['usr_role'] == 'user'): ?>
					<div class="container make-space users-display">
					<h2>Étudiants de ma session:</h2>
						<?php foreach ($allUsersTable as $key => $value): ?>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="embed-responsive embed-responsive-4by3 img-gallery-div"
									style="background-image : url(<?= $this->assetUrl('upload/img/'.$value['usr_photo']) ?>)
								">
									<a href="<?= $this->url('allusers_details', ['id' => $value['id']]) ?>" class="embed-responsive-item"></a>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php else: ?>
					<div class="container make-space users-display">
					<h2>Étudiants de la <?= $allUsersTable[0]['ses_name']  ?> </h2>
						<?php foreach ($allUsersTable as $key => $value): ?>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="embed-responsive embed-responsive-4by3 img-gallery-div"
									style="background-image : url(<?= $this->assetUrl('upload/img/'.$value['usr_photo']) ?>)
								">
									<a href="<?= $this->url('allusers_details', ['id' => $value['id']]) ?>" class="embed-responsive-item"></a>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			<?php endif ?>
		</>
	</div>
<?php $this->stop('main_content') ?>