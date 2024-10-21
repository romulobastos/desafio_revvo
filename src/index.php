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
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
	$info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_SPECIAL_CHARS);
	$img_url = filter_input(INPUT_POST, 'img_url', FILTER_SANITIZE_URL);
	$slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_SPECIAL_CHARS);
	
	if ($title && $info && $img_url && $slug) {
		echo $controller->create($title, $info, $img_url, $slug);
	} else {
		echo "Dados inválidos. Por favor, preencha todos os campos.";
	}

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
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_SPECIAL_CHARS);
    $img_url = filter_input(INPUT_POST, 'img_url', FILTER_SANITIZE_URL);
    $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_SPECIAL_CHARS);
    
    if ($title && $info && $img_url && $slug) {
        echo $controller->update($getId, $title, $info, $img_url, $slug);
    } else {
        echo "Dados inválidos para atualização. Por favor, preencha todos os campos.";
    }

} elseif ($action == 'dashboard') {
	// table with all courses
	$courses = $controller->read();
	include 'views/dashboard.php';

} else {
	// page with courses (cards)
	$courses = $controller->read();
	include 'views/courses.php';
	
}
?>