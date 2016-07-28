<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>

<div class="container container-i">
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION CREATION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row">
	 	<div class="col-md-6">
			<h1 class="">Créer une session </h1>
			<form method="POST" action="" class="custom-form-gold custom-form">
				<div class="form-group custom-form-group">
					<label>Nom de la session</label>
					<input type="text" name="sessionName" class="form-control">
				</div>
				<div class="form-group custom-form-group">
					<label>Date de début</label>
					<input type="date" name="sessionStart" class="form-control">
				</div>
				<div class="form-group custom-form-group">
					<label>Date de fin</label>
					<input type="date" name="sessionEnd" class="form-control">
				</div>
				<button type="submit" name="sessionCreate" class="center-block custom-button-blue">Créer</button>
			</form>
		</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION EDITION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
		<div class="col-md-6">
			<h1 class="">Sessions créées</h1>
			<div class="col-xs-12 section-session-right">
				<!---------------SESSION WITH STUDENTS----------- -->
				<div>
					<h2>Sessions remplies</h2>
					<?php foreach($sessionList as $key => $value) : ?>
						<p class="text-capitalize">
								<?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?>
						</p>
						<div>
							<button type="button" class="button_edit custom-button custom-button-gold">Editer</button>
							<?php if($value['ses_status'] == 0): ?>
								<form class="custom-inline-form" method="POST" action="">
									<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
									<input hidden type="text" name="sessionStatus" value="1">
									<button type="submit" name="sessionOn" class="enableSession custom-button custom-button-gold">Réactiver</button>
								</form>
							<?php endif; ?>
							<?php if($value['ses_status'] == 1): ?>
								<form class="custom-inline-form" method="POST" action="">
									<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
									<input hidden type="text" name="sessionStatus" value="0">
									<button type="submit" name="sessionOff" class="disableSession  custom-button custom-button-gold">Désactiver</button>
								</form>
							<?php endif; ?>
						</div>
						<div>
							<form hidden method="POST" action="" class="show_edit custom-form-blue custom-form custom-form-group">
								<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
								<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
								<div class="form-group">
									<input type="text" name="sessionName" value="<?= $value['ses_name'] ?>" class="form-control">
								</div>
								<div class="form-group">
									<input type="date" name="sessionStart" value="<?= $value['ses_start'] ?>" class="form-control">
								</div>
								<div class="form-group">
									<input type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>" class="form-control">
								</div>
								<button type="submit" name="sessionEdit" class="update custom-button-gold">Modifier</button>
							</form>
						</div>
					<?php endforeach; ?>
				</div>
				<!---------------SESSION WITH NO STUDENTS----------- -->
				<h2>Sessions vides</h2>
				<div>
					<?php foreach($sessionList2 as $key => $value) : ?>
						<p class="text-capitalize">
							<?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?>
						</p>
						<button type="button" class="button_edit custom-button custom-button-gold">Editer</button>
						<form method="POST" action="" class="custom-inline-form">
							<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
							<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
							<button type="submit" name="sessionDelete" class="delete  custom-button custom-button-gold">Supprimer</button>
						</form>
						<form hidden method="POST" action="" class="show_edit custom-form-blue custom-form custom-form-group">
							<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
							<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
							<div class="form-group">
								<input type="text" name="sessionName" value="<?= $value['ses_name'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="date" name="sessionStart" value="<?= $value['ses_start'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>" class="form-control">
							</div>
							<button type="submit" name="sessionEdit" class="update custom-button-gold">Modifier</button>
						</form>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->stop('main_content') ?>