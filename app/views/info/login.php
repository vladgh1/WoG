<?php global $ROOT; ?>
<?php
	session_start();
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
	<link rel="stylesheet" href='<?= $ROOT ?>/public/src/css/style.css'>
</head>
<?php include '../public/src/components/header.php'; ?>
<body>

	

	<form action="#" method="post" class="center--container set-login-form-width">
		<h3 class="font--alata">Login now:</h3>
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<div class="main-login-register--container">
			<input type="submit" name="login" value="Log In">
			<!-- <a href="<?= $ROOT; ?>/public/home/loggedIN" class="a--btn green--btn">Login</a> -->
			<a href="<?= $ROOT; ?>/public/info/register" class="a--btn gray--btn">Or register instead</a> 
		</div>
	</form>
	<?php
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="select * from user WHERE username='$username' and password='$password'";
		$query_run=mysqli_query($con,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			$_SESSION['username']=$username;
			header("location:$ROOT/public/home/loggedIn");
		}
		else
		{
			echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
		}
	}
	?>
</body>

</html>