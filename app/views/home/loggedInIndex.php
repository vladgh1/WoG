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
			<p>Name: <?= $data->fullname; ?></p>
			<hr>
			<!-- TODO: calcul din data nasterii! -->
			<p>Age: <?= $data->age ?></p>
			<hr>
			<p>Height: <?= $data->height ?></p>
			<hr>
			<p>Weight: <?= $data->weight ?></p>
			<hr>
			<p>Today's plan:</p>
			<ul>
				<li>
					<input type="checkbox">
					30 min jogging
				</li>
				<li>
					<input type="checkbox">
					25 min warm-up
				</li>
				<li>
					<input type="checkbox">
					40 min something else... 
				</li>
			</ul>
			<hr>
			<a id="generate--btn" class="a--btn gray--btn" href="../users/generator">Generate a program!</a>
		</div>
	</main>
</body>

</html>