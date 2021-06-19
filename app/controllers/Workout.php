<?php

class Workout extends Controller
{

	public function __construct() {
		$this->workout_model = $this->model('Workouts');

		$this->statistic_model = $this->model('Statistic');//scoate-ma cand termini!
	}

	public function saveProgram()
	{
		//scoate si aia din constructor!!!

		// $this->statistic_model->getNrWorkoutsPerWeekDay();//ok
		// $this->statistic_model->nrWorkoutsPerWeek();//ok
		// $this->statistic_model->nrWorkoutsPerMonth();//ok
		$this->statistic_model->nrWorkoutsByIntensity();

		$data = [
			'intensity' => $_POST['intensity'],
			'Pfocus'=> $_POST['Pfocus'],
			'Sfocus' => $_POST['Sfocus'],
			'Wtime' => $_POST['Wtime'],
			'intended' => $_POST['intended']
		];

		$workout = $this->generateProgram($data);
			
		$this->view('info/generatorResults', $workout);
	}

	public function saveAverageProgram()//functia de "surprinde-ma"
	{
		$dataIntended = $this->workout_model->getRandomIntendedName();
		$dataFocus = $this->workout_model->getRandomExerciseName();
		$dataAverage = $this->workout_model->averageExercise();

		$data = [
			'intensity' => $dataAverage['intensity'],
			'Pfocus'=> $dataFocus['Pfocus'],
			'Sfocus' => $dataFocus['Sfocus'],
			'Wtime' => $dataAverage['Wtime'],
			'intended' => $dataIntended['intended']
		];
		
		$this->view('info/generatorResults', $data);
	}

	public function generateProgram($data)
	{
		$Pfocus = $data['Pfocus'];
		$Sfocus = $data['Sfocus'];
		$Wtime = $data['Wtime'];
		$intended = $data['intended'];
		$intensity = $data['intensity'];

		$query_Primary = $this->workout_model->selectExercises($intended,$Pfocus,$intensity);
		$query_Secondary = $this->workout_model->selectExercises($intended,$Sfocus,$intensity);

		$nrExercises = $Wtime / 15;
		$nrSecondaryExercise = 0;
		$nrPrimaryExercise = 0;
		if (($Pfocus == $Sfocus && $Pfocus != "None") || ($Sfocus == "None" && $Pfocus != "None"))
			$nrPrimaryExercise = $nrExercises;
		else if ($Pfocus == "None" && $Sfocus != "None") {
			$nrSecondaryExercise = $nrExercises;
		} else if ($Pfocus != "None" && $Sfocus != "None") {
			$nrPrimaryExercise = ceil($nrExercises / 2);
			$nrSecondaryExercise = $nrExercises - $nrPrimaryExercise;
		}

		shuffle($query_Primary);
		shuffle($query_Secondary);

		$newData = [
			'primary' => array_slice($query_Primary, 0, $nrPrimaryExercise),
			'secondary' => array_slice($query_Secondary, 0, $nrSecondaryExercise),
			'intensity' => $intensity,
			'time' => $Wtime
		];

		setcookie('workout_plan', serialize($newData), 0, '/');

		return $newData;
	}
}
