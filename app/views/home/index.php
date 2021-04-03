<?php
include '../public/src/components/header.php'
?>

<main class="landing-main--container workout-background-image">
	<div class="motivational-text--container">
		<h1 class="motivational-text">LOREM IPSUM DOLOR SIT AMET.</h1>
	</div>
	<div class="register-form--container">
		<form action="" method="get" class="register-form">
			<h3>Register now:</h3>
			<input type="text" placeholder="Username">
			<input type="email" placeholder="Email">
			<input type="password" placeholder="Password">
			<div class="main-login-register--container">
			<a href="<?=$ROOT?>/public/info/Register" class="a--btn green--btn">Register</a>
        <a href="<?=$ROOT?>/public/info/Login" class="a--btn gray--btn">Or login instead</a>
			</div>
		</form>
	</div>
</main>

<footer>
</footer>
</body>

</html>