<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - generator</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/generator.css'>
<body>

	<?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>

	<form action="<?= URLROOT ?>/public/users/generate" method="post" id="generator--form" class="center--container">
		<h1 id="generator-form-title" class="font--alata">Generate now:</h1>
		<div id="generate" id="generator-form--container">
			<div id="workout-time--container">
				<label for="Wtime" class="font--alata">Workout Time(min):</label>
				<div id="workout-time-slider--container">
					<input type="range" class="range--input" name="time" min=15 max=120 step=5 value="30" class="slider" id="workout-time"></input>
					<p id="workout-minutes-content">30 min</p>
				</div>
			</div>
			
			<div id="workout-intensity--container">
				<label for="intensity" class="font--alata">Workout Intensity:</label>
				<input type="range" class="range--input" name="intensity" min=1 max=5 step=1 value="3" class="slider" id="workout-intensity">
				<p id="workout-intensity-content">Medium workout</p>
			</div>
			<div id="generator-selectors-block--container">
				<!-- <label for="location" class="font--alata">Location</label>
				
				<select id="location" name="location">
					<option value="Home">Home</option>
					<option value="Gym">Gym</option>
				</select> -->
				<label for="intended" class="font--alata">Intended for</label>
				<select id="intended" name="intended">
					<option value="None" style="display: none;">--Not Selected--</option>
					<option value="Flexibility">Flexibility</option>
					<option value="Strength">Strength</option>
					<option value="Speed">Speed</option>
					<option value="Mobility">Mobility</option>
					<option value="Cardio">Cardio</option>
				</select>
				<label for="Pfocus" class="font--alata">Primary Focus </label>
				<select id="Pfocus" name="Pfocus">
					<option value="None" style="display: none;">--Not Selected--</option>
					<option value="Arms">Arms</option>
					<option value="Legs">Legs</option>
					<option value="Chest">Chest</option>
					<option value="Abdomen">Abdomen</option>
					<option value="UpperBack">UpperBack</option>
					<option value="LowerBack">LowerBack</option>
				</select>
				<label for="Sfocus" class="font--alata">Secondary Focus</label>
				<select id="Sfocus" name="Sfocus">
					<option value="None" style="display: none;">--Not Selected--</option>
					<option value="Arms">Arms</option>
					<option value="Legs">Legs</option>
					<option value="Chest">Chest</option>
					<option value="Abdomen">Abdomen</option>
					<option value="UpperBack">UpperBack</option>
					<option value="LowerBack">LowerBack</option>
				</select>
			</div>
			<!-- <a href=""><img src="\WoG\app\Img\Ramat.jpg"></a> -->
		</div>
		
		<button type="submit" name="generate" class="a--btn green--btn pointable" id="generator-submit--btn">Submit</button>
	</form>	

	<script src='<?= URLROOT ?>/public/src/scripts/generator.js'></script></head>
</body>
</html>