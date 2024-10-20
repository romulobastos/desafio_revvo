<?php
class Course {
	private $conn;
	private $table_name = "courses";
	
	public $id;
	public $title;
	public $info;
	public $img_url;
	public $slug;
	
	public function __construct($db) {
		$this->conn = $db;
	}

	// courses (read)
	public function read() {
		$query = "SELECT * FROM " . $this->table_name;
		$st = $this->conn->prepare($query);
		$st->execute();
		return $st;
	}
}