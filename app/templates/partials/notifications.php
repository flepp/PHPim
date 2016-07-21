<?php if (isset($_SESSION['errorList'])): ?>
	<?php foreach ($_SESSION['errorList'] as $error): ?>
		<p class="error-message"><?= $error ?> <span class="close">fermer</span></p>
	<?php endforeach ?>
	<?php unset($_SESSION['errorList']); ?>
<?php endif ?>
<?php if (isset($_SESSION['successList'])): ?>
	<?php foreach ($_SESSION['successList'] as $success): ?>
		<p class="success-message"><?= $success ?><span class="close">fermer</span></p>
	<?php endforeach ?>
	<?php unset($_SESSION['successList']); ?>
<?php endif ?>