<?php global $ROOT; ?>

<!DOCTYPE html>
<html lang="en" style=" background-color: #61889e;">

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

	<form action="" method="get" class="center--container set-login-form-width">
		<h3>Login now:</h3>
		<input type="text" placeholder="Username">
		<input type="password" placeholder="Password">
		<div class="main-login-register--container">
			<a href="<?= $ROOT; ?>/public/home/loggedIN" class="a--btn green--btn">Login</a>
			<a href="<?= $ROOT; ?>/public/info/register" class="a--btn gray--btn">Or register instead</a>
		</div>
	</form>

	<footer>
	</footer>
</body>

</html>