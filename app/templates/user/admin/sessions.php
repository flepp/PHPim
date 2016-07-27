<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>

<div class="container container-i">
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION CREATION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row col-md-6 section-session-left">
		<div class="col-xs-10 col-sm-6">
			<h1 class="">Créer une session </h1>
			<form method="POST" action="" class="custom-form-gold custom-form custom-form-group">
				<div class="form-group">
					<label>Nom de la session</label>
					<input type="text" name="sessionName" class="form-control">
				</div>
				<div class="form-group">
					<label>Date de début</label>
					<input type="date" name="sessionStart" class="form-control">
				</div>
				<div class="form-group">
					<label>Date de fin</label>
					<input type="date" name="sessionEnd" class="form-control">
				</div>
				<button type="submit" name="sessionCreate" class="center-block custom-button-blue">Créer</button>
			</form>
		</div>
	</section>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION EDITION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row col-md-6 section-session-right">
		<div class="col-xs-10 col-sm-6">
			<h1 class="">Sessions créées</h1>
			<!---------------SESSION WITH STUDENTS----------- -->
			<h2>Sessions remplies</h2>
			<ul>
				<?php foreach($sessionList as $key => $value) : ?>
					<li class="text-capitalize"><strong><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?></strong></li>
					<div class="row">
						<div class="col-xs-3">
							<form class="custom-form">
								<button type="button" class="button_edit custom-button-gold">Editer</button>
							</form>
						</div>
						<div class="form-group col-xs-4 col-xs-offset-1">
							<form class="custom-form" method="POST" action="" <?php if($value['ses_status'] == 1){echo " hidden";} ?>>
								<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
								<input hidden type="text" name="sessionStatus" value="1">
								<button type="submit" name="sessionOn" class="enableSession btn btn-default">Réactivé</button>
							</form>
							<form class="custom-form" method="POST" action="" <?php if($value['ses_status'] == 0){echo " hidden";} ?>>
								<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
								<input hidden type="text" name="sessionStatus" value="0">
								<button type="submit" name="sessionOff" class="disableSession  custom-button-gold">Désactivé</button>
							</form>
						</div>
					</div>
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
			</ul>
			<!---------------SESSION WITH NO STUDENTS----------- -->
			<h2>Sessions vides</h2>
			<ul>
				<?php foreach($sessionList2 as $key => $value) : ?>
					<li class="text-capitalize"><strong><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?></strong></li>
					<div class="row">
						<div class="col-xs-3">
							<form class="custom-form">
								<button type="button" class="button_edit custom-button-gold">Editer</button>
							</form>
						</div>
						<div class="col-xs-4 col-xs-offset-1">
							<form method="POST" action="" class="custom-form">
								<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
								<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
								<button type="submit" name="sessionDelete" class="delete  custom-button-gold">Supprimer</button>
							</form>
						</div>
					</div>
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
			</ul>
		</div">
	</section>
</div>
<?php $this->stop('main_content') ?>