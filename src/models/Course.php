<?php
class Course {
	private $conn;
	private $table_name = "courses";
	
	public $id;
	public $title;
	public $info;
	public $img;
	public $slug;
	
	public function __construct($db) {
		$this->conn = $db;
	}

	// read
	public function read() {
		$query = "SELECT * FROM " . $this->table_name;
		$st = $this->conn->prepare($query);
		$st->execute();
		return $st;
	}

	// create
	public function create() {
		$query = "INSERT INTO " . $this->table_name . " (title, info, img, slug) VALUES (:title, :info, :img, :slug)";
		$st = $this->conn->prepare($query);
		$st->bindParam(':title', $this->title);
		$st->bindParam(':info', $this->info);
		$st->bindParam(':img', $this->img);
		$st->bindParam(':slug', $this->slug);
		
		$created = $st->execute();
		if ($created) {
			return true;
		}
		return false;
	}

	// find course by id
	public function findCourse($id) {
		$query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
		$st = $this->conn->prepare($query);
		$st->bindParam(':id', $id, PDO::PARAM_INT);
		$st->execute();
		return $st;
	}

	// update
	public function update($id, $title, $info, $img, $slug) {
		$query = "UPDATE " . $this->table_name . " SET title = :title, info = :info, img = :img, slug = :slug WHERE id = :id";
		$st = $this->conn->prepare($query);
		$st->bindParam(':id', $id, PDO::PARAM_INT);
		$st->bindParam(':title', $title, PDO::PARAM_STR);
		$st->bindParam(':info', $info, PDO::PARAM_STR);
		$st->bindParam(':img', $img, PDO::PARAM_STR);
		$st->bindParam(':slug', $slug, PDO::PARAM_STR);
		$st->execute();
		return $st;
	}

	// delete
	public function delete($id) {
		$query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
		$st = $this->conn->prepare($query);
		$st->bindParam(':id', $id, PDO::PARAM_INT);
		$st->execute();
		return $st;
	}
}