<?php global $ROOT; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator</title>
	<link rel="stylesheet" href='<?= $ROOT; ?>/public/src/css/style.css'>
</head>

<body>

	<?php include '../public/src/components/header.php'; ?>

	<main class="landing-main--container workout-background-image">
		<div class="motivational-text--container">
			<h1 class="motivational-text">Just Do It!</h1>
		</div>
		<div class="register-form--container ">
			<form action="" method="get" class="register-form ">
				<h3>Register now:</h3>
				<input type="text" placeholder="Username">
				<input type="email" placeholder="Email">
				<input type="password" placeholder="Password">
				<div class="main-login-register--container">
					<a href="<?= $ROOT; ?>/public/info/register" class="a--btn green--btn">Register</a>
					<a href="<?= $ROOT; ?>/public/info/login" class="a--btn gray--btn side-btn">Or login instead</a>
				</div>
			</form>
		</div>
	</main>

	<footer>
	</footer>
</body>

</html>