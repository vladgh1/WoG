<?php GLOBAL $ROOT?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator - Main Page</title>
	<link rel="stylesheet" href='<?=$ROOT?>/public/src/css/style.css'>
</head>
<body>
	<header>
		<section>
			<div class="logo--container">
				<a href="<?=$ROOT?>/public/home/index" class="logo-text">Workout Generator</a>
			</div>
			<div class="header-login-register--container">
				<a href="" id="register--btn">Register</a>
				<a href="" id="login--btn">Login</a>
			</div>
		</section>
	</header>

	<main class="landing-main--container workout-background-image">
		<div class="motivational-text--container">
			<h1 class="motivational-text">LOREM IPSUM DOLOR SIT AMET.</h1>
		</div>
		<div class="register-form--container">
			<form action="" method="get" class="register-form">
				<h3>Register now:</h3>
				<input type="text" placeholder="Username">
				<input type="email" placeholder="Email">
				<input type="password" placeholder="Password">
			</form>
			<div class="main-login-register--container">
				<button class="green--btn">Register</button>
				<button class="gray--btn">Or login instead</button>
			</div>
		</div>
	</main>

	<footer>
	</footer>
</body>
</html>