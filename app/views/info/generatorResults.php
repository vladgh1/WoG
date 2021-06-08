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
	<?php

	foreach ($newData['query_Primary'] as $exercise) {
		if ($newData['nrPrimaryExercise'] == 0) break;
		$newData['nrPrimaryExercise'];
		echo "<a href='" . $exercise["link"] . "'><img class='exercise--container' src='" . $exercise["photo"] . "'></a>";
		echo "<br>";
	}
	// if($query_Secondary->num_rows>0 && $Pfocus!=$Sfocus)
	foreach ($newData['query_Secondary'] as $exercise) {
		if ($newData['nrSecondaryExercise'] == 0) break;
		$newData['nrSecondaryExercise']--;
		echo "<a href='" . $exercise["link"] . "'><img class='exercise--container' src='" . $exercise["photo"] . "'></a>";
		echo "<br>";
	}

	?>
	<footer>
	</footer>
</body>

</html>