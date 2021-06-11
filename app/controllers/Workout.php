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
        $this->workout_model->addWorkout($data);
        $this->getProgram($data);
    }

    public function getProgram($data)
    {
        $intensity=$data['intensity'];
        $Pfocus = $data['Pfocus'];
        $Sfocus = $data['Sfocus'];
        $Wtime = $data['Wtime'];
        $intended = $data['intended'];


        $query_Primary = $this->workout_model->selectExercises($intended,$Pfocus);
        $query_Secondary = $this->workout_model->selectExercises($intended,$Sfocus);

        // echo mysqli_fetch_array($query_Primary, MYSQLI_NUM);
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
			'query_Primary' => $query_Primary,
			'query_Secondary' => $query_Secondary,
			'nrPrimaryExercise' => $nrPrimaryExercise,
			'nrSecondaryExercise' => $nrSecondaryExercise,
            'intensity' => $_POST['intensity']
		];

        $programIdString=$this->workout_model->getLatestId();
        $programId = intval($programIdString[0]->id);
        var_dump($programId);
        $points=0;

        foreach ($query_Primary as $exercise) {
			if ($nrPrimaryExercise == 0) break;
			$nrPrimaryExercise--;
			$this->workout_model->addExercise($programId,$exercise->nume);
            $points+=$exercise->punctaj*$intensity;
		}
        
        foreach ($query_Secondary as $exercise) {
			if ($nrSecondaryExercise == 0) break;
			$nrSecondaryExercise--;
			$this->workout_model->addExercise($programId,$exercise->nume);
            $points+=$exercise->punctaj*$intensity;
		}
        
        $this->workout_model->setPoints($points,$programId);

        $this->view('info/generatorResults', $newData);
    }
    

}
