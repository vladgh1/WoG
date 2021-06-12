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
</head>

<body>

	<?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>
	
	<form method="post" action="<?= URLROOT ?>/public/users/workoutDone" class="result-exercises--container">
		<?php
		
		foreach ($data['primary'] as $exercise) {
			echo '<input name="' . $exercise->id . '" value="' . $exercise->points .'" type="checkbox" onclick="totalIt()" />' . $exercise->name;
			echo '<div class="result-exercise--container">';
			echo "<a href='" . $exercise->link . "'><img class='exercise--container' src='\\WoG\\app\\Img\\" . $exercise->photo . "'></a>";
			echo $exercise->description;
			echo '<iframe width="350" height="200" src="'. $exercise->link . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			echo '<p>Rest for 60 seconds.</p>';
			echo '</div>';
		}

		foreach ($data['secondary'] as $exercise) {
			echo '<input name="' . $exercise->id . '" value="'.$exercise->points . '" type="checkbox" onclick="totalIt()" />' . $exercise->name;
			echo '<div class="result-exercise--container">';
			echo "<a href='" . $exercise->link . "'><img class='exercise--container' src='\\WoG\\app\\Img\\" . $exercise->photo . "'></a>";
			echo $exercise->description;
			echo '<iframe width="350" height="200" src="'. $exercise->link . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			echo '<p>Rest for 60 seconds.</p>';
			echo '</div>';
		}
		?>
		<input value="0 points" readonly="readonly" type="text" name="total" />
		<input type="submit" name="submit_btn" value="Finish">
	</form>
	<script src='<?= URLROOT ?>/public/src/scripts/generator-results.js'></script>
</body>

</html>