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
		$this->db->query('SELECT count(DAYNAME(created_at)) as nrDeZile,DAYNAME(created_at) as numeZi from user_workout
         where username=:username and finished=1 group by DAYNAME(created_at) order by DAYNAME(created_at)');

		$this->db->bind(':username', $_COOKIE['username']);
        
		$rez= $this->db->resultSet();
        // var_dump($rez);
        return $rez;
    }
    public function nrWorkoutsPerWeek()
	{
		$this->db->query('SELECT avg(t.nrDeExercitii) as avgg from (SELECT count(*) as nrDeExercitii from user_workout
         where username=:username and finished=1 group by week(created_at)) t');

		$this->db->bind(':username', $_COOKIE['username']);
        
		$rez= $this->db->resultRow();
        // var_dump($rez);
        return $rez;
    }
    public function nrWorkoutsPerMonth()
	{
		$this->db->query('SELECT avg(t.nrDeExercitii) as avgg from (SELECT count(*) as nrDeExercitii from user_workout
         where username=:username and finished=1 group by month(created_at)) t');

		$this->db->bind(':username', $_COOKIE['username']);
        
		$rez= $this->db->resultRow();
        // var_dump($rez);
        return $rez;
    }
	public function nrWorkoutsByIntensity()
	{
		$this->db->query('SELECT nrAntrenamente,t.intensity from (SELECT count(*) as nrAntrenamente,intensity from user_workout
         where username=:username and finished=1 group by created_at) t group by t.intensity');

		$this->db->bind(':username', $_COOKIE['username']);
        
		$rez= $this->db->resultSet();
        // var_dump($rez);
        return $rez;
    }
	public function getConsecutiveDays(){
		$this->db->query('select t.*
		from (select username, grp, count(*) as NumInSequence,
					 min(CAST(created_at AS date)) as mindate, max(CAST(created_at AS date)) as maxdate,
					 row_number() over (partition by username order by count(*) desc) as seqnum
			  from (select t.*,
						   (CAST(created_at AS date) - row_number() over (partition by username order by CAST(created_at AS date))) as grp
					from user_workout t
				   ) t
			  group by username, grp
			 ) t
		where seqnum = 1 and username = :username');
		$this->db->bind(':username', $_COOKIE['username']);
		return $this->db->resultRow();
	}
	public function getFocusPoints(){
		$this->db->query('SELECT count(*) as focusPoints,focus,username FROM user_workout JOIN workout on user_workout.workout=workout.id where username = :username and finished = 1 group by focus;');
		$this->db->bind(':username', $_COOKIE['username']);
		return $this->db->resultSet();
	}
	public function getIntendedPoints(){
		$this->db->query('SELECT count(*) as intendedPoints,intended,username FROM user_workout JOIN workout on user_workout.workout=workout.id where username = :username and finished = 1 group by intended;');
		$this->db->bind(':username', $_COOKIE['username']);
		return $this->db->resultSet();
	}
	public function getScoreByMonth(){
		$this->db->query('select MONTHNAME(created_at) as month,sum(`i`.`points`) AS `score` from (`logindb`.`user_workout` `u` join `logindb`.`workout_intensity` `i` on(`u`.`intensity` = `i`.`intensity`)) where `u`.`finished` = 1 and username=:username GROUP by month;');
		$this->db->bind(':username', $_COOKIE['username']);
		return $this->db->resultSet();
	}
}

