<?php
include_once 'config/database.php';
include_once 'models/Course.php';

class CourseController {
	private $db;
	private $course;

	public function __construct() {
		session_start();
		$database = new Database();
		$this->db = $database->getConnection();
		$this->course = new Course($this->db);
	}
	
	// courses (read)
	public function read() {
		$res = $this->course->read();
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}
	
	// courses (create)
	public function create($title, $info, $img_url, $slug) {
		$this->course->title = $title;
		$this->course->info = $info;
		$this->course->img_url = $img_url;
		$this->course->slug = $slug;
		$created = $this->course->create();
		if ($created) {
			$_SESSION['msg'] = "Curso criado com sucesso!";
		} else {
			$_SESSION['msg'] = "Erro ao criar o curso.";
		}

		header('Location: /?action=dashboard');
		exit;
	}
}