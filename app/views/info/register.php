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

	<form action="" method="get" class="center--container set-register-form-width">
		<h3>Register now:</h3>
		<input type="text" name="nume" placeholder="Username">
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="pass" placeholder="Password">
		<input type="password" placeholder="Confirm Password">
		<input type="number" placeholder="Age">
		<select default>
			<option value="Not yet confirmed..." style="display: none;">--Choose a gender--</option>
			<option value="Attack Helicopter">Attack Helicopter</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			<option value="Bruh....">Other</option>
		</select>

		<div>
			<input type="number" placeholder="Height">
			<select>
				<option value="cm">CM</option>
				<option value="feet/inches">Feet/Inches</option>
			</select>
		</div>

		<div>
			<input type="number" placeholder="Weight">
			<select>
				<option value="kg">Kg</option>
				<option value="pounds">Pounds</option>
			</select>
		</div>
		<div class="main-login-register--container">
			<a href="<?= $ROOT; ?>/public/home/loggedIN" class="a--btn green--btn">Register</a>
			<a href="<?= $ROOT; ?>/public/info/login" class="a--btn gray--btn">Or login instead</a>
		</div>
	</form>
	<footer>
	</footer>
</body>

</html>