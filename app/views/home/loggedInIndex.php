<?php global $ROOT; ?>

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
	<?php
	include '../public/src/components/loggedInHeader.php'
	?>

<main class="landing-main--container workout-background-image" style="<?php
	$image = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));
	echo 'background-image: linear-gradient(to left, rgba(162, 74, 54, 0.87), #a24a3654), url(' . $image->image . ');'?>">
		<div class="motivational-text--container">
			<h1 class="motivational-text"><?php
				$text = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));	
				echo $text->text;
			?></h1>
		</div>
	</main>
	<a class="a--btn gray--btn" style="position:absolute; right:10%; top:50%;" href="../info/generator">
	Generate now!</a>

	<footer>
	</footer>
</body>

</html>