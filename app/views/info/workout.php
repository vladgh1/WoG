<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - Workout</title>
	<link rel="stylesheet" href="<?= URLROOT ?>/public/src/css/style.css">
	<link rel="stylesheet" href="<?= URLROOT ?>/public/src/css/header.css">
	<link rel="stylesheet" href="<?= URLROOT ?>/public/src/css/workout.css">
	<script src="<?= URLROOT ?>/public/src/scripts/confirm-workout.js"></script>
</head>

<body>
	<?php require_once APPROOT . '/views/includes/loggedInHeader.php' ?>
	<section class="workout--container center--container">
		<h2 class="header--container">Current Workout</h2>

		<div class="workout-main--container">
			<div class="workout-main-content--container">
				<h2 class="workout-main-content--header">Pending</h2>
				<hr>
				<ul class="workout-main--content" id="pending-list">
				<?php
				foreach ($data['pending'] as $pending) {
					echo '<li data-id="' . $pending->id . '">';
					echo '<input type="checkbox" name="' . $pending->name . '" value="' . $pending->points . '">';
					echo '<a href="' . URLROOT . '/public/users/exerciseDetails?id=' . $pending->workout . '" class="register--btn">'.str_replace('_'," ",$pending->name).'</a>' . ' - ' . $pending->sessions . 'x' . $pending->repetitions;
					echo '</li>';
				}
				?>
				</ul>
			</div>
						
			<button class="workout--button" onclick="confirmWorkout()">↣</button>

			<div class="workout-main-content--container">
				<h2 class="workout-main-content--header">Done</h2>
				<hr>
				<ul class="workout-main--content" id="done-list">
					<?php
					foreach ($data['done'] as $done) {
						echo '<li>';
						echo '<a href="' . URLROOT . '/public/users/exerciseDetails?id='.$done->workout.'" class="register--btn">'.str_replace('_'," ",$done->name).'</a>' . ' - ' . $done->sessions . 'x' . $done->repetitions;
						echo '</li>';
					}
					?>
				</ul>
			</div>
		</div>
	</section>
</body>

</html>