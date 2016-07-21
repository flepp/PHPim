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

<?php if (isset($_SESSION['errorFile'])): ?>
	<?php foreach ($_SESSION['errorFile'] as $error): ?>
		<p class="error-message" ><?= $error ?><span class="close">fermer</span></p>			
	<?php endforeach ?>
	<?php unset($_SESSION['errorFile']); ?>
<?php endif ?>
<?php if (isset($_SESSION['successFile'])): ?>
	<?php foreach ($_SESSION['successFile'] as $success): ?>
		<p class="success-message"><?= $success ?><span class="close">fermer</span></p>
	<?php endforeach ?>
	<?php unset($_SESSION['successFile']); ?>			
<?php endif ?>
<?php if (isset($_SESSION['success'])): ?>
	<?php foreach ($_SESSION['success'] as $error): ?>
		<p class="success-message" ><?= $error ?><span class="close">fermer</span></p>			
	<?php endforeach ?>
	<?php unset($_SESSION['success']); ?>
<?php endif ?>
<?php if (isset($_SESSION['errorUpdated'])): ?>
	<?php foreach ($_SESSION['errorUpdated'] as $error): ?>
		<p class="error-message"><?= $error ?><span class="close">fermer</span></p>			
	<?php endforeach ?>
	<?php unset($_SESSION['errorUpdated']); ?>
<?php endif ?>
<?php if (isset($_SESSION['errorCreation'])): ?>
	<?php foreach ($_SESSION['errorCreation'] as $error): ?>
		<p class="error-message"><?= $error ?><span class="close">fermer</span></p>			
	<?php endforeach ?>
	<?php unset($_SESSION['errorCreation']); ?>
<?php endif ?>
<?php if (isset($_SESSION['successCreation'])): ?>
	<?php foreach ($_SESSION['successCreation'] as $success): ?>
		<p class="success-message"><?= $success ?><span class="close">fermer</span></p>
	<?php endforeach ?>
	<?php unset($_SESSION['successCreation']); ?>			
<?php endif ?>

<?php if (isset($_SESSION['errorList2'])): ?>
	<?php foreach ($_SESSION['errorList2'] as $error): ?>
		<p class="error-message"><?= $error ?><span class="close">fermer</span></p>			
	<?php endforeach ?>
	<?php unset($_SESSION['errorList2']); ?>
<?php endif ?>
<?php if (isset($_SESSION['successList2'])): ?>
	<?php foreach ($_SESSION['successList2'] as $success): ?>
		<p class="success-message"><?= $success ?><span class="close">fermer</span></p>
	<?php endforeach ?>
	<?php unset($_SESSION['successList2']); ?>			
<?php endif ?>