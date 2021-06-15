<?php

class Users extends Controller
{
	private static $fullname_validation = "/^[A-Z][\-a-z]*\s([A-Z]\.)?[A-Z][\-a-z]*$/";
	public static $username_validation = "/^[_a-zA-Z0-9]+$/";
	private static $email_validation = "/^[^\s]+@[^\s]+\.[^\s]+$/i";
	public static $password_validation = "/^([a-z]+|[0-9]+|[A-Z]+)*$/";
	private static $gender_validation = "/^(fe)?male$/i";
	private static $height_unit_validation = "/^(cm|feet)$/i";
	private static $weight_unit_validation = "/^(kg|lb)$/i";

	public function __construct()
	{
		$this->user_model = $this->model('User');
		$this->workout_model = $this->model('Workouts');
	}


	public function generatePDF()
	{
		$this->user_model->generatePDF();
	}

	public function generateJSON()
	{
		$this->user_model->generateJSON();
	}


	public function leaderboard()
	{
		$data = [];
		$users = [];
		$username = $_COOKIE['username'];

		$users['all'] = $this->user_model->getTop();
		$users['year'] = $this->user_model->getTopYear();
		$users['month'] = $this->user_model->getTopMonth();
		$data['self']['all'] = $this->user_model->getSelfTop($username);
		$data['self']['year'] = $this->user_model->getSelfTopYear($username);
		$data['self']['month'] = $this->user_model->getSelfTopMonth($username);

		foreach(['month', 'year', 'all'] as $period) {
			if ($users) {
				foreach ($users[$period] as $user) {
					$data[$period][$user->username] = $user->score;
				}
			}
		}

		$this->view('info/leaderboard', $data);
	}

	public function statistics()
	{
		$this->view('info/statistics');
	}

	public function workout()
	{
		//TODO: Create workout view and display it
		$data['pending']=$this->workout_model->getPendingWorkouts($_COOKIE);
		$data['done']=$this->workout_model->getFinishedWorkouts($_COOKIE);
		$this->view('info/workout',$data);
	}

	public function workoutDone()
	{

		$data = [
			'workout' => [],
			'done' => [],
			'workoutError' => ''
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post method
			$_PUT = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


			// Get the data
			foreach (array_keys($_POST) as $arg) {
				if (is_numeric($_POST[$arg]))
					$_POST[$arg] = (int)$_POST[$arg];
			}

			foreach (array_keys($_POST) as $arg) {
				if (is_int($_POST[$arg])) {
					array_push($data['workout'], $arg);
					$data['done'][$arg] = ($_POST[$arg] == 0 ? 0 : 1);
				}
			}
			//var_dump($data);
			// Validate workout id
			if (empty($data['workout'])) {
				$data['workoutError'] = 'Enter workout';
			}
			//var_dump($data['workout']);
			// Check if there are no errors
			if (empty($data['workoutError'])) {
				foreach ($data['workout'] as $workout) {
					$workoutId = $this->workout_model->getWorkoutId($workout);
					//var_dump($workoutId);
					if ($workoutId) {
						$this->workout_model->completeWorkout($workoutId->id, $data['done'][$workout]);
					}
				}
				// $existsWorkout = $this->user_model->existsWorkoutWithName($data['workout']);
				// if ($existsWorkout) {
				// 	$this->user_model->completeUserWorkout($data);
				// }

				// if (!$existsWorkout) {
				// 	$data['workoutError'] = "Workout does not exits";
				// }
			}
		}
		header('location:' . URLROOT . '/public/users/workout');
	}
	public function exerciseDetails(){
		$this->view('info/exerciseDetails');
	}
	public function generator()
	{
		$this->view('info/generator');
	}

	public function login()
	{
		$data = [
			'username' => '',
			'password' => '',
			'usernameError' => '',
			'passwordError' => ''
		];

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

			// Validate username
			if (empty($data['username'])) {
				$data['usernameError'] = 'Enter username';
			} elseif (!preg_match(self::$username_validation, $data['username'])) {
				$data['usernameError'] = 'Enter a valid username';
			}

			// Validate password
			if (empty($data['password'])) {
				$data['passwordError'] = 'Enter password';
			} elseif (strlen($data['password']) < 4) {
				$data['passwordError'] = 'Enter a password longer than 4 characters';
			} elseif (!preg_match(self::$password_validation, $data['password'])) {
				$data['passwordError'] = 'Password must contain at least one small character, one bit character and one digit';
			}

			// Check if there are no errors
			if (empty($data['usernameError'] && empty($data['passwordError']))) {
				$loggedInUser = $this->user_model->login($data);
				if ($loggedInUser) {
					setcookie('username', $data['username'], time() + (60 * 60 * 24 * 5), '/', 'localhost');
					setcookie('password', $data['password'], time() + (60 * 60 * 24 * 5), '/', 'localhost');
					header('location:' . URLROOT . '/public/home/index');
				} else {
					$data['passwordError'] = 'Password is incorrect';
				}
			}
		}

		$this->view('info/login', $data);
	}

	public function register()
	{
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
			} elseif (!preg_match(self::$fullname_validation, $data['fullname'])) {
				$data['fullnameError'] = 'Please enter your real full name';
			}

			// Validate the username
			if (empty($data['username'])) {
				$data['usernameError'] = 'Please enter username';
			} elseif (!preg_match(self::$username_validation, $data['username'])) {
				$data['usernameError'] = 'Please enter a valid username';
			} elseif ($this->user_model->existsUserWithUsername($data['username'])) {
				$data['usernameError'] = 'Username already taken';
			}

			// Validate the email
			if (empty($data['email'])) {
				$data['emailError'] = 'Please enter email';
			} elseif (!preg_match(self::$email_validation, $data['email'])) {
				$data['emailError'] = 'Please enter a valid email';
			} elseif ($this->user_model->existsUserWithEmail($data['email'])) {
				$data['emailError'] = 'Email already taken';
			}

			// Validate the password
			if (empty($data['password'])) {
				$data['passwordError'] = 'Please enter password';
			} elseif (strlen($data['password']) < 5) {
				$data['passwordError'] = 'Please enter a password longer than 4 characters';
			} elseif (!preg_match(self::$password_validation, $data['password'])) {
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
			} elseif (!preg_match(self::$gender_validation, $data['gender'])) {
				$data['genderError'] = 'Selected gender is not valid';
			}

			// Validate the height
			if (empty($data['height'])) {
				$data['heightError'] = 'Please select measure of your height';
			} elseif (
				$this->stdHeight($data['height'], $data['heightUnit']) <= 50
				|| $this->stdHeight($data['height'], $data['heightUnit']) > 300
			) {
				$data['heightError'] = 'Invalid height';
			}

			// Validate the height unit
			if (empty($data['heightUnit'])) {
				$data['heightUnitError'] = 'Please select unit measure of your height';
			} elseif (!preg_match(self::$height_unit_validation, $data['heightUnit'])) {
				$data['heightUnitError'] = 'Selected measure unit of height is not valid';
			}

			// Validate the weight
			if (empty($data['weight'])) {
				$data['weightError'] = 'Please select measure of your weight';
			} elseif (
				$this->stdWeight($data['weight'], $data['weightUnit']) <= 30
				|| $this->stdWeight($data['weight'], $data['weightUnit']) > 300
			) {
				$data['weightError'] = 'Invalid weight';
			}

			// Validate the weight unit
			if (empty($data['weightUnit'])) {
				$data['weightUnitError'] = 'Please select unit measure of your weight';
			} elseif (!preg_match(self::$weight_unit_validation, $data['weightUnit'])) {
				$data['weightUnitError'] = 'Selected measure unit of weight is not valid';
			}

			// Check if there are no errors
			if (
				empty($data['fullnameError'])
				&& empty($data['usernameError'])
				&& empty($data['emailError'])
				&& empty($data['passwordError'])
				&& empty($data['confirmPasswordError'])
				&& empty($data['ageError'])
				&& empty($data['genderError'])
				&& empty($data['heightError'])
				&& empty($data['heightUnitError'])
				&& empty($data['weightError'])
				&& empty($data['weightUnitError'])
			) {

				// Hash password
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
				$data['confirmPassword'] = $data['password'];

				// standartize height and weight
				$data['height'] = $this->stdHeight($data['height'], $data['heightUnit']);
				$data['weight'] = $this->stdWeight($data['weight'], $data['weightUnit']);

				// Register user
				if ($this->user_model->register($data)) {
					// Redirect to login page
					header('location: ' . URLROOT . '/public/users/login');
				}
			}
		}

		$this->view('info/register', $data);
	}

	public function createUserSession($user)
	{
		$_SESSION['fullname'] = $user->fullname;
		$_SESSION['user'] = $user->username;
		$_SESSION['email'] = $user->email;
		$_SESSION['age'] = $user->age;
		$_SESSION['weight'] = $user->weight;
		$_SESSION['height'] = $user->height;
		$_SESSION['gender'] = $user->gender;
		header('location:' . URLROOT . '/public/home/loggedIN');
	}

	public function profile()
	{
		if (isset($_COOKIE['username']) && strlen($_COOKIE['username']) > 0) {
			$dataUser = $this->user_model->getUser($_COOKIE['username']);
			$data = [
				'fullname' => $dataUser->fullname,
				'username' => $_COOKIE['username'],
				'password' => '',
				'confirmPassword' => '',
				'age' => $dataUser->age,
				'gender' => $dataUser->gender,
				'height' => $dataUser->height,
				'heightUnit' => 'cm',
				'weight' => $dataUser->weight,
				'weightUnit' => 'kg',
				'fullnameError' => '',
				'passwordError' => '',
				'confirmPasswordError' => '',
				'ageError' => '',
				'genderError' => '',
				'heightError' => '',
				'heightUnitError' => '',
				'weightError' => '',
				'weightUnitError' => ''
			];

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'fullname' => trim($_POST['fullname']),
					'username' => $_COOKIE['username'],
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
				} elseif (!preg_match(self::$fullname_validation, $data['fullname'])) {
					$data['fullnameError'] = 'Please enter your real full name';
				}

				// Validate the password
				if (empty($data['password'])) {
					$data['passwordError'] = 'Please enter password';
				} elseif (strlen($data['password']) < 5) {
					$data['passwordError'] = 'Please enter a password longer than 4 characters';
				} elseif (!preg_match(self::$password_validation, $data['password'])) {
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
				} elseif (!preg_match(self::$gender_validation, $data['gender'])) {
					$data['genderError'] = 'Selected gender is not valid';
				}

				// Validate the height
				if (empty($data['height'])) {
					$data['heightError'] = 'Please select measure of your height';
				} elseif (
					$this->stdHeight($data['height'], $data['heightUnit']) <= 50
					|| $this->stdHeight($data['height'], $data['heightUnit']) > 300
				) {
					$data['heightError'] = 'Invalid height';
				}

				// Validate the height unit
				if (empty($data['heightUnit'])) {
					$data['heightUnitError'] = 'Please select unit measure of your height';
				} elseif (!preg_match(self::$height_unit_validation, $data['heightUnit'])) {
					$data['heightUnitError'] = 'Selected measure unit of height is not valid';
				}

				// Validate the weight
				if (empty($data['weight'])) {
					$data['weightError'] = 'Please select measure of your weight';
				} elseif (
					$this->stdWeight($data['weight'], $data['weightUnit']) <= 30
					|| $this->stdWeight($data['weight'], $data['weightUnit']) > 300
				) {
					$data['weightError'] = 'Invalid weight';
				}

				// Validate the weight unit
				if (empty($data['weightUnit'])) {
					$data['weightUnitError'] = 'Please select unit measure of your weight';
				} elseif (!preg_match(self::$weight_unit_validation, $data['weightUnit'])) {
					$data['weightUnitError'] = 'Selected measure unit of weight is not valid';
				}

				// Check if there are no errors
				if (
					empty($data['fullnameError'])
					&& empty($data['passwordError'])
					&& empty($data['confirmPasswordError'])
					&& empty($data['ageError'])
					&& empty($data['genderError'])
					&& empty($data['heightError'])
					&& empty($data['heightUnitError'])
					&& empty($data['weightError'])
					&& empty($data['weightUnitError'])
				) {
					// Hash password
					$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
					$data['confirmPassword'] = $data['password'];

					// standartize height and weight
					$data['height'] = $this->stdHeight($data['height'], $data['heightUnit']);
					$data['weight'] = $this->stdWeight($data['weight'], $data['weightUnit']);

					if ($this->user_model->updateUser($data) && $this->user_model->updateUserInfo($data)) {
						header('location: ' . URLROOT . '/public/home/loggedIN');
					}
				}
			}

			$this->view('info/profile', $data);
		} else {
			require_once 'Home.php';

			$this->controller = 'Home';
			$this->controller = new $this->controller;
			$this->method = 'error';

			call_user_func_array([$this->controller, $this->method], []);
		}
	}

	public function logout()
	{
		unset($_SESSION['fullname']);
		unset($_SESSION['user']);
		unset($_SESSION['email']);
		unset($_SESSION['age']);
		unset($_SESSION['weight']);
		unset($_SESSION['height']);
		unset($_SESSION['gender']);
		setcookie('username', null, -1, '/');
		setcookie('password', null, -1, '/');
		header('location:' . URLROOT . '/public/home/index');
	}

	private function stdHeight(float $height, string $type)
	{
		switch ($type) {
			case 'cm':
				return $height;
			case 'feet':
				return $height * 30.48;
		}
	}

	private function stdWeight(float $weight, string $type)
	{
		switch ($type) {
			case 'kg':
				return $weight;
			case 'lb':
				return $weight / 2.2046;
		}
	}
}
