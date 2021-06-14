<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - Register page</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/register.css'>
</head>

<body>
	<div class="form-wrapper">

		<?php require APPROOT . '/views/includes/header.php' ?>

		<form method="post" action="<?= URLROOT ?>/public/users/register" class="set-register-form-width register--form">
			<h3 class="register-text font--alata">Register now:</h3>
			<div class="register-form-block">
				<input type="text" class="<?= (isset($data['fullnameError']) && strlen($data['fullnameError']) == 0) ? '' : 'error--input' ?>" name="fullname" placeholder="<?= (isset($data['fullnameError']) && strlen($data['fullnameError']) == 0) ? 'Full name' : $data['fullnameError']; ?>" value="<?= (isset($data['fullnameError']) && strlen($data['fullnameError']) == 0 && isset($data['fullname']) && strlen($data['fullname'])) ? $data['fullname'] : null ?>" required>
			</div>
			<div class="register-form-block">
				<input type="text" class="<?= (isset($data['usernameError']) && strlen($data['usernameError']) == 0) ? '' : 'error--input' ?>" name="username" placeholder="<?= (isset($data['usernameError']) && strlen($data['usernameError']) == 0) ? 'Username' : $data['usernameError']; ?>" value="<?= (isset($data['usernameError']) && strlen($data['usernameError']) == 0 && isset($data['username']) && strlen($data['username'])) ? $data['username'] : null ?>" required>
			</div>

			<div class="register-form-block">
				<input type="email" class="<?= (isset($data['emailError']) && strlen($data['emailError']) == 0) ? '' : 'error--input' ?>" name="email" placeholder="<?= (isset($data['emailError']) && strlen($data['emailError']) == 0) ? 'E-mail' : $data['emailError']; ?>" value="<?= (isset($data['emailError']) && strlen($data['emailError']) == 0 && isset($data['email']) && strlen($data['email'])) ? $data['email'] : null ?>" required>
			</div>

			<div class="register-form-block">
				<input type="password" class="<?= (isset($data['passwordError']) && strlen($data['passwordError']) == 0) ? '' : 'error--input' ?>" name="password" placeholder="<?= (isset($data['passwordError']) && strlen($data['passwordError']) == 0) ? 'Password' : $data['passwordError']; ?>" value="<?= (isset($data['passwordError']) && strlen($data['passwordError']) == 0 && isset($data['password']) && strlen($data['password'])) ? $data['password'] : null ?>" required>
			</div>

			<div class="register-form-block">
				<input type="password" class="<?= (isset($data['confirmPasswordError']) && strlen($data['confirmPasswordError']) == 0) ? '' : 'error--input' ?>" name="cpassword" placeholder="<?= (isset($data['confirmPasswordError']) && strlen($data['confirmPasswordError']) == 0) ? 'Confirm Password' : $data['confirmPasswordError']; ?>" value="<?= (isset($data['confirmPasswordError']) && strlen($data['confirmPasswordError']) == 0 && isset($data['confirmPassword']) && strlen($data['confirmPassword'])) ? $data['confirmPassword'] : null ?>" required>
			</div>

			<div class="register-form-block">
				<input type="number" class="<?= (isset($data['ageError']) && strlen($data['ageError']) == 0) ? '' : 'error--input' ?>" name="age" placeholder="<?= (isset($data['ageError']) && strlen($data['ageError']) == 0) ? 'Age' : $data['ageError']; ?>" value="<?= (isset($data['ageError']) && strlen($data['ageError']) == 0 && isset($data['age']) && strlen($data['age'])) ? $data['age'] : null ?>">
				<select name="gender" class="<?= (isset($data['genderError']) && strlen($data['genderError']) == 0) ? '' : 'error--input' ?>" value="<?= (isset($data['genderError']) && strlen($data['genderError']) == 0 && isset($data['gender']) && strlen($data['gender'])) ? $data['gender'] : null ?>" required>
					<option value="" style="display: none;">Choose a gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>

			<div class="register-form-block">
				<input type="number" class="<?= (isset($data['heightError']) && strlen($data['heightError']) == 0) ? '' : 'error--input' ?>" name="height" placeholder="<?= (isset($data['heightError']) && strlen($data['heightError']) == 0) ? 'Height' : $data['heightError']; ?>" value="<?= (isset($data['heightError']) && strlen($data['heightError']) == 0 && isset($data['height']) && strlen($data['height'])) ? $data['height'] : null ?>">
				<select name="typeheight" required>
					<option value="cm">CM</option>
					<option value="feet">Feet & Inches</option>
				</select>
			</div>

			<div class="register-form-block">
				<input type="number" class="<?= (isset($data['weightError']) && strlen($data['weightError']) == 0) ? '' : 'error--input' ?>" name="weight" placeholder="<?= (isset($data['weightError']) && strlen($data['weightError']) == 0) ? 'Weight' : $data['weightError']; ?>" value="<?= (isset($data['weightError']) && strlen($data['weightError']) == 0 && isset($data['weight']) && strlen($data['weight'])) ? $data['weight'] : null ?>">
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

	</div>
</body>

</html>
