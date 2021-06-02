<?php
session_start();
require 'dbconfig/config.php';
include 'includes/retrieve.php';
include 'includes/functions.php';
//include 'includes/logic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator</title>
	<link rel="stylesheet" href='<?= APPROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= APPROOT ?>/public/src/css/login.css'>
</head>

<body>
	<?php require APPROOT . '/views/includes/header.php'?>

	<form action="#" method="post" class="center--container set-login-form-width">
		<h3 class="login-text font--alata">Login now:</h3>
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<div class="login-buttons--container">
			<input type="submit" name="login" value="Log In" class="pointable">
			<a href="<?= $ROOT; ?>/public/info/register" class="a--btn gray--btn pointable">Or register instead</a>
		</div>
	</form>

	<?php
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$query = "select * from user WHERE username='$username' and password='$password'";
		$query_run = mysqli_query($con, $query);
		if (mysqli_num_rows($query_run) > 0) {
			$_SESSION['username'] = $username;
			$_SESSION['status'] = true;
			header("location:$ROOT/public/home/loggedIn");
		} else {
			echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
		}
	}
	?>
</body>

</html>