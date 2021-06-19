<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?> - Welcome <?= $data->username ?></title>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
	<link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
</head>

<body>
	<?php require_once APPROOT . '/views/includes/loggedInHeader.php'?>
	
	<main class="landing-main--container workout-background-image" style="<?php
																			$image = json_decode(file_get_contents(URLROOT . '/public/data/landing-page.json'));
																			echo 'background-image: linear-gradient(to left, rgba(162, 74, 54, 0.87), #a24a3654), url(' . $image->image . ');' ?>">
		
		<div class="motivational-text--container">
			<h1 class="motivational-text"><?php
											$text = json_decode(file_get_contents(URLROOT . '/public/data/landing-page.json'));
											echo $text->text;
											?></h1>
		</div>
		<div class="general-info--container">
			<p>Username: <?= $data->username ?></p><hr>
			<p>Name: <?= $data->fullname; ?></p><hr>
			<p>Age: <?= $data->age ?></p><hr>
			<p>Height: <?= $data->height ?></p><hr>
			<p>Weight: <?= $data->weight ?></p><hr>
			<p>Gender: <?= $data->gender ?></p>
			<div class="generate-buttons--container">
				<a id="generate--btn" class="landing-generate-button a--btn gray--btn" href="../users/generator">Generate a program</a>
				<a id="generate-random--btn" class="landing-generate-button a--btn gray--btn" href="../workout/saveAverageProgram">Surprise me!</a>
			</div>
		</div>
	</main>
</body>

</html>