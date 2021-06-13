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
		<h2>Leaderboard</h2>
		<section class="leaderboards-table--container">
			<div class="leaderboard-table--container">
				<h3>Last month</h3>
				<table class="leaderboard-table">
					<tr>
						<td>Rank</td>
						<td>User</td>
						<td>Score</td>
					</tr>
					<?php
					//var_dump($data);
					$rank = 1;
					foreach ($data as $user => $points) {
						if ($user == $_COOKIE['username']) {
							echo "<tr>";
							echo '<td  style="color:blue;">' . $rank++ . "</td>";
							echo '<td  style="color:blue;">' . $user . "</td>";
							echo '<td  style="color:blue;">' . $points . "</td>";
							echo "</tr>";
							$myrank = $rank-1;
						} else {
							echo "<tr>";
							echo "<td>" . $rank++ . "</td>";
							echo "<td>" . $user . "</td>";
							echo "<td>" . $points . "</td>";
							echo "</tr>";
						}
					}
					echo 'My rank: '. $myrank;
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
				<table class="leaderboard-table">
					<tr>
						<td>Rank</td>
						<td>User</td>
						<td>Score</td>
					</tr>
					<?php

					$rank = 1;
					foreach ($data as $user => $points) {
						echo "<tr>";
						echo "<td>" . $rank++ . "</td>";
						echo "<td>" . $user . "</td>";
						echo "<td>" . $points . "</td>";
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
				<table class="leaderboard-table">
					<tr>
						<td>Rank</td>
						<td>User</td>
						<td>Score</td>
					</tr>
					<?php

					$rank = 1;
					foreach ($data as $user => $points) {
						echo "<tr>";
						echo "<td>" . $rank++ . "</td>";
						echo "<td>" . $user . "</td>";
						echo "<td>" . $points . "</td>";
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