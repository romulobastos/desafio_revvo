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
	
	// read
	public function read() {
		$res = $this->course->read();
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}
	
	// create
	public function create($title, $info, $img, $slug) {
		$this->course->title = $title;
		$this->course->info = $info;
		$this->course->img = $img;
		$this->course->slug = $slug;
		$created = $this->course->create();
		if ($created) {
			$_SESSION['msg'] = [
				'text' => "Curso criado com sucesso!",
				'class' => "success",
				'icon' => "check-circle"
			];
		} else {
			$_SESSION['msg'] = [
				'text' => "Erro ao criar o curso!",
				'class' => "danger",
				'icon' => "x-circle"
			];
		}

		header('Location: /?action=dashboard');
		exit;
	}

	// find course (before update and delete)
	public function findCourse($id) {
		$res = $this->course->findCourse($id);
		return $res->fetch(PDO::FETCH_ASSOC);
	}

	// search course by name/term
	public function search($term) {
		$res = $this->course->search($term);
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

	// update
	public function update($id, $title, $info, $img, $slug) {
		// check if exists
		$course = $this->findCourse($id);
		
		if ($course) {
			$updated = $this->course->update($id, $title, $info, $img, $slug);
			if ($updated) {
				$_SESSION['msg'] = [
					'text' => "Curso atualizado com sucesso!",
					'class' => "success",
					'icon' => "check-circle"
				];
			} else {
				$_SESSION['msg'] = [
					'text' => "Erro ao atualizar o curso!",
					'class' => "danger",
					'icon' => "x-circle"
				];
			}
		} else {
			$_SESSION['msg'] = [
				'text' => "Curso não encontrado!",
				'class' => "danger",
				'icon' => "x-circle"
			];
		}

		header('Location: /?action=dashboard');
		exit;
	}

	// delete
	public function delete($id) {
		// check if exists
		$course = $this->findCourse($id);

		if ($course) {
			$delete = $this->course->delete($id);
			if ($delete) {
				$_SESSION['msg'] = [
					'text' => "Curso excluído com sucesso!",
					'class' => "success",
					'icon' => "check-circle"
				];
			} else {
				$_SESSION['msg'] = [
					'text' => "Erro ao excluir o curso!",
					'class' => "danger",
					'icon' => "x-circle"
				];
			}
		} else {
			$_SESSION['msg'] = [
				'text' => "Curso não encontrado!",
				'class' => "danger",
				'icon' => "x-circle"
			];
		}

		header('Location: /?action=dashboard');
		exit;
	}
}