<?php

class Home extends Controller {

	public function index() {
		$data = [];
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
