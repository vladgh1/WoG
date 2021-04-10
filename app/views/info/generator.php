<?php global $ROOT; ?>

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

<body>

	<?php include '../public/src/components/loggedInHeader.php'; ?>

	<form action="#" method="get" class="center--container">
		<h1 class="generator-form-title font--alata">Generate now:</h1>
		<div id="generate" class="generator-form--container">
			
			<label for="Wtime" class="font--alata">Workout Time(min):</label>
			<input type="range" id="intensity" min=0 max=180 step=1 value="90" class="slider" id="timeRange">
			<!-- <p>P unde afisam timpul!!!</p> -->
			<label for="intensity" class="font--alata">Workout Intensity:</label>
			<input type="range" name="intensity" min=0 max=1000 step=1 value="500" class="slider" id="intensity">
			<input type="number" placeholder="Hours of workout(min)">	
		</div>

<button type="submit" class="a--btn green--btn">Submit</button>

		<!-- <div>
			<select>
				<option value="">Type of workout</option>
				<option value="fitness">Fitness</option>
				<option value="endurance">Endurance</option>
				<option value="legDay">Leg Day</option>
				<option value="chestDay">Chest Day</option>
				<option value="backDay">Back Day</option>
				<option value="legDay"></option>
				<option value="chestDay">Chest Day</option>
				<option value="backDay">Back Day</option>
			</select>
		</div> -->
		<div class="main-login-register--container">
			<a href="<?= $ROOT ?>/public/home/loggedIN" class="a--btn gray--btn">Back to the main page!!</a>
		</div>
	</form>

	<footer>
	</footer>
</body>

</html>