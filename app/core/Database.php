<?php

class Database {
	private $db_host = DB_HOST;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;
	private $db_name = DB_NAME;

	private $statement;
	private $handler;
	private $error;

	public function __construct() {
		$con = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try {
			$this->handler = new PDO($con, $this->db_user, $this->db_pass, $options);
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
			echo $this->error;
		}
	}

	public function query($sql) {
		$this->statement = $this->handler->prepare($sql);
	}

	public function bind($param, $value, $type = null) {
		switch ($type) {
			case 'int':
				$type = PDO::PARAM_INT;
				break;
			case 'bool':
				$type = PDO::PARAM_BOOL;
				break;
			default:
				$type = PDO::PARAM_STR;
				break;
		}
		$this->statement->bindValue($param, $value, $type);
	}

	public function execute() {
		return $this->statement->execute();
	}

	public function resultSet() {
		$this->execute();
		return $this->statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function resultRow() {
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_OBJ);
	}

	public function rowCount() {
		return $this->statement->rowCount();
	}
}