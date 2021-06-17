<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - <?= $data->name ?></title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/exerciseDetails.css'>
</head>

<body>
	<?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>

	<section class="exercise--container">
		<a class="image--container" href="<?=$data->link ?>"><img class="exercise-image" src="<?= URLROOT ?>/app/Img/<?= $data->photo ?>"></a>
		<div class="text--container">
			<h2><?= $data->name ?></h2>
			<p>Focus: <?= $data->focus ?></p>
			<p>Intended: <?= $data->intended ?></p>
			<p>Description: <?= $data->description ?></p>
		</div>
		<iframe src="<?= $data->link ?>" frameborder="0" width="350" height="200" title="YouTube video player" clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</section>
</body>

</html>