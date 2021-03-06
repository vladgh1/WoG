<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - leaderboard</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/leaderboard.css'>

</head>

<body>
	<?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>
	<main class="leaderboard--container">
		<h2>Leaderboard <a href="<?= URLROOT ?>/public/users/leaderboardRSS"><img src="<?= URLROOT ?>/public/src/images/rss.png" alt="rss" height="20"></a></h2>
		<section class="leaderboards-table--container">
			<div class="leaderboard-table--container">
				<h3>Last month</h3>
				<p>My rank: <?= $data['self']['month'] ?></p>
				<table class="leaderboard-table">
					<tr>
						<td>Rank</td>
						<td>User</td>
						<td>Score</td>
					</tr>
					<?php
					//var_dump($data);
					$rank = 1;
					foreach ($data['month'] as $user => $points) {
						$class = "";
						if ($user == $_COOKIE['username']) {
							$class = ' class="leaderboard-selected-user"';
							$myrank = $rank;
						}
						echo "<tr>";
						echo "<td" . $class . ">" . $rank++ . "</td>";
						echo "<td" . $class . ">" . $user . "</td>";
						echo "<td" . $class . ">" . $points . "</td>";
						echo "</tr>";
					}
					?>
				</table>
				<div class="generate-buttons--container">
					<form method="post" action="<?= URLROOT ?>/public/users/generateJSON">
						<button type="submit">Generate JSON</button>
					</form>
					<form method="post" action="<?= URLROOT ?>/public/users/generatePDF">
						<button type="submit">Generate PDF</button>
					</form>
				</div>
			</div>

			<div class="leaderboard-table--container">
				<h3>Last year</h3>
				<p>My rank:  <?= $data['self']['year'] ?></p>
				<table class="leaderboard-table">
					<tr>
						<td>Rank</td>
						<td>User</td>
						<td>Score</td>
					</tr>
					<?php

					$rank = 1;
					foreach ($data['year'] as $user => $points) {
						$class = "";
						if ($user == $_COOKIE['username']) {
							$class = ' class="leaderboard-selected-user"';
							$myrank = $rank;
						}
						echo "<tr>";
						echo "<td" . $class . ">" . $rank++ . "</td>";
						echo "<td" . $class . ">" . $user . "</td>";
						echo "<td" . $class . ">" . $points . "</td>";
						echo "</tr>";
					}
					?>
				</table>

				<div class="generate-buttons--container">
					<form method="post" action="<?= URLROOT ?>/public/users/generateJSON">
						<button type="submit">Generate JSON</button>
					</form>
					<form method="post" action="<?= URLROOT ?>/public/users/generatePDF">
						<button type="submit">Generate PDF</button>
					</form>
				</div>
			</div>

			<div class="leaderboard-table--container">
				<h3>All the time</h3>
				<p>My rank:  <?= $data['self']['all'] ?></p>
				<table class="leaderboard-table">
					<tr>
						<td>Rank</td>
						<td>User</td>
						<td>Score</td>
					</tr>
					<?php

					$rank = 1;
					foreach ($data['all'] as $user => $points) {
						$class = "";
						if ($user == $_COOKIE['username']) {
							$class = ' class="leaderboard-selected-user"';
							$myrank = $rank;
						}
						echo "<tr>";
						echo "<td" . $class . ">" . $rank++ . "</td>";
						echo "<td" . $class . ">" . $user . "</td>";
						echo "<td" . $class . ">" . $points . "</td>";
						echo "</tr>";
					}
					?>
				</table>

				<div class="generate-buttons--container">
					<form method="post" action="<?= URLROOT ?>/public/users/generateJSON">
						<button type="submit">Generate JSON</button>
					</form>
					<form method="post" action="<?= URLROOT ?>/public/users/generatePDF">
						<button type="submit">Generate PDF</button>
					</form>
				</div>
			</div>
		</section>
	</main>
</body>

</html>