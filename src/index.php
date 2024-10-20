<?php
include_once 'controllers/CourseController.php';
$controller = new CourseController();

$courses = $controller->read();
include 'views/courses.php';
?>