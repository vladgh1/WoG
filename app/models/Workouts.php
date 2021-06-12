<?php
class workouts
{
	public $db;

	public function __construct()
	{
		$this->db = new Database();
	}
	public function selectExercises(String $intended, String $focus)
	{
		$this->db->query('SELECT * from workout NATURAL JOIN workout_intensity where intended=:intended and focus=:focus');
		$this->db->bind(':intended', $intended);
		$this->db->bind(':focus', $focus);
		return $this->db->resultSet();
	}

	public function addWorkout($data)
	{
		$this->db->query('INSERT INTO user_workout (username, workout, "time", intensity, finished, created_at)
		VALUES (:username, :workout, :workout_time, :intensity, 0, :created_at)');

		$this->db->bind(':username', $_COOKIE['username']);
		$this->db->bind(':workout', $data['workout']);
		$this->db->bind(':workout_time', $data['workout_time']);
		$this->db->bind(':intensity', $data['intensity']);
		$this->db->bind(':created_at', date("Y-m-d H:i:s"));
		return $this->db->execute();
	}

	public function completeWorkout($id, $status)
	{
		$this->db->query('UPDATE user_workout SET finished = :finished WHERE workout = :id');
		$this->db->bind(':finished', $status);
		$this->db->bind(':id', $id);
		$this->db->execute();
	}

	public function existsWorkoutWithId($workout)
	{
		$this->db->query('SELECT * FROM workout WHERE id = :id');
		$this->db->bind(':id', $workout);
		return $this->db->rowCount() > 0;
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

	public function averageExercise()
	{
		$this->db->query('SELECT avg(intensity) as intensity, avg(Wtime) as time from 
		programs where username=:username and finished=1');
		$this->db->bind(':username', $_COOKIE['username']);
		$rez= $this->db->resultSet();
		$intensity= (int)round(intval($rez[0]->intensity));
		$time= (int)round(intval($rez[0]->time));
		var_dump($time); 
		if($time%15>=7)$time=min(((int)($time/15)+1)*15,120);
		else $time=$time-($time%15);
		var_dump($intensity);
		var_dump($time);
	}

	public function getPendingWorkouts($data)
	{
		$this->db->query('SELECT * FROM user_workout WHERE username = :username AND finished = 0');
		$this->db->bind(':username', $data['username']);
		return $this->db->resultSet();
	}

	public function getFinishedWorkouts($data)
	{
		$this->db->query('SELECT * FROM user_workout WHERE username = :username AND finished = 1');
		$this->db->bind(':username', $data['username']);
		return $this->db->resultSet();
	}
}
