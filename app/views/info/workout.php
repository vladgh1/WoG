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
			<ul>
				<div class="profile-main--content" id="pending-list">
					<form method="post" action="<?= URLROOT ?>/public/users/workoutDone">
						<?php
						//var_dump($data);
						foreach ($data['pending'] as $pending) {
							echo '<li data-id="' . $pending->intensity . '">';
							echo '<input type="checkbox" name="' . $pending->name . '"value="' . $pending->points . '">';
							echo '<a href="' . URLROOT . '/public/users/exerciseDetails" id="register--btn">' . " $pending->name" . '</a>' . ' - ' . $pending->repetitions . 'x' . $pending->sessions;
							echo '</li>';
						}
						?>
						<button type="submit">↣</button>
						<form>
				</div>
			</ul>
		</div>

		<div class="profile-main-content--container">
			<h2 class="profile-main-content--header">Done</h2>
			<hr>
			<ul>
				<div class="profile-main--content" id="done-list">
					<!-- TODO: Get the list from database -->

					<?php
					foreach ($data['done'] as $done) {
						echo '<li>';
						echo $done->name . ' - ' . $done->repetitions . 'x' . $done->sessions;
						echo '</li>';
					}
					?>
				</div>
			</ul>
		</div>
	</section>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<a id="generate--btn" class="a--btn gray--btn" href="../users/generator">Generate a new program!</a>
</body>

</html>