<?php

class App
{
	protected $controller = "Home";
	protected $method = "index";
	protected $params = [];

	public function __construct() {
		$url=$this->parseURL();
		if(isset($url[0])) {
			if (file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
				$this->controller = ucfirst($url[0]);
				unset($url[0]);
			} else {
				$this->method = 'error';
			}
		}

		require_once '../app/controllers/' . $this->controller . '.php';

		$this->controller = new $this->controller;

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			} else {
				$this->controller = 'Home';
				require_once '../app/controllers/' . $this->controller . '.php';
				$this->controller = new $this->controller;
				$this->method = 'error';
			}
		}

		$this->params = $url ? array_values($url) : [];
	
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	protected function parseURL() {
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}

?>