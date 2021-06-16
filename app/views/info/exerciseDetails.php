<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - exercise details</title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/exerciseDetails.css'>

</head>

<body>
	<?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>
	<?php
	echo "<a href='" . $data->link . "'><img class='exercise--container' src='\\WoG\\app\\Img\\" . $data->photo . "'></a>";
	echo "<br>";
	echo "Focus: " . $data->focus;
	echo "<br>";
	echo "Intended: " . $data->intended;
	echo "<br>";
	echo "Descriere: " . $data->description;
	echo "<br>";
	echo '<iframe width="350" height="200" src="'. $data->link . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		?>
</body>

</html>