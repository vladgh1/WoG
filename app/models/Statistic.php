<?php
class statistic
{
	public $db;

	public function __construct()
	{
		$this->db = new Database();
	}
	public function getNrWorkoutsPerWeekDay()
	{
		$this->db->query('SELECT avg(DAYNAME(created_at)) as nrDeZile,DAYNAME(created_at) as numeZi from user_workout
         where username=:username and finished=1 group by DAYNAME(created_at) order by DAYNAME(created_at)');

		$this->db->bind(':username', $_COOKIE['username']);
        
		$rez= $this->db->resultSet();
        // var_dump($rez);
        return $rez;
    }
    public function nrWorkoutsPerWeek()
	{
		$this->db->query('SELECT count(week(created_at)) as nrDeZile,week(created_at) as numeZi from user_workout
         where username=:username and finished=1 group by DAYNAME(created_at) order by week(created_at)');

		$this->db->bind(':username', $_COOKIE['username']);
        
		$rez= $this->db->resultSet();
        var_dump($rez);
        return $rez;
    }
    public function nrWorkoutsPerMonth()
	{
		$this->db->query('SELECT monthname(created_at),count(created_at) as luna from user_workout where username=:username and finished=1 group by created_at,monthname(created_at)');

		$this->db->bind(':username', $_COOKIE['username']);
        
		$rez= $this->db->resultSet();
        var_dump($rez);
        return $rez;
    }
}
