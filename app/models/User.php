<?php

class User {
	public $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function existsUserWithEmail($email) {
		$this->db->query('SELECT * FROM user WHERE email = :email');
		$this->db->bind(':email', $email);
		return $this->db->rowCount() > 0;
	}

	public function login($data) {
		$this->db->query('SELECT * FROM user u JOIN userinfo i ON u.username = i.username WHERE u.username = :username');
		$this->db->bind(':username', $data['username']);
		$row = $this->db->resultRow();
		if ($row) {
			$hashed_password = $row->password;
			if (password_verify($data['password'], $hashed_password)) {
				return $row;
			}
		}
		return false;
	}

	public function register($data) {
		return ($this->addUser($data) && $this->addUserInfo($data));
	}

	private function addUser($data) {
		$this->db->query('INSERT INTO user VALUES (:username, :email, :pass)');
		$this->db->bind(':username', $data['username']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':pass', $data['password']);
		return $this->db->execute();
	}

	private function addUserInfo($data) {
		$this->db->query('INSERT INTO userinfo VALUES (:fullname, :age, :userHeight, :userWeight, :gender, :username)');
		$this->db->bind(':fullname', $data['fullname']);
		$this->db->bind(':age', $data['age'], 'int');
		$this->db->bind(':userHeight', $data['height'], 'int');
		$this->db->bind(':userWeight', $data['weight'], 'int');
		$this->db->bind(':gender', $data['gender']);
		$this->db->bind(':username', $data['username']);
		return $this->db->execute();
	}

	public function getTop() {
		$this->db->query('SELECT username, score FROM leaderboard ORDER BY score DESC');
		return $this->db->resultSet();
	}
}