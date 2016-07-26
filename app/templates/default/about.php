
<?php $this->layout('layout', ['title' => 'About !']) ?>
<?php $this->start('main_content') ?>

<div class="container fondNoir">
	<div class="row">
		<h1>Ce projet à été réalisé par l'équipe de WEBFORCEONE</h1>
		<h2>de la session 2 (du 04-04-2016 au 29-07-2016)</h2>
		<div class="col-md-3">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Ibrahima-THIELO.jpg')?>">
					</div>
					<div class="back">
						Nom: Ibrahima Thiello <br>
						<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_sen.png')?>"><br>
						linkedin: ibrahima-thiello <br>
						twitter: ibrah_thiello <br>
						@: ibrahima.thiello@hotmail.fr <br>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Michel-CAVRO.jpg')?>">
					</div>
					<div class="back">
						Nom: Michel Cavro <br>
						<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_fra.png')?>"><br>
						linkedin: michelcavro <br>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Paul-IOANID.jpg')?>">
					</div>
					<div class="back">
						Nom: Paul Ioanid <br>
						<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_rom.png')?>"><br>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Philippe-TASCH.jpg')?>">
					</div>
					<div class="back">
						Nom: Philippe Tasch <br>
						<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_lux.png')?>"><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->stop('main_content') ?>
