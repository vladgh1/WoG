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
	<h2 class=" profile-main-content--container center--container profile-main-content--header">Current Workout</h2>
	<section class="profile-main--container center--container">

		<div class="profile-main-content--container">
			<h2 class="profile-main-content--header">Pending</h2>
			<hr>
			<ul class="profile-main--content" id="pending-list">
				<?php
				foreach ($data['pending'] as $pending) {
					echo '<li data-id="' . $pending->id . '">';
					echo '<input type="checkbox" name="' . $pending->name . '" value="' . $pending->points . '">';
					echo '<a href="' . URLROOT . '/public/users/exerciseDetails?id=' . $pending->workout . '">' . str_replace('_', " ", $pending->name) . '</a>' . ' - ' . $pending->sessions . 'x' . $pending->repetitions;
					echo '</li>';
				}
				?>
			</ul>
		</div>

		<button onclick="confirmWorkout()">↣</button>
		<div class="profile-main-content--container">
			<h2 class="profile-main-content--header">Done</h2>
			<hr>
			<ul class="profile-main--content" id="done-list">
				<?php
				foreach ($data['done'] as $done) {
					echo '<li>';
					echo '<a href="' . URLROOT . '/public/users/exerciseDetails?id=' . $done->workout . '">' . str_replace('_', " ", $done->name) . '</a>' . ' - ' . $done->sessions . 'x' . $done->repetitions;
					echo '</li>';
				}
				?>
			</ul>
		</div>
	</section>
</body>

</html>