<?php
include_once 'controllers/CourseController.php';
$controller = new CourseController();

$action = $_GET['action'] ?? '';

if ($action == 'new') {
    include 'views/new-course.php';
} elseif ($action == 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$title = $_POST['title'];
	$info = $_POST['info'];
	$img_url = $_POST['img_url'];
	$slug = $_POST['slug'];
	echo $controller->create($title, $info, $img_url, $slug);
} elseif ($action == 'dashboard') {
	$courses = $controller->read();
	include 'views/dashboard.php';
} else {
	$courses = $controller->read();
	include 'views/courses.php';
}
?>