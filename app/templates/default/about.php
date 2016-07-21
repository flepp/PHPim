<?php $this->layout('layout', ['title' => 'About !']) ?>

<?php $this->start('main_content') ?>
	<h2>Ce projet à été réalisé par l'équipe de WEBFORCEONE de la session 2 (du 04-04-2016 au 29-07-2016).</h2>

<div>Ibrahima
<img height="297px" width="250px" src="<?=$this->assetUrl('upload/img/Ibrahima-THIELO.jpg')?>">
nom: Ibrahima Thiello
SENEGAL</div>

<div>Michel
<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/Michel-CAVRO.jpg') ?>">
nom: Michel Cavro
FRANCE</div>

<div>Paul
<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/Paul-IOANID.jpg') ?>">
nom: Paul Ioanid
ROUMANIE</div>

<div>Philippe
<img height="297px" width="250px" src="<?= $this->assetUrl('upload/img/Philippe-TASCH.jpg') ?>">
nom: Philippe Tasch
LUXEMBOURG</div>

<?php $this->stop('main_content') ?>
