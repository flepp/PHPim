<?php $this->layout('layout', ['title' => 'About !']) ?>

<?php $this->start('main_content') ?>
	<h2>Ce projet à été réalisé par l'équipe de WEBFORCEONE de la session 2 (du 04-04-2016 au 29-07-2016).</h2>

<div>Ibrahima
<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Ibrahima-THIELO.jpg')?>">
nom: Ibrahima Thiello
linkedin:ibrahima-thiello
twitter:ibrah_thiello
@: ibrahima.thiello@hotmail.fr
<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_sen.png')?>"></div>

<div>Michel
<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/Michel-CAVRO.jpg') ?>">
nom: Michel Cavro
linkedin.com/in/michelcavro
<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_fra.png')?>"></div>

<div>Paul
<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/Paul-IOANID.jpg') ?>">
nom: Paul Ioanid
<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_rom.png')?>"></div>

<div>Philippe
<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/Philippe-TASCH.jpg') ?>">
nom: Philippe Tasch
<img height="38px" width="60px" src="<?=$this->assetUrl('upload/img/flag_lux.png')?>"></div>

<?php $this->stop('main_content') ?>
