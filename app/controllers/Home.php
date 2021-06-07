<?php

class Home extends Controller {
	
	public function index() {		
		$data=[];
		if (isset($_SESSION['username'])) {
			header('location: ' . URLROOT . '/public/index/loggedIn');
		}

		if(isset($_COOKIE['username']) && strlen($_COOKIE['username']) > 0 && isset($_COOKIE['password']) && strlen($_COOKIE['password']) > 0) {
			$data = [
				'username' => trim($_COOKIE['username']),
				'password' => trim($_COOKIE['password']),
			];

			// Check if there are no errors
			$loggedInUser = $this->model('User')->login($data);
			if ($loggedInUser) {
				header('location: ' . URLROOT . '/public/home/loggedIn');
			} else {
				$data['passwordError'] = 'Password is incorrect';
			}
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
