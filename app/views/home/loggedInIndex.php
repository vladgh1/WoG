<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME ?></title>
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
			<p>Nume: <?= $_SESSION['fullname']; ?></p>
			<hr>
			<!-- TODO: calcul din data nasterii! -->
			<p>Varsta: <?= $_SESSION['age']; ?></p>
			<hr>
			<p>Inaltime: <?= $_SESSION['height']; ?></p>
			<hr>
			<p>Greutate: <?= $_SESSION['weight']; ?></p>
			<hr>
			<p>Planul pe azi:</p>
			<ul>
				<li>
					<input type="checkbox">
					30 min alergare
				</li>
				<li>
					<input type="checkbox">
					25 min incalzire
				</li>
				<li>
					<input type="checkbox">
					40 min ceva...
				</li>
			</ul>
			<hr>
			<a id="generate--btn" class="a--btn gray--btn" href="../users/generator">Generate another program!</a>
		</div>
	</main>
</body>

</html>