<?php

class Users extends Controller {
	private $fullname_validation = "/^[A-Z][\-a-z]*\s([A-Z]\.)?[A-Z][\-a-z]*$/";
	private $username_validation = "/^[_a-zA-Z0-9]+$/";
	private $email_validation = "/^[^\s]+@[^\s]+\.[^\s]+$/i";
	private $password_validation = "/^([a-z]+|[0-9]+|[A-Z]+)*$/";
	private $gender_validation = "/^(fe)?male$/i";
	private $height_unit_validation = "/^(cm|feet)$/i";
	private $weight_unit_validation = "/^(kg|lb)$/i";

	public function __construct() {
		$this->user_model = $this->model('User');
	}

	public function login() {
		$data = [
			'username' => '',
			'password' => '',
			'usernameError' => '',
			'passwordError' => ''
		];

		$this->view('info/login', $data);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post method
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// Get the data
			$data = [
				'username' => trim($_POST['username']),
				'password' => trim($_POST['password']),
				'usernameError' => '',
				'passwordError' => ''
			];

			// Validate the username
			if (empty($data['username'])) {
				$data['usernameError'] = 'Please enter username';
			} elseif (!preg_match($this->username_validation, $data['username'])) {
				$data['usernameError'] = 'Please enter a valid username';
			}

			// Validate the password
			if (empty($data['password'])) {
				$data['passwordError'] = 'Please enter password';
			} elseif (strlen($data['password'] < 5)) {
				$data['passwordError'] = 'Please enter a password longer than 4 characters';
			} elseif (!preg_match($this->password_validation, $data['password'])) {
				$data['passwordError'] = 'Password must contain at least one small character, one bit character and one digit';
			}

			// Check if there are no errors
			if (empty($data['usernameError'] && empty($data['passwordError']))) {
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
				$loggedInUser = $this->user_model->login($data);
				if ($loggedInUser) {
					$this->createUserSession($$loggedInUser);
					// $this->view('home/loggedIN');
				} else {
					echo 'no';
					$data['passwordError'] = 'Password is incorrect';
					// $this->view('info/login', $data);
				}
			}
		}
	}

	public function register() {
		$data = [
			'fullname' => '',
			'username' => '',
			'email' => '',
			'password' => '',
			'confirmPassword' => '',
			'age' => '',
			'gender' => '',
			'height' => '',
			'heightUnit' => '',
			'weight' => '',
			'weightUnit' => '',
			'fullnameError' => '',
			'usernameError' => '',
			'emailError' => '',
			'passwordError' => '',
			'confirmPasswordError' => '',
			'ageError' => '',
			'genderError' => '',
			'heightError' => '',
			'heightUnitError' => '',
			'weightError' => '',
			'weightUnitError' => ''
		];

		$this->view('info/register', $data);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post method
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// Get the data
			$data = [
				'fullname' => trim($_POST['fullname']),
				'username' => trim($_POST['username']),
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'confirmPassword' => trim($_POST['cpassword']),
				'age' => trim($_POST['age']),
				'gender' => trim($_POST['gender']),
				'height' => trim($_POST['height']),
				'heightUnit' => trim($_POST['typeheight']),
				'weight' => trim($_POST['weight']),
				'weightUnit' => trim($_POST['typeweight']),
				'fullnameError' => '',
				'usernameError' => '',
				'emailError' => '',
				'passwordError' => '',
				'confirmPasswordError' => '',
				'ageError' => '',
				'genderError' => '',
				'heightError' => '',
				'heightUnitError' => '',
				'weightError' => '',
				'weightUnitError' => ''
			];

			// Validate the fullname
			if (empty($data['fullname'])) {
				$data['fullnameError'] = 'Please enter your full name';
			} elseif (!preg_match($this->fullname_validation, $data['fullname'])) {
				$data['usernameError'] = 'Please enter your real full name';
			}

			// Validate the username
			if (empty($data['username'])) {
				$data['usernameError'] = 'Please enter username';
			} elseif (!preg_match($this->username_validation, $data['username'])) {
				$data['usernameError'] = 'Please enter a valid username';
			}

			// Validate the email
			if (empty($data['email'])) {
				$data['emailError'] = 'Please enter email';
			} elseif (!preg_match($this->email_validation, $data['email'])) {
				$data['emailError'] = 'Please enter a valid email';
			} elseif ($this->user_model->existsUserWithEmail($data['email'])) {
				$data['emailError'] = 'User with this email is already registered';
			}

			// Validate the password
			if (empty($data['password'])) {
				$data['passwordError'] = 'Please enter password';
			} elseif (strlen($data['password'] < 5)) {
				$data['passwordError'] = 'Please enter a password longer than 4 characters';
			} elseif (!preg_match($this->password_validation, $data['password'])) {
				$data['passwordError'] = 'Password must contain at least one small character, one bit character and one digit';
			}

			// Confirms the password
			if (empty($data['confirmPassword'])) {
				$data['confirmPasswordError'] = 'Please enter confirmPassword';
			} elseif ($data['password'] != $data['confirmPassword']) {
				$data['confirmPasswordError'] = 'Passwords do not match';
			}

			// Validate the age
			if (empty($data['age'])) {
				$data['ageError'] = 'Please enter your age';
			} elseif ($data['age'] < 7) {
				$data['ageError'] = 'You must be over 7 to use this register';
			} elseif ($data['age'] > 120) {
				$data['ageError'] = 'Please enter a valid age';
			}

			// Validate the gender
			if (empty($data['gender'])) {
				$data['genderError'] = 'Please enter your biological gender';
			} elseif (!preg_match($this->gender_validation, $data['gender'])) {
				$data['genderError'] = 'Selected gender is not valid';
			}

			// Validate the height
			if (empty($data['height'])) {
				$data['heightError'] = 'Please select  measure of your height';
			} elseif ($this->stdHeight($data['height'], $data['heightUnit']) <= 50 
					|| $this->stdHeight($data['height'], $data['heightUnit']) > 300) {
				$data['heightError'] = 'Selected measure  of height is not valid';
			}

			// Validate the height unit
			if (empty($data['heightUnit'])) {
				$data['heightUnitError'] = 'Please select unit measure of your height';
			} elseif (!preg_match($this->height_unit_validation, $data['heightUnit'])) {
				$data['heightUnitError'] = 'Selected measure unit of height is not valid';
			}

			// Validate the weight
			if (empty($data['weight'])) {
				$data['weightError'] = 'Please select  measure of your weight';
			} elseif ($this->stdWeight($data['weight'], $data['weightUnit']) <= 30 
					|| $this->stdWeight($data['weight'], $data['weightUnit']) > 300) {
				$data['weightError'] = 'Selected measure  of weight is not valid';
			}

			// Validate the weight unit
			if (empty($data['weightUnit'])) {
				$data['weightUnitError'] = 'Please select unit measure of your weight';
			} elseif (!preg_match($this->weight_unit_validation, $data['weightUnit'])) {
				$data['weightUnitError'] = 'Selected measure unit of weight is not valid';
			}

			// Check if there are no errors
			if (empty($data['fullnameError'])
					&& empty($data['usernameError'])
					&& empty($data['emailError'])
					&& empty($data['passwordError'])
					&& empty($data['confirmPasswordError'])
					&& empty($data['ageError'])
					&& empty($data['genderError'])
					&& empty($data['heightError'])
					&& empty($data['heightUnitError'])
					&& empty($data['weightError'])
					&& empty($data['weightUnitError'])) {

				// Hash password
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
				$data['confirmPassword'] = $data['password'];

				// standartize height and weight
				$data['height'] = $this->stdHeight($data['height'], $data['heightUnit']);
				$data['weight'] = $this->stdWeight($data['weight'], $data['weightUnit']);

				// Register user
				if($this->user_model->register($data)) {
					// Redirect to login page
					header('location: ' . URLROOT . '/public/users/login');
				} else {
					die('Something went wrong');
				}
			}
		}
	}

	public function createUserSession($user) {
		session_start();
		$_SESSION['user'] = $user->username;
		$_SESSION['email'] = $user->email;
		// header('location:' . URLROOT . '/public/home/loggedIN');
	}

	public function logout() {
		unset($_SESSION['user']);
		unset($_SESSION['email']);
	}

	private function stdHeight(float $height, string $type) {
		switch ($type) {
			case 'cm':
				return $height;
			case 'feet':
				return $height * 30.48;
		}
	}

	private function stdWeight(float $weight, string $type) {
		switch ($type) {
			case 'kg':
				return $weight;
			case 'lb':
				return $weight / 2.2046;
		}
	}
}