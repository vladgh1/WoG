<?php GLOBAL $ROOT;?>
<?php
include '../public/src/components/header.php'
?>
<?php
// include 'C:\Users\Alexa\Desktop\TW 2021\git clone\WoG\public\src\components\header.php'
?>

    <form action="" method="get" class="center--container">
				<h3>Register now:</h3>
				<input type="text" placeholder="Username">
				<input type="email" placeholder="Email">
				<input type="password" placeholder="Password">
                <input type="password" placeholder="Confirm Password">
                <input type="number" placeholder="Age">
                <select default>
                    <option value="Not yet confirmed...">--Please choose a gender role--</option>
                    <option value="Attack Helicopter">Attack Helicopter</option>
                    <option value="Male">Male</option>
                    <option value="Femele">Femele</option>
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
					<button type="submit" class="green--btn">Register</button>
					<button class="gray--btn">Or login instead</button>
				</div>
			</form>

	<!-- <main class="landing-main--container workout-background-image">
		<div class="motivational-text--container">
			<h1 class="motivational-text">LOREM IPSUM DOLOR SIT AMET.</h1>
		</div>
		<div class="register-form--container">
			
		</div>
	</main> -->

	<footer>
	</footer>
</body>
</html>