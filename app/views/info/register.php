<?php
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/register.css'>
</head>

<body>
	<?php require APPROOT . '/views/includes/header.php'?>

	<form method="post" action="<?= URLROOT ?>/public/users/register" class="center--container set-register-form-width register--form">
		<h3 class="register-text font--alata">Register now:</h3>
		<div class="register-form-block">
			<input type="text" name="fullname" placeholder="Full Name" required>
		</div>
		<div class="register-form-block">
			<input type="text" name="username" placeholder="Username" required>
		</div>

		<div class="register-form-block">
			<input type="email" name="email" placeholder="Email" required>
		</div>

		<div class="register-form-block">
			<input type="password" name="password" placeholder="Password" required>
		</div>

		<div class="register-form-block">
			<input type="password" name="cpassword" placeholder="Confirm Password" required>
		</div>

		<div class="register-form-block">
			<input type="number" name="age" placeholder="Age">
			<select name="gender" required>
				<option value="" style="display: none;">Choose a gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>

		<div class="register-form-block">
			<input type="number" name="height" placeholder="Height">
			<select name="typeheight" required>
				<option value="cm">CM</option>
				<option value="feet">Feet & Inches</option>
			</select>
		</div>

		<div class="register-form-block">
			<input type="number" name="weight" placeholder="Weight">
			<select name="typeweight" required>
				<option value="kg">Kg</option>
				<option value="lb">Pounds</option>
			</select>
		</div>
		<div class="main-login-register--container">
			<input type="submit" name="submit_btn" value="Sign Up">
			<!-- <a href="<?= URLROOT ?>/public/home/loggedIN" class="a--btn green--btn">Register</a>
			<a href="<?= URLROOT ?>/public/info/login" class="a--btn gray--btn">Or login instead</a> -->
		</div>
	</form>
</body>

</html>