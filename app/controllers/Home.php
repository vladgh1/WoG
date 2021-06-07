<?php

class Home extends Controller {

	
	public function index() {
		
		$data=[];

		if(isset($_COOKIE['username']) && $_COOKIE['username']>0 && isset($_COOKIE['password']) && $_COOKIE['password']>0)
		{
			
			// $data = [
			// 	'username' => trim($_COOKIE['username']),
			// 	'password' => trim($_COOKIE['password']),
			// 	'usernameError' => '',
			// 	'passwordError' => ''
			// ];
			// if (empty($data['username'])) {
			// 	$data['usernameError'] = 'Enter username';
			// } elseif (!preg_match(Users::$username_validation, $data['username'])) {
			// 	$data['usernameError'] = 'Enter a valid username';
			// }

			// if (empty($data['password'])) {
			// 	$data['passwordError'] = 'Enter password';
			// } elseif (strlen($data['password'] < 5)) {
			// 	$data['passwordError'] = 'Enter a password longer than 4 characters';
			// } elseif (!preg_match(Users::$password_validation, $data['password'])) {
			// 	$data['passwordError'] = 'Password must contain at least one small character, one bit character and one digit';
			// }
			// header('location: ' . URLROOT . '/public/index/loggedIn');
		}

		
		$users = $this->model('User')->getTop();
		
		if ($users) {
			foreach ($users as $user) {
				$data[$user->username] = $user->score;
			}
		}
		
		$this->view('home/index', $data);
	}
	public function error() {
		$this->view('home/error');
	}
	public function loggedIn() {
		session_start();
		$this->view('home/loggedInIndex');
		
	}
	public function generatorRez() {
		$this->view('info/generatorResults');
	}
}
