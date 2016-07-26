
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
					<div class="container back">
						<div class="col-md-12">
							Nom: Ibrahima Thiello
						</div>
						<div class="col-md-12">
							<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_sen.png')?>">
						</div>
						<div class="col-md-12">
							linkedin:<a href="https://www.linkedin.com/in/ibrahima-thiello"> ibrahima-thiello </a>
						</div>
						<div class="col-md-12">
							twitter: <a href="https://twitter.com/ibrah_thiello">ibrah_thiello </a>
						</div>
						<div class="col-md-12">
							@:<a href="mailto:ibrahima.thiello@hotmail.fr"> ibrahima.thiello@hotmail.fr </a>
						</div>
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
					<div class="container back">
						<div class="col-md-12">
							Nom: Michel Cavro
						</div>
						<div class="col-md-12">
						<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_fra.png')?>">
						</div>
						<div class="col-md-12">
						linkedin: michelcavro
						</div>
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
					<div class="container back">
						<div class="col-md-12">
						Nom: Paul Ioanid
						</div>
						<div class="col-md-12">
						<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_rom.png')?>">
						</div>
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
					<div class="container back">
						<div class="col-md-12">
						Nom: Philippe Tasch
						</div>
						<div class="col-md-12">
						<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_lux.png')?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->stop('main_content') ?>
