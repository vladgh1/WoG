<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - Login page</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/login.css'>
</head>

<body>
	<?php require APPROOT . '/views/includes/header.php'?>

	<form action="<?= URLROOT ?>/public/users/login" method="post" class="center--container set-login-form-width">
		<h3 class="login-text font--alata">Login now:</h3>
		<input type="text" class="<?=(isset($data['usernameError']) && strlen($data['usernameError']) == 0) ? '' : 'error--input'?>" name="username"
			placeholder="<?=(isset($data['usernameError']) && strlen($data['usernameError']) == 0) ? 'Username' : $data['usernameError'];?>"
			value="<?=(isset($data['usernameError']) && strlen($data['usernameError']) == 0 && isset($data['username']) && strlen($data['username'])) ? $data['username'] : null?>" required>
		<input type="password" class="<?=(isset($data['passwordError']) && strlen($data['passwordError']) == 0) ? '' : 'error--input'?>" name="password"
			placeholder="<?=(isset($data['passwordError']) && strlen($data['passwordError']) == 0) ? 'Password' : $data['passwordError'];?>"
			value="<?=(isset($data['passwordError']) && strlen($data['passwordError']) == 0 && isset($data['password']) && strlen($data['password'])) ? $data['password'] : null?>" required>
		<div class="login-buttons--container">
			<input type="submit" name="login" value="Log In" class="pointable">
			<a href="<?= URLROOT ?>/public/users/register" class="a--btn gray--btn pointable">Or register instead</a>
		</div>
	</form>
</body>

</html>