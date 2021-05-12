	<?php global $ROOT; ?>
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
		<link rel="stylesheet" href='<?= $ROOT; ?>/public/src/css/style.css'>
		<link rel="stylesheet" href='<?= $ROOT; ?>/public/src/css/register.css'>
	</head>

	<body>
		<?php include '../public/src/components/header.php'; ?>

		<form method="post" action="register" class="center--container set-register-form-width">
			<h3 class="register-text font--alata">Register now:</h3>
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
				<select>
					<option value="Not yet confirmed..." style="display: none;">--Choose a gender--</option>
					<option value="Attack Helicopter">Attack Helicopter</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Bruh....">Other</option>
				</select>
			</div>

			<div class="register-form-block">
				<input type="number" name="height" placeholder="Height">
				<select>
					<option value="cm">CM</option>
					<option value="feet/inches">Feet/Inches</option>
				</select>
			</div>

			<div class="register-form-block">
				<input type="number" name="weight" placeholder="Weight">
				<select>
					<option value="kg">Kg</option>
					<option value="pounds">Pounds</option>
				</select>
			</div>
			<div class="main-login-register--container">
				<input type="submit" name="submit_btn" value="Sign Up">
				<!-- <a href="<?= $ROOT; ?>/public/home/loggedIN" class="a--btn green--btn">Register</a>
				<a href="<?= $ROOT; ?>/public/info/login" class="a--btn gray--btn">Or login instead</a> -->
			</div>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				// echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
				$username= $_POST['username'];
				$email= $_POST['email'];
				$password= $_POST['password'];
				$cpassword= $_POST['cpassword'];
				$age= $_POST['age'];
				$height= $_POST['height'];
				$weight = $_POST['weight'];

				if($password==$cpassword)
				{
					$query="select * from user where username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
						}
						else
						{
							$query="insert into user values('$username','$email','$password','$age','$height','$weight')";
							$query_run = mysqli_query($con,$query);

							if($query_run)
							{
								echo '<script type="text/javascript"> alert("User registered") </script>';
							}
							else
							{
								echo '<script type="text/javascript"> alert("Error!") </script>';

							}
						}
				}
				else
				{
					echo '<script type="text/javascript"> alert("Passwords do not match") </script>';
				}
			}
		?>

		<footer>
		</footer>
	</body>

	</html>