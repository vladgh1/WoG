<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - Statistics</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/statistics.css'>
	<script src="<?= URLROOT ?>/node_modules/chart.js/dist/chart.min.js"></script>
</head>
<body>
	<?php require_once APPROOT . '/views/includes/loggedInHeader.php'; ?>

	<div class="charts--container">
		<div class="chart--container">
			<canvas id="points-chart"></canvas>
		</div>
		<div class="chart--container">
			<canvas id="focus-chart"></canvas>
		</div>
		<div class="chart--container">
			<canvas id="intended-chart"></canvas>
		</div>
		<div class="chart--container">
			<canvas id="day-chart"></canvas>
		</div>
		<div class="chart--container">
			<canvas id="intensity-chart"></canvas>
		</div>
	</div>

	<div class="charts--container">
	<?php

		echo 'Your streak of consecutive days: '. $data['consecutiveDays']->NumInSequence;
		echo '<br>';
		echo 'Number of workouts per week: '. $data['nrWorkoutsPerWeek']->avgg;
		echo '<br>';
		echo 'Number of workouts per month: '. $data['nrWorkoutsPerMonth']->avgg;
	
	?>
	</div>
	
	<script src="<?= URLROOT ?>/public/src/scripts/statistics.js"></script>
</body>
</html>