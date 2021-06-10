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
        $this->db->query('SELECT * from work where intended=:intended and focus=:focus');
        $this->db->bind(':intended', $intended);
        $this->db->bind(':focus', $focus);
        return $this->db->resultSet();
    }

    public function addWorkout($data)
    {
        $this->db->query('INSERT INTO programs (intensity,Pfocus, Sfocus, Wtime, intended, 
        username, finished) VALUES (:intensity, :Pfocus, :Sfocus, :Wtime, :intended, :username, 
        :finished)');

		$this->db->bind(':intensity', $_POST['intensity']);
		$this->db->bind(':Pfocus', $_POST['Pfocus']);
		$this->db->bind(':Sfocus', $_POST['Sfocus']);
        $this->db->bind(':Wtime', $_POST['Wtime']);
		$this->db->bind(':intended', $data['intended']);
        $this->db->bind(':username', $_COOKIE['username']);
        $this->db->bind(':finished', 0);
		return $this->db->execute();
    }

    public function getLatestId()
    {
        $this->db->query('SELECT max(id) as id from programs');
		return $this->db->resultSet();
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
}
