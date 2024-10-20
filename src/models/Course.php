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

	// courses (create)
	public function create() {
		$query = "INSERT INTO " . $this->table_name . " (title, info, img_url, slug) VALUES (:title, :info, :img_url, :slug)";
		$st = $this->conn->prepare($query);
		$st->bindParam(':title', $this->title);
		$st->bindParam(':info', $this->info);
		$st->bindParam(':img_url', $this->img_url);
		$st->bindParam(':slug', $this->slug);
		
		$created = $st->execute();
		if ($created) {
			return true;
		}
		return false;
	}
}