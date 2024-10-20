<?php
include_once 'config/database.php';
include_once 'models/Course.php';

class CourseController {
  private $db;
  private $course;

  public function __construct() {
    $database = new Database();
    $this->db = $database->getConnection();
    $this->course = new Course($this->db);
  }

  // courses (read)
  public function read() {
    $res = $this->course->read();
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
}