<?php

class Workout extends Controller
{

	public function __construct() {
		$this->workout_model = $this->model('Workouts');
	}

	public function saveProgram()
	{
		$data = [
			'intensity' => $_POST['intensity'],
			'Pfocus'=> $_POST['Pfocus'],
			'Sfocus' => $_POST['Sfocus'],
			'Wtime' => $_POST['Wtime'],
			'intended' => $_POST['intended']
		];

		// $this->workout_model->averageExercise();

		$workout = $this->generateProgram($data);
		$this->workout_model->addWorkout($workout);
		// $this->view('info/generatorResults', $workout);
	}

	public function generateProgram($data)
	{
		$intensity = $data['intensity'];
		$Pfocus = $data['Pfocus'];
		$Sfocus = $data['Sfocus'];
		$Wtime = $data['Wtime'];
		$intended = $data['intended'];

		$query_Primary = $this->workout_model->selectExercises($intended,$Pfocus);
		$query_Secondary = $this->workout_model->selectExercises($intended,$Sfocus);

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
			'intensity' => $_POST['intensity']
		];

		setcookie('workout_plan', serialize($newData), 0, '/');

		return $newData;
	}
}
