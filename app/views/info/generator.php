<?php global $ROOT; ?>
<?php
	require 'dbconfig/config.php';
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

	<?php include '../public/src/components/loggedInHeader.php'; ?>

	<form action="#" method="get" class="center--container">
		<h1 class="generator-form-title font--alata">Generate now:</h1>
		<div id="generate" class="generator-form--container">
			
			<label for="Wtime" class="font--alata">Workout Time(min):</label>
			<!-- <input type="number" id="Wtime" name="Wtime" class="slider" id="timeRange"> -->
			<select id="Wtime" name="Wtime">
				<option value="0" style="display: none;">--Not Selected--</option>
				<option value="15">15</option>
				<option value="30">30</option>
				<option value="45">45</option>
				<option value="60">60</option>
				<option value="75">75</option>
				<option value="90">90</option>
				<option value="105">105</option>
				<option value="120">120</option>
			</select>
			<!-- <p>P unde afisam timpul!!!</p> -->
			<label for="intensity" class="font--alata">Workout Intensity:</label>
			<input type="range" name="intensity" min=1 max=5 step=1 value="3" class="slider" id="intensity">
			<!-- <label for="location" class="font--alata">Location</label>
			<select id="location" name="location">
				<option value="Home">Home</option>
				<option value="Gym">Gym</option>
			</select> -->
			<label for="intended" class="font--alata">Intended for</label>
			<select id="intended" name="intended">
				<option value="None" style="display: none;">--Not Selected--</option>
				<option value="Flexibility">Flexibility</option>
				<option value="Strength">Strength</option>
				<option value="Speed">Speed</option>
				<option value="Mobility">Mobility</option>
				<option value="Cardio">Cardio</option>
			</select>
			<label for="Pfocus" class="font--alata">Primary Focus </label>
			<select id="Pfocus" name="Pfocus">
				<option value="None" style="display: none;">--Not Selected--</option>
				<option value="Arms">Arms</option>
				<option value="Legs">Legs</option>
				<option value="Chest">Chest</option>
				<option value="Abdomen">Abdomen</option>
				<option value="UpperBack">UpperBack</option>
				<option value="LowerBack">LowerBack</option>
			</select>
			<label for="Sfocus" class="font--alata">Secondary Focus</label>
			<select id="Sfocus" name="Sfocus">
				<option value="None" style="display: none;">--Not Selected--</option>
				<option value="Arms">Arms</option>
				<option value="Legs">Legs</option>
				<option value="Chest">Chest</option>
				<option value="Abdomen">Abdomen</option>
				<option value="UpperBack">UpperBack</option>
				<option value="LowerBack">LowerBack</option>
			</select>
		</div>
		<!-- <a href=""><img src="\WoG\app\Img\Ramat.jpg"></a> -->
		
<button type="submit" name="generate" class="a--btn green--btn">Submit</button>

<?php
			if(isset($_GET['generate']))
			{
				
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
				$Wtime= $_GET['Wtime'];
				$intensity= $_GET['intensity'];
				$intended= $_GET['intended'];
				$Pfocus= $_GET['Pfocus'];
				$Sfocus= $_GET['Sfocus'];

				$Primary="select * from work where intended='$intended' and focus='$Pfocus'";
				$Secondary="select * from work where intended='$intended' and focus='$Sfocus'";
				$query_Primary = mysqli_query($con,$Primary);
				$query_Secondary = mysqli_query($con,$Secondary);
				
				// echo mysqli_fetch_array($query_Primary, MYSQLI_NUM);
				$nrExercises=$Wtime/15;
				$nrSecondaryExercise=0;
				$nrPrimaryExercise=0;
				if(($Pfocus==$Sfocus && $Pfocus!="None") || $Sfocus=="None" && $Pfocus!="None")
				$nrPrimaryExercise=$nrExercises;
				else if($Pfocus=="None" && $Sfocus!="None"){
					$nrSecondaryExercise=$nrExercises;
				}
				else if($Pfocus!="None" && $Sfocus!="None"){
				$nrPrimaryExercise=ceil($nrExercises/2);
				$nrSecondaryExercise=$nrExercises-$nrPrimaryExercise;
				}

				// echo $nrPrimaryExercise." ".$nrSecondaryExercise;

				if($query_Primary->num_rows>0)
				foreach($query_Primary as $exercise)
				{
					if($nrPrimaryExercise==0)break;
					$nrPrimaryExercise--;
					// echo $exercise["nume"]." ". $exercise["intensitate".$intensity];
					echo "<a href='".$exercise["link"]."'><img class='exercise--container' src='". $exercise["photo"] ."'></a>";
					echo "<br>";
				}
				if($query_Secondary->num_rows>0 && $Pfocus!=$Sfocus)
				foreach($query_Secondary as $exercise)
				{
					if($nrSecondaryExercise==0)break;
					$nrSecondaryExercise--;
					// echo $exercise["nume"]." ". $exercise["intensitate".$intensity];
					echo "<a href='".$exercise["link"]."'><img class='exercise--container' src='". $exercise["photo"] ."'></a>";
					echo "<br>";
				}
			}
		?>
		
		<!-- <div class="main-login-register--container">
			<a href="<?= $ROOT ?>/public/home/loggedIN" class="a--btn gray--btn">Back to the main page!!</a>
		</div> -->
	</form>	

	<footer>
	</footer>
</body>

</html>