<?php

class Home extends Controller
{
	public function index() {
		// TODO: remove test functionality
		$data = [
			'afsdhlfhsdl' => 10,
			'b' => 9,
			'c' => 8,
		];
		$this->view('home/index', $data);
		// $user = new User();
		// $this->view('home/index', $user->getTop());
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
