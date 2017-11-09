<?php
if (!class_exists("StudentsController")) {
	include __DIR__ . "/../../../controller/StudentsController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$studentController = new StudentsController();
$success = $studentController->delete($id);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;

