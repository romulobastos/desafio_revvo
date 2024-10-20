<?php
class Database {
	private $host;
	private $dbname;
	private $username;
	private $password;
	public $conn;

	public function __construct() {
        $this->host = 'localhost';
        $this->dbname = getenv('MYSQL_DATABASE') ?: 'desafio_revvo';
        $this->username = getenv('MYSQL_USER') ?: 'admin';
        $this->password = getenv('MYSQL_PASSWORD') ?: '1234';
        $this->getConnection();
    }
	
	public function getConnection() {
		$this->conn = null;
		try {
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $exception) {
			echo "Erro na conexão: " . $exception->getMessage();
		}
		return $this->conn;
	}
}
?>