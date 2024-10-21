<?php
include_once 'controllers/CourseController.php';
$controller = new CourseController();

$action = isset($_GET['action']) ? filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$getId = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : null;

// routes / actions
if ($action == 'new') {
	// show form to add course
	include 'views/new-course.php';

} elseif ($action == 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
	// insert a new course
	$title = $_POST['title'];
  $info = $_POST['info'];
  $slug = $_POST['slug'];
	$img = $_FILES['img'];
	echo $controller->create($title, $info, $img, $slug);

} elseif ($action == 'find' && $getId){
	// find a course by id
	$course = $controller->findCourse($getId);
	if ($course) {
		include 'views/update-course.php';
	} else {
		include 'views/course-not-found.php';
	}

} elseif ($action === 'update' && $getId && $_SERVER['REQUEST_METHOD'] === 'POST') {
	// update an existing course
	$title = $_POST['title'];
  $info = $_POST['info'];
  $slug = $_POST['slug'];
	
	// file upload - 'img'
	if (!empty($_FILES['img']['tmp_name'])) {
		$imgData = file_get_contents($_FILES['img']['tmp_name']);
		$imgType = $_FILES['img']['type'];
		if (substr($imgType, 0, 5) == 'image') {
			if ($title && $info && $imgData && $slug) {
				echo $controller->update($getId, $title, $info, $imgData, $slug);
			} else {
				echo "Dados inválidos para atualização. Por favor, preencha todos os campos.";
			}
		} else {
			echo "Por favor, envie um arquivo de imagem válido.";
		}
	} else {
		// without image
		echo $controller->update($getId, $title, $info, $imgData, $slug);
	}

} elseif ($action == 'dashboard') {
	// table with all courses
	$courses = $controller->read();
	include 'views/dashboard.php';

} elseif ($action == 'delete' && $getId && $_SERVER['REQUEST_METHOD'] === 'GET') {
	// remove an existing course
	$controller->delete($getId);

} elseif ($action == 'search') {
	// search courses
	$term = $_POST['search'];
	$courses = $controller->search($term);
	include 'views/search.php';

} else {
	// page with courses (cards)
	$courses = $controller->read();
	include 'views/courses.php';
	
}
?>