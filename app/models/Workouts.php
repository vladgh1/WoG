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

}
