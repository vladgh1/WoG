<?php

class Home extends Controller
{
	public function index() {
		$this->view('home/index');
	}
	public function register() {
		$this->view('info/Register');
	}
	public function login() {
		$this->view('info/Login');
	}
	public function loggedIn() {
		$this->view('home/loggedInIndex');
	}
}
