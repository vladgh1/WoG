<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>404 - Kettlebell Not Found</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/errorPage.css'>
	<script src='<?= URLROOT ?>/public/src/scripts/pushup-game.js'></script>
</head>

<body>
	<?php require APPROOT . '/views/includes/header.php'?>
	<div class="error-code--container">
		<h1 id="error-code">404</h1>
		<p id="push-up-game-hint">space</p>
	</div>

	<div id="push-up-game">
		<div class="push-up-game-sprite" id="push-up-game-sprite-body" style="background: url('<?= URLROOT ?>/public/src/sprites/workout-min.png') 0 0;"></div>
        <div class="push-up-game-sprite" id="push-up-game-sprite-hands" style="background: url('<?= URLROOT ?>/public/src/sprites/workout-min.png') 0 8px;"></div>
	</div>
</body>

</html>
