<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - generated results</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href="<?= URLROOT ?>/public/src/css/generatorResults.css">
	<script src="<?= URLROOT ?>/public/src/scripts/confirm-workout.js"></script>
</head>

<body>

	<?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>
	
	<!-- <form method="post" action="<?= URLROOT ?>/public/users/workoutDone" class="result-exercises--container"> -->
		<?php
		foreach (['primary', 'secondary'] as $type) {
			foreach ($data[$type] as $exercise) {
				echo '<section class="exercise--container">';
				echo '<div class="exersise-checkbox--container">';
				echo '</div>';
				echo '<a class="image--container" href="' . $exercise->link . '"><img alt="Workout exercise" class="exercise-image" src="' . URLROOT . '/app/Img/' . $exercise->photo . '"></a>';
				echo '<div class="text--container">';
					echo '<h2>' . $exercise->name;
						echo '<input type="checkbox"'
						. ' data-id="' . $exercise->id . '"'
						. ' data-intensity="' . $exercise->intensity . '"'
						. ' data-time="' . $data['time'] . '"'
						. 'class="exercise--checkbox" name="'. $exercise->name .'" value="'.$exercise->points.'" onclick="totalIt()">';
					echo '</h2>';
					echo '<p><b>Focus:</b> ' . $exercise->focus . '</p>';
					echo '<p><b>Intended:</b> ' . $exercise->intended . '</p>';
					echo '<p><b>Description:</b> ' . $exercise->description . '</p>';
				echo '</div>';
				echo '<iframe src="' . $exercise->link . '" width="350" height="200" title="YouTube video player"  allowfullscreen></iframe>';
				echo '</section>';
			}
		}?>

		<div>
			<input value="0 points" readonly="readonly" type="text" name="total" />
			<input type="submit" name="submit_btn" value="Finish" onclick="submitWorkout()">
		</div>
	<!-- </form> -->
	<script src='<?= URLROOT ?>/public/src/scripts/generator-results.js'></script>
</body>

</html>