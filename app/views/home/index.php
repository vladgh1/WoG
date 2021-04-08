<?php global $ROOT; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator</title>
	<link rel="stylesheet" href='<?= $ROOT ?>/public/src/css/style.css'>
</head>

<body>

	<?php include '../public/src/components/header.php'; ?>
	<main class="landing-main--container workout-background-image" style="<?php
	$image = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));
	echo 'background-image: linear-gradient(to left, rgba(162, 74, 54, 0.87), #a24a3654), url(' . $image->image . ');'?>">
		<div class="motivational-text--container">
			<h1 class="motivational-text"><?php
				$text = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));	
				echo $text->text;
			?></h1>
		</div>
		<!-- <div class="register-form--container ">
			<form action="" method="get" class="register-form ">
				<h3>Register now:</h3>
				<input type="text" name="nume" placeholder="Username">
				<input type="email" name="email" placeholder="Email">
				<input type="password" name="pass" placeholder="Password">
				<div class="main-login-register--container">
					<a href="<?= $ROOT; ?>/public/info/register" target="register" type="submit" class="a--btn green--btn">Register</a>
					<a href="<?= $ROOT; ?>/public/info/login" class="a--btn gray--btn side-btn">Or login instead</a>
				</div>
			</form>
		</div> -->
	</main>

	<footer>
	</footer>
</body>

</html>