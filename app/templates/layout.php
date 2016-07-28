<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Condensed" rel="stylesheet">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-theme.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">
	<!-- CSS personnel -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/michel.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/paul.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/ibrahima.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/philippe.css') ?>">
	<!-- Pour info: le script doit rester ici SVP -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<?php $this->insert('partials/navigation') ?>
	<main>
		<div class="container">
			<?php $this->insert('partials/notifications') ?>
		</div>
		<?= $this->section('main_content') ?>
	</main>
	<?php $this->insert('partials/footer') ?>
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>
	</body>
</html>