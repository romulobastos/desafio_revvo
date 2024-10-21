<?php
include_once 'config/database.php';
include_once 'models/Course.php';

class CourseController {
	private $db;
	private $course;
	
	public $uploadMaxFilesize;

	public function __construct() {
		session_start();
		$database = new Database();
		$this->db = $database->getConnection();
		$this->course = new Course($this->db);
		$this->uploadMaxFilesize = ini_get('upload_max_filesize');
	}
	
	// read
	public function read() {
		$res = $this->course->read();
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

	// check slug
	public function hasSlug($slug) {
		$res = $this->course->hasSlug($slug);
		return $res->fetch(PDO::FETCH_ASSOC);
	}

	// convert file size to bytes
	public function convertToBytes($size_str) {
		switch (substr($size_str, -1)) {
			case 'M':
			case 'm':
				return (int)$size_str * 1048576; // 1MB = 1048576 bytes
			case 'K':
			case 'k':
				return (int)$size_str * 1024;    // 1KB = 1024 bytes
			case 'G':
			case 'g':
				return (int)$size_str * 1073741824; // 1GB = 1073741824 bytes
			default:
				return (int)$size_str;
		}
	}

	// create
	public function create($title, $info, $img, $slug) {
		$this->course->title = $title;
		$this->course->info = $info;
		$this->course->img = $img;
		$this->course->slug = $slug;
		if ($this->hasSlug($this->course->slug)) {
			$_SESSION['msg'] = [
				'text' => "O campo Slug já existe!",
				'class' => "danger",
				'icon' => "x-circle"
			];
			
			header('Location: /?action=new');
			exit;
		} else {
			// file upload - 'img'
			$fileimg = $this->course->img;
			$imgSize = $fileimg['size'];
			// img ok and 'size' exists
			if (isset($fileimg) && $imgSize > 0) {
				// img size is valid (default max limit: 2mb)
				if ($imgSize <= $this->convertToBytes($this->uploadMaxFilesize)) {
					$this->course->img = file_get_contents($fileimg['tmp_name']);
					$imgType = $fileimg['type'];
					if (substr($imgType, 0, 5) == 'image') {
						if ($title && $info && $this->course->img && $slug) {
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
						} else {
							echo "Dados inválidos. Por favor, preencha todos os campos.";
						}		
					} else {
						echo "Por favor, envie um arquivo de imagem válido.";
					}
				} else {
					echo "As imagens precisam estar em formato 'png' ou 'jpg'. Tamanho máximo: " . $this->uploadMaxFilesize;
				}
			} else {
				echo "As imagens precisam estar em formato 'png' ou 'jpg'. Tamanho máximo: " . $this->uploadMaxFilesize;
			}
			
			header('Location: /?action=dashboard');
			exit;
		}
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