<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - generated result</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
</head>

<body>
	
	<?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>
	
	<div class="result-exercises--container">
		<?php
		$nrPrimaryExercise=$data['nrPrimaryExercise'];
		$nrSecondaryExercise=$data['nrSecondaryExercise'];
		foreach ($data['query_Primary'] as $exercise) {
			if ($nrPrimaryExercise == 0) break;
			$nrPrimaryExercise--;
			echo '<div class="result-exercise--container">';
			echo "<a href='" . $exercise->link . "'><img class='exercise--container' src='\\WoG\\app\\Img\\" . $exercise->photo . "'></a>";
			echo $exercise->descriere;
			echo '</div>';
		}
		// if($query_Secondary->num_rows>0 && $Pfocus!=$Sfocus)
		foreach ($data['query_Secondary'] as $exercise) {
			if ($nrSecondaryExercise == 0) break;
			$nrSecondaryExercise--;
			echo '<div class="result-exercise--container">';
			echo "<a href='" . $exercise->link . "'><img class='exercise--container' src='\\WoG\\app\\Img\\" . $exercise->photo . "'></a>";
			echo $exercise->descriere;
			echo '</div>';
		}

		?>
	</div>
</body>

</html>