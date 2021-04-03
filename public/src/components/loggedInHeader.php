<?php global $ROOT; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator</title>
	<link rel="stylesheet" href='<?= $ROOT ?>/public/src/css/style.css'>
</head>

<body>
	<header>
		<section>
			<div class="logo--container">
				<a href="<?= $ROOT ?>/public/home/loggedIN" class="logo-text">Workout Generator</a>
			</div>
			<div class="header-login-register--container">
				<a href="../home/index" id="register--btn">Logout</a>
			</div>
		</section>
	</header>