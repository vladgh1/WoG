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
		$this->db->query('SELECT * FROM user WHERE username = :username');
		$this->db->bind(':username', $data['username']);
		$row = $this->db->resultRow();
		$hashed_password = $row->password;
		if (password_verify($data['password'], $hashed_password)) {
			return $row;
		}
		return false;
	}

	public function register($data) {
		$this->db->query('INSERT INTO user VALUES(:username, :email, :pass)');
		$this->db->bind(':username', $data['username']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':pass', $data['password']);

		echo 'ccc';
		$this->db->execute();
		echo 'aaa';
		// if ($this->db->execute()) {
		// 	$this->db->query('INSERT INTO userinfo (fullname, age, height, weight, gender, username) values(:fullname, :age, :height, :weight, :gender, :username)');
		// 	$this->db->bind(':fullname', $data['fullname']);
		// 	$this->db->bind(':age', $data['age'], 'int');
		// 	$this->db->bind(':height', $data['height'], 'int');
		// 	$this->db->bind(':weight', $data['weight'], 'int');
		// 	$this->db->bind(':gender', $data['gender']);
		// 	$this->db->bind(':username', $data['username']);
		// 	return $this->db->execute();
		// } else {
		// 	return false;
		// }

		// $fullname = $data['fullname'];
		// $username = $data['username'];
		// $email = $data['email'];
		// $hashed_password = $data['password'];
		// $age = $data['age'];
		// $height = $data['height'];
		// $weight = $data['weight'];
		// $gender = $data['gender'];

		// $check_user_query = "select * from user where username='$username'";
		// $check_user_query_run = mysqli_query($this->db, $check_user_query);

		// if (mysqli_num_rows($check_user_query_run) > 0) {
		// 	// echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
		// 	return false;
		// } else {
		// 	$user_query = "insert into user values('$username', '$email', '$hashed_password')";
		// 	$user_query_run = mysqli_query($this->db,$user_query);
		// 	$user_info_query = "insert into userinfo (fullname, age, height, weight, gender, username) values('$fullname', '$age', '$height', '$weight', '$gender', '$username')";
		// 	$user_info_query_run = mysqli_query($this->db,$user_info_query);

		// 	if ($user_query_run && $user_info_query_run) {
		// 		// echo '<script type="text/javascript"> alert("User registered") </script>';
		// 		return true;
		// 	} else {
		// 		// echo '<script type="text/javascript"> alert("Error!") </script>';
		// 		return false;
		// 	}
		// }
	}
}