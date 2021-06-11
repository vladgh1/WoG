<?php

class Home extends Controller {
	private $model_user;

	public function __construct() {
		$this->model_user = $this->model('User');
	}
	
	public function index() {		
		$data=[];
		if (isset($_SESSION['username'])) {
			header('location: ' . URLROOT . '/public/home/loggedIn');
		}

		if(isset($_COOKIE['username']) && strlen($_COOKIE['username']) > 0 && isset($_COOKIE['password']) && strlen($_COOKIE['password']) > 0) {
			$data = [
				'username' => trim($_COOKIE['username']),
				'password' => trim($_COOKIE['password']),
			];

			// Check if there are no errors
			$loggedInUser = $this->model_user->login($data);
			if ($loggedInUser) {
				header('location: ' . URLROOT . '/public/home/loggedIn');
			} else {
				$data['passwordError'] = 'Password is incorrect';
			}
		}

		$this->view('home/index', $data);
	}
	public function error() {
		$this->view('home/error');
	}
	public function loggedIn() {
		if (isset($_COOKIE['username']) && strlen($_COOKIE['username']) > 0 && isset($_COOKIE['password']) && strlen($_COOKIE['password']) > 0) {
			session_start();
			$data = $this->model_user->getUserInfo($_COOKIE['username']);
			$this->view('home/loggedInIndex', $data);
		} else {
			header('location:' . URLROOT . '/public/home/index');
		}
		
	}
	public function generatorRez() {
		$this->view('info/generatorResults');
	}
}
