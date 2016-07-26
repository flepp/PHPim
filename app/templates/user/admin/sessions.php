<?php $this->layout('layout', ['title' => 'Sessions']) ?>

<?php $this->start('main_content') ?>
<div class="container">
	<div class="row">
		<h1 class="col-xs-4 col-xs-offset-4">Créer une session </h1>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION CREATION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="row">
		<section>
			<form method="POST" action="">
				<div class="row">
					<label class="col-xs-12 col-sm-4 col-sm-offset-4 ">Nom de la session:</label>
					<input class="col-xs-12 col-sm-4 col-sm-offset-4 " type="text" name="sessionName">
				</div>
				<div class="row">
					<label class="col-xs-12 col-sm-4 col-sm-offset-4 ">Date de début:</label>
					<input class="col-xs-12 col-sm-4 col-sm-offset-4 " type="date" name="sessionStart">
				</div>
				<div class="row">
					<label class="col-xs-12 col-sm-4 col-sm-offset-4 ">Date de fin:</label>
					<input class="col-xs-12 col-sm-4 col-sm-offset-4 " type="date" name="sessionEnd">
				</div>
				<div class="row">
					<button class="col-xs-1 col-xs-offset-4" type="submit" name="sessionCreate">+</button>
				</div>
			</form>
		</section>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~SESSION EDITION SECTION~~~~~~~~~~~~~~~~~~~~~ -->
	<section>
		<h1>Liste des sessions:</h1>
		<!---------------SESSION WITH STUDENTS----------- -->
		<ul>
			<?php foreach($sessionList as $key => $value) : ?>
				<li><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?> status(<?= $value['ses_status'] ?>)</li> 
				<div>
					<form method="POST" action="">
						<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
						<input hidden type="text" name="sessionStatus" value="1">
						<button type="submit" name="sessionOn" class="enableSession">ON</button>
					</form>
					<form method="POST" action="">
						<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
						<input hidden type="text" name="sessionStatus" value="0">
						<button type="submit" name="sessionOff" class="disableSession">OFF</button>
					</form>
				</div>
				<div>
					<button type="button" class="button_edit">Editer</button>
				</div>
				<form hidden method="POST" action="" class="show_edit">
					<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
					<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
					<input type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
					<input type="date" name="sessionStart" value="<?= $value['ses_start'] ?>">
					<input type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>">
					<button type="submit" name="sessionEdit" class="update">Modifier</button>
				</form>
			<?php endforeach; ?>
		</ul>
		<!---------------SESSION WITH NO STUDENTS----------- -->
		<ul>
			<?php foreach($sessionList2 as $key => $value) : ?>
				<li><?= $value['ses_name'] ?> du <?= $value['ses_start'] ?> au <?= $value['ses_end'] ?> status(<?= $value['ses_status'] ?>)</li> 
				<div>
					<button type="button" class="button_edit">Editer</button>
				</div>
				<form method="POST" action="">
					<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
					<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
					<button type="submit" name="sessionDelete" class="delete">Supprimer</button>
				</form>
				<form hidden method="POST" action="" class="show_edit">
					<input hidden type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
					<input hidden type="text" name="sessionId" value="<?= $value['id'] ?>">
					<input type="text" name="sessionName" value="<?= $value['ses_name'] ?>">
					<input type="date" name="sessionStart" value="<?= $value['ses_start'] ?>">
					<input type="date" name="sessionEnd" value="<?= $value['ses_end'] ?>">
					<button type="submit" name="sessionEdit" class="update">Modifier</button>
				</form>
			<?php endforeach; ?>
		</ul>
	</section>
</div>
<?php $this->stop('main_content') ?>