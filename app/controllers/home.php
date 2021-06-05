<?php

class Home extends Controller
{
	public function index() {
		$this->view('home/index');
	}
	public function error() {
		$this->view('home/error');
	}
	public function loggedIn() {
		$this->view('home/loggedInIndex');
	}
	public function generatorRez() {
		$this->view('info/generatorResults');
	}
}
