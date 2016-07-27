<?php $this->layout('layout', ['title' => 'Etudiants']) ?>

<?php $this->start('main_content') ?>

<!-- ~~~~~ I'm inserting a "form", for selecting the session, which will be displayed only for "admin" statute ~~~ -->
<?php if (isset($sessionList) && sizeof($sessionList) > 0): ?>	
	<?php if ($_SESSION['user']['usr_role'] == 'admin'): ?>
	<div class="container">
		<h1 class="h1">Choisissez une session</h1>
		<div class="section choose-session">
			<form action="" method="">
				<div class="form-group custom-form-group">
					<select name="session">
					<?php foreach ($sessionList as $key => $value) : ?>
						<option value="<?= $value['id']  ?>" <?php if ($id_session == $value['id']) : ?>selected="selected"<?php endif; ?>><?= $value['ses_name'] ?>
						</option>
					<?php endforeach; ?>
					</select>
					<button class="custom-button custom-button-gold" type="submit" name="Valider">Valider</button>
				</div>
			</form>
		</div>
	<?php endif ?>
<?php endif ?>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Here starts the part for "user" statute ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<div class="section list-session">
			<?php if(count($allUsersTable) > 0) : ?>
				<?php if ($_SESSION['user']['usr_role'] == 'user'): ?>
					<h2>Étudiants de ma session:</h2>
				<?php else: ?>
					<h2>Étudiants de la <?= $allUsersTable[0]['ses_name']  ?> </h2>
				<?php endif ?>
				<div class="table">
					<div class="row users-display">
					<?php foreach ($allUsersTable as $key => $value): ?>
						<div class="col-xs-12 col-sm-6 col-md-4"><a href="<?= $this->url('allusers_details', ['id' => $value['id']]) ?>"><img class="img-responsive" src="<?= $this->assetUrl('upload/img/'.$value['usr_photo']) ?>" alt=""></a>
						</div>
					<?php endforeach ?>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php $this->stop('main_content') ?>