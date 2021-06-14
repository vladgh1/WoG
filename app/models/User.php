<?php

class User
{
	public $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getUser($username)
	{
		$this->db->query('SELECT * from user u JOIN userinfo i ON u.username = i.username WHERE u.username = :username');
		$this->db->bind(':username', $username);
		$row = $this->db->resultRow();
		if ($row) {
			return $row;
		}
		return false;
	}

	public function existsUserWithUsername($username)
	{
		$this->db->query('SELECT * FROM user WHERE username = :username');
		$this->db->bind(':username', $username);
		return $this->db->rowCount() > 0;
	}

	public function existsUserWithEmail($email)
	{
		$this->db->query('SELECT * FROM user WHERE email = :email');
		$this->db->bind(':email', $email);
		return $this->db->rowCount() > 0;
	}

	public function login($data)
	{
		$this->db->query('SELECT * FROM user u JOIN userinfo i ON u.username = i.username WHERE u.username = :username');
		$this->db->bind(':username', $data['username']);
		$row = $this->db->resultRow();
		if ($row) {
			$hashed_password = $row->password;
			echo trim($data['password']) . ' ' .  trim($hashed_password) . ' = ' . trim($data['password']) === trim($hashed_password);
			if (password_verify($data['password'], $hashed_password) || trim($data['password']) === trim($hashed_password)) {
				return $row;
			}
		}
		return false;
	}

	public function register($data)
	{
		return ($this->addUser($data) && $this->addUserInfo($data));
	}

	private function addUser($data)
	{
		$this->db->query('INSERT INTO user VALUES (:username, :email, :pass)');
		$this->db->bind(':username', $data['username']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':pass', $data['password']);
		return $this->db->execute();
	}

	public function completeUserWorkout($data)
	{
		$this->db->query('UPDATE programs SET inProgress = 0 WHERE id = :id');
		$this->db->bind(':id', $data['workout']);
		return $this->db->execute();
	}

	private function addUserInfo($data)
	{
		$this->db->query('INSERT INTO userinfo VALUES (:fullname, :age, :userHeight, :userWeight, :gender, :username)');
		$this->db->bind(':fullname', $data['fullname']);
		$this->db->bind(':age', $data['age'], 'int');
		$this->db->bind(':userHeight', $data['height'], 'int');
		$this->db->bind(':userWeight', $data['weight'], 'int');
		$this->db->bind(':gender', $data['gender']);
		$this->db->bind(':username', $data['username']);
		return $this->db->execute();
	}

	public function updateUser($data)
	{
		$this->db->query('UPDATE user SET password = :pass WHERE username = :username');
		$this->db->bind(':pass', $data['password']);
		$this->db->bind(':username', $data['username']);
		return $this->db->execute();
	}

	public function updateUserInfo($data)
	{
		$this->db->query('UPDATE userinfo SET fullname = :fullname, age = :age, height = :userHeight, weight = :userWeight, gender = :gender WHERE username = :username');
		$this->db->bind(':fullname', $data['fullname']);
		$this->db->bind(':age', $data['age'], 'int');
		$this->db->bind(':userHeight', $data['height'], 'int');
		$this->db->bind(':userWeight', $data['weight'], 'int');
		$this->db->bind(':gender', $data['gender']);
		$this->db->bind(':username', $data['username']);
		return $this->db->execute();
	}

	public function getUserInfo($username)
	{
		$this->db->query('SELECT * FROM user u JOIN userinfo i ON u.username = i.username WHERE u.username = :username');
		$this->db->bind(':username', $username);
		return $this->db->resultRow();
	}

	public function getTop()
	{
		$this->db->query('SELECT * FROM leaderboard ORDER BY score DESC');
		return $this->db->resultSet();
	}

	public function getTopYear()
	{
		$this->db->query('SELECT * FROM leaderboard_last_year ORDER BY score DESC');
		return $this->db->resultSet();
	}

	public function getTopMonth()
	{
		$this->db->query('SELECT * FROM leaderboard_last_month ORDER BY score DESC');
		return $this->db->resultSet();
	}

	public function generatePDF()
	{
		include_once('../app/libraries/fpdf/fpdf.php');
		$display_heading = array('username' => 'Name', 'score' => 'Score');
		$result = $this->getTop();
		$this->db->query('SHOW columns FROM leaderboard');
		$header =  $this->db->resultSet();
		$pdf = new FPDF();
		$pdf->AddPage();
		//header
		$pdf->Image('../app/Img/logo.png', 10, -1, 70);
		$pdf->Cell(80);
		$pdf->SetFont('Arial', 'B', 13);
		$pdf->Cell(80, 10, 'Leaderboard', 1, 0, 'C');
		$pdf->Ln(20);
		$pdf->AliasNbPages();
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(40, 12, 'Rank', 1);
		$rank = 1;
		foreach ($header as $heading) {
			$pdf->Cell(40, 12, $display_heading[$heading->Field], 1);
		}
		foreach ($result as $row) {
			$pdf->Ln();
			$pdf->Cell(40, 12, $rank, 1);
			$rank++;
			foreach ($row as $column) {
				$pdf->Cell(40, 12, $column, 1);
			}
		}
		ob_end_clean();
		$pdf->Output();
	}

	public function generateJSON()
	{
		$this->db->query('select * from leaderboard');
		$result = $this->db->resultSet();
		$json_data = array();
		foreach ($result as $rec) {
			$json_array['username'] = $rec->username;
			$json_array['score'] = $rec->score;
			//here pushing the values in to an array  
			array_push($json_data, $json_array);
		}
		echo json_encode($json_data);
	}
}
