<?php global $ROOT; ?>
<?php
$con = mysqli_connect("localhost", "root", "") or die("Unable to connect");
mysqli_select_db($con, "logindb");
?>
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
																			echo 'background-image: linear-gradient(to left, rgba(162, 74, 54, 0.87), #a24a3654), url(' . $image->image . ');' ?>">
		<div class="motivational-text--container">
			<h1 class="motivational-text"><?php
											$text = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));
											echo $text->text;
											?></h1>
		</div>
		<div class="general-info--container">
		<p>
			Nume: <?php
					$sql = "SELECT fullname FROM userinfo WHERE username= '{$_SESSION['username']}' ";
					$result = mysqli_query($con, $sql);
					$row = mysqli_fetch_row($result);
					echo $row[0];
					?>
		</p>
		<hr>
		<p>
			Varsta: <?php
					$sql = "SELECT age FROM userinfo WHERE username= '{$_SESSION['username']}' ";
					$result = mysqli_query($con, $sql);
					$row = mysqli_fetch_row($result);
					echo $row[0];
					?>
		</p>
		<!-- calcul din data nasterii! -->
		<hr>
		<p>
			Inaltime: <?php
						$sql = "SELECT height FROM userinfo WHERE username= '{$_SESSION['username']}' ";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_row($result);
						echo $row[0];
						$sql = "SELECT typeheight FROM userinfo WHERE username= '{$_SESSION['username']}' ";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_row($result);
						echo $row[0];
						?>
		</p>
		<hr>
		<p>
			Greutate: <?php
						$sql = "SELECT weight FROM userinfo WHERE username= '{$_SESSION['username']}' ";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_row($result);
						echo $row[0];
						$sql = "SELECT typeweight FROM userinfo WHERE username= '{$_SESSION['username']}' ";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_row($result);
						echo $row[0];
						?>
		</p>
		<hr>
		<p>
			Planul pe azi:
		</p>
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
		<a class="a--btn gray--btn" href="../info/generator">
			Generate another program!</a>
	</div>
	</main>

	<footer>
	</footer>
</body>

</html>