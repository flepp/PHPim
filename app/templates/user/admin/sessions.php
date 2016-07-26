<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION CREATION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row firstSection">
		<h1 class="col-xs-12">Créer une session </h1>
			<div class="row">
				<form method="POST" action="" class="col-xs-10 col-xs-offset-1">
					<div class="form-group">
						<label>Nom de la session:</label>
						<input type="text" name="sessionName" class="form-control">
					</div>
					<div class="form-group">
						<label>Date de début:</label>
						<input type="date" name="sessionStart" class="form-control">
					</div>
					<div class="form-group">
						<label>Date de fin:</label>
						<input type="date" name="sessionEnd" class="form-control">
					</div>
						<button type="submit" name="sessionCreate" class="btn btn-default">Ajouter</button>
				</form>
			</div>
	</section>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION EDITION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<section class="row secondSection">

			<h1 class="col-xs-12">Liste des sessions</h1>
			<!---------------SESSION WITH STUDENTS----------- -->
			<ul  class="col-xs-12">
				<?php foreach($sessionList as $key => $value) : ?>
					<div class="row"> 
						<li class="col-xs-9"><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> / <?= $value['ses_end'] ?></li>
						<div class="col-xs-3">
							<div class="row">
								<form method="POST" action="" class="col-xs-5">
									<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
									<input hidden type="text" name="sessionStatus" value="1">
									<button type="submit" name="sessionOn" class="enableSession btn btn-default">1</button>
								</form>
								<form method="POST" action="" class="col-xs-5">
									<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
									<input hidden type="text" name="sessionStatus" value="0">
									<button type="submit" name="sessionOff" class="disableSession btn btn-default">0</button>
								</form>
							</div>
							<button type="button" class="button_edit btn btn-default">Editer</button>
						</div>
					</div>
					<div class="row">
						<form hidden method="POST" action="" class="show_edit col-xs-10 col-xs-offset-1">
							<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
							<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
							<input class="form-control" type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
							<input class="form-control" type="date" name="sessionStart" value="<?= $value['ses_start'] ?>">
							<input class="form-control" type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>">
							<button type="submit" name="sessionEdit" class="update btn btn-default">Modifier</button>
						</form>
					</div>
				<?php endforeach; ?>
			</ul>
		<!---------------SESSION WITH NO STUDENTS----------- -->
		<ul class="col-xs-12">
			<?php foreach($sessionList2 as $key => $value) : ?>
				<div class="row">
					<li class="col-xs-9"><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> / <?= $value['ses_end'] ?></li> 
					<div class="col-xs-3">
						<form method="POST" action="" class="">
							<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
							<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
							<button type="submit" name="sessionDelete" class="delete btn btn-default">Effacer</button>
						</form>
						<div>
							<button type="button" class="button_edit btn btn-default">Editer</button>
						</div>
					</div>
					<div class="row">
						<form hidden method="POST" action="" class="show_edit col-xs-10 col-xs-offset-1">
							<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
							<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
							<input class="form-control" type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
							<input class="form-control" type="date" name="sessionStart" value="<?= $value['ses_start'] ?>">
							<input class="form-control" type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>">
							<button type="submit" name="sessionEdit" class="update btn btn-default">Modifier</button>
						</form>
					</div>
				</div>
			<?php endforeach; ?>
		</ul>
	</section>
</div>
<?php $this->stop('main_content') ?>