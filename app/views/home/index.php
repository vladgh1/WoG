<?php global $ROOT; ?>
<?php
	$con = mysqli_connect("localhost","root","12345") or die("Unable to connect");
	mysqli_select_db($con,"logindb");
?>
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

	<?php include '../public/src/components/header.php'; ?>
	<main class="landing-main--container workout-background-image" style="<?php
	$image = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));
	echo 'background-image: linear-gradient(to left, rgba(162, 74, 54, 0.87), #a24a3654), url(' . $image->image . ');'?>">
		<div class="motivational-text--container">
			<h1 class="motivational-text"><?php
				$text = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));	
				echo $text->text;
			?></h1>
		</div>
		<div class="infoPanel--container">
			<table>
				<tr>
					<td>Rank</td>
					<td>User</td>
					<td>Score</td>
				</tr>
				<?php
				$sql = "SELECT username, score FROM leaderboard ORDER BY score DESC";
				$result = mysqli_query($con, $sql);
				$rank = 1;
				if (mysqli_num_rows($result)) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
						<td>{$rank}</td>
			  		<td>{$row['username']}</td>
			  		<td>{$row['score']}</td>
					  </tr>";
						$rank++;
					}
				}
				?>
			</table>
		</div>
	</main>

	<footer>
	</footer>
</body>

</html>