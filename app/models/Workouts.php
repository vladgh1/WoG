<?php
class workouts
{
	public $db;

	public function __construct()
	{
		$this->db = new Database();
	}
	public function selectExercises(String $intended, String $focus,int $intensity)
	{
		$this->db->query('SELECT * from workout a JOIN workout_intensity b on a.id=b.workout_id where intended=:intended and focus=:focus and intensity=:intensity');
		$this->db->bind(':intended', $intended);
		$this->db->bind(':focus', $focus);
		$this->db->bind(':intensity', $intensity);
		return $this->db->resultSet();
	}

	public function addWorkout($data)
	{
		$this->db->query('INSERT INTO user_workout (username, workout, workout_time, intensity, finished, created_at)
		VALUES (:username, :workout, :workout_time, :intensity, :finished, :created_at)');

		$this->db->bind(':username', $data['username']);
		$this->db->bind(':workout', $data['workout']);
		$this->db->bind(':workout_time', $data['workout_time']);
		$this->db->bind(':intensity', $data['intensity']);
		$this->db->bind(':finished', $data['finished']);
		$this->db->bind(':created_at', $data['created_at']);

		return $this->db->execute();
	}

	public function completeWorkout($id, $status)
	{
		$this->db->query('UPDATE user_workout SET finished = :finished WHERE id = :id');
		$this->db->bind(':finished', $status);
		$this->db->bind(':id', $id);
		return $this->db->execute();
	}

	public function getWorkoutId($workout)
	{
		$this->db->query('SELECT id FROM workout WHERE name = :id');
		$this->db->bind(':id', $workout);
		$this->db->execute();
		return $this->db->resultRow();
	}

	public function getLatestId()
	{
		$this->db->query('SELECT max(id) as id from user_workout');
		$rez= $this->db->resultSet();
		return intval($rez[0]->id);
	}

	public function addExercise($id,$nume)
	{
		$this->db->query('INSERT INTO selected_exercise (id,nume_exercitiu) 
		VALUES (:id, :nume)');

		$this->db->bind(':id', $id);
		$this->db->bind(':nume', $nume);
		return $this->db->execute();
	}

	public function setPoints($points,$idProgram)
	{
		$this->db->query('UPDATE programs
		SET punctaj=:points
		WHERE id=:idProgram ');

		$this->db->bind(':points', $points);
		$this->db->bind(':idProgram', $idProgram);
		return $this->db->resultSet();
	}

	public function nrOfPrograms()
	{
		$this->db->query('SELECT count(*) as nr from programs where username=:username');
		$this->db->bind(':username', $_COOKIE['username']);
		$rez= $this->db->resultSet();
		return intval($rez[0]->nr);
	}

	public function getRandomExerciseName()
	{
		$exercises=[
			"Arms",
			"Legs",
			"Chest",
			"Abdomen",
			"UpperBack",
			"LowerBack"
		];
		shuffle($exercises);
		$rez=[
			'Pfocus'=>$exercises[0],
			'Sfocus'=>$exercises[1]
		];
		return $rez;
	}

	public function getRandomIntendedName()
	{
		$exercises=[
			"Flexibility",
			"Strength",
			"Speed",
			"Mobility",
			"Cardio"
		];
		shuffle($exercises);
		$rez=[
			'intended'=>$exercises[0]
		];
		return $rez;
	}

	public function averageExercise()
	{
		$this->db->query('SELECT avg(intensity) as intensity, avg(workout_time) as time from 
		user_workout where username=:username and finished=1');
		$this->db->bind(':username', $_COOKIE['username']);
		$rez= $this->db->resultSet();
		$intensity= (int)round(intval($rez[0]->intensity));
		$time= (int)round(intval($rez[0]->time));
		if($time%15>=7)$time=min(((int)($time/15)+1)*15,120);
		else $time=$time-($time%15);
		$rezData=[
			'Wtime'=>$time,
			'intensity'=>$intensity
		];
		return $rezData;
	}

	public function getPendingWorkouts($data)
	{
		return $this->getWorkouts($data, 0);
	}

	public function getFinishedWorkouts($data)
	{
		return $this->getWorkouts($data, 1);	
	}

	private function getWorkouts($data, $finished)
	{
		$this->db->query('SELECT * FROM workout w JOIN user_workout u ON u.workout=w.id JOIN workout_intensity i ON u.workout = i.workout_id AND u.intensity=i.intensity WHERE finished=:finished AND username=:username');
		$this->db->bind(':username', $data['username']);
		$this->db->bind(':finished', $finished);
		return $this->db->resultSet();
	}
}

