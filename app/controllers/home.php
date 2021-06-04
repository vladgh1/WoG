<?php

class Home extends Controller
{
	public function index() {
		$this->view('home/index');
	}
	public function error() {
		$this->view('home/error');
	}
	public function register() {
		$this->view('info/register');
	}
	public function login() {
		$this->view('info/login');
	}
	public function loggedIn() {
		$this->view('home/loggedInIndex');
	}
	public function generator() {
		$this->view('info/generator');
	}
	public function generatorRez() {
		$this->view('info/generatorResults');
	}
}
