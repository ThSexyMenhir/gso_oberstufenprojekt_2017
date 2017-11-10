<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("TeacherController")) {
	include __DIR__ . "/../../../controller/TeacherController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$teacherController = new TeacherController();
$success = $teacherController->delete($id);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;
