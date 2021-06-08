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

        $data = [
			'intensity' => $_POST['intensity'],
			'Pfocus'=> $_POST['Pfocus'],
            'Sfocus' => $_POST['Sfocus'],
            'Wtime' => $_POST['Wtime'],
            'intended' => $_POST['intended']
		];

        $this->db->query('INSERT INTO programs VALUES (:intensity, :Pfocus, :Sfocus, :Wtime, :intended, :username, :inProgress)');
		$this->db->bind(':intensity', $data['intensity']);
		$this->db->bind(':Pfocus', $data['Pfocus']);
		$this->db->bind(':Sfocus', $data['Sfocus']);
        $this->db->bind(':Wtime', $data['Wtime']);
		$this->db->bind(':intended', $data['intended']);
        $this->db->bind(':username', $_COOKIE['username']);
        $this->db->bind(':inProgress', 1);
		return $this->db->execute();
    }
}
