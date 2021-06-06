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
	<?php require_once APPROOT . '/includes/loggedInHeader'; ?>

	<!-- Only HTML code -->
	<!-- For functionality use controller and model -->

	<!-- $intensity = $_SESSION['intensity'];
	$Pfocus= $_SESSION['Pfocus'];
	$Sfocus= $_SESSION['Sfocus'];
	$Wtime= $_SESSION['Wtime'];
	$intended= $_SESSION['intended'];

	$Primary = "select * from work where intended='$intended' and focus='$Pfocus'";
	$Secondary = "select * from work where intended='$intended' and focus='$Sfocus'";
	$query_Primary = mysqli_query($con, $Primary);
	$query_Secondary = mysqli_query($con, $Secondary);

	// echo mysqli_fetch_array($query_Primary, MYSQLI_NUM);
	$nrExercises = $Wtime / 15;
	$nrSecondaryExercise = 0;
	$nrPrimaryExercise = 0;
	if (($Pfocus == $Sfocus && $Pfocus != "None") || $Sfocus == "None" && $Pfocus != "None")
		$nrPrimaryExercise = $nrExercises;
	else if ($Pfocus == "None" && $Sfocus != "None") {
		$nrSecondaryExercise = $nrExercises;
	} else if ($Pfocus != "None" && $Sfocus != "None") {
		$nrPrimaryExercise = ceil($nrExercises / 2);
		$nrSecondaryExercise = $nrExercises - $nrPrimaryExercise;
	}

	// echo $nrPrimaryExercise." ".$nrSecondaryExercise;

	if ($query_Primary->num_rows > 0)
		foreach ($query_Primary as $exercise) {
			if ($nrPrimaryExercise == 0) break;
			$nrPrimaryExercise--;
			// echo $exercise["nume"]." ". $exercise["intensitate".$intensity];
			echo "<a href='" . $exercise["link"] . "'><img class='exercise--container' src='" . $exercise["photo"] . "'></a>";
			echo "<br>";
		}
	if ($query_Secondary->num_rows > 0 && $Pfocus != $Sfocus)
		foreach ($query_Secondary as $exercise) {
			if ($nrSecondaryExercise == 0) break;
			$nrSecondaryExercise--;
			// echo $exercise["nume"]." ". $exercise["intensitate".$intensity];
			echo "<a href='" . $exercise["link"] . "'><img class='exercise--container' src='" . $exercise["photo"] . "'></a>";
			echo "<br>";
		}

	?> -->

	<footer>
	</footer>
</body>

</html>