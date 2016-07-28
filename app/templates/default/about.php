
<?php $this->layout('layout', ['title' => 'About !']) ?>
<?php $this->start('main_content') ?>

<div class="container fondCoul photoAbout">
	<h1 class="h1">L'équipe</h1>
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 divPhoto">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img src="<?=$this->assetUrl('img/Ibrahima-THIELO.jpg')?>">
						<h1>Ibrahima</h1>
					</div>
					<div class="container back">
						<div class="col-md-12">
							Nom: Ibrahima Thiello
						</div>
						<div class="col-md-12">
							<img height="38px" width="60px" src="<?=$this->assetUrl('img/flag_sen.png')?>">
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
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 divPhoto">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img  src="<?=$this->assetUrl('img/Michel-CAVRO.jpg')?>">
						<h1>Michel</h1>
					</div>
					<div class="container back">
						<div class="col-md-12">
							Nom: Michel Cavro
						</div>
						<div class="col-md-12">
						<img height="38px" width="60px" src="<?=$this->assetUrl('img/flag_fra.png')?>">
						</div>
						<div class="col-md-12">
						linkedin: michelcavro
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 divPhoto">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img  src="<?=$this->assetUrl('img/Paul-IOANID.jpg')?>">
						<h1>Paul</h1>
					</div>
					<div class="container back">
						<div class="col-md-12">
						Nom: Paul Ioanid
						</div>
						<div class="col-md-12">
						<img height="38px" width="60px" src="<?=$this->assetUrl('img/flag_rom.png')?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 divPhoto">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="Philippe">
					<div class="front">
						<img src="<?=$this->assetUrl('img/Philippe-TASCH.jpg')?>">
						<h1>Flipper</h1>
					</div>
					<div class="container back">
						<div class="col-md-12">
						Nom: Philippe Tasch
						</div>
						<div class="col-md-12">
						<img height="38px" width="60px" src="<?=$this->assetUrl('img/flag_lux.png')?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->stop('main_content') ?>
