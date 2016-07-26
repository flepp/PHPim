
		<?php $this->layout('layout', ['title' => 'About !']) ?>
		<?php $this->start('main_content') ?>
			<h2>Ce projet à été réalisé par l'équipe de WEBFORCEONE de la session 2 (du 04-04-2016 au 29-07-2016).</h2>

		<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
			<div class="flipper">
				<div class="front">
					<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Ibrahima-THIELO.jpg')?>">
				</div>
				<div class="back">
					nom: Ibrahima Thiello <br>
					linkedin:ibrahima-thiello <br>
					twitter:ibrah_thiello <br>
					@: ibrahima.thiello@hotmail.fr <br>
					<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_sen.png')?>">
				</div>
			</div>
		</div>
		<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
			<div class="flipper">
				<div class="front">
					<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Michel-CAVRO.jpg')?>">
				</div>
				<div class="back">
					nom: Michel Cavro <br>
					linkedin.com/in/michelcavro <br>
					<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_fra.png')?>">
				</div>
			</div>
		</div>
		<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
			<div class="flipper">
				<div class="front">
					<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Paul-IOANID.jpg')?>">
				</div>
				<div class="back">
					nom: Paul Ioanid <br>
					<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_rom.png')?>">
				</div>
			</div>
		</div>
		<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
			<div class="flipper">
				<div class="front">
					<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Philippe-TASCH.jpg')?>">
				</div>
				<div class="back">
					nom: Philippe Tasch <br>
					<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_lux.png')?>">
				</div>
			</div>
		</div>

		<?php $this->stop('main_content') ?>
