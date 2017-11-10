<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("StudentsController")) {
	include __DIR__ . "/../../../controller/StudentsController.php";
}

$from = isset($from) ? $from : filter_input(INPUT_GET, "from");
$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

$url = "index.php";
if (!is_null($from)) {
	$url = "../" . $from;
}

if (!isset($id)) {
	header("Location: $url");
	exit;
}

$studentController = new StudentsController();
$success = $studentController->delete($id);

if (!$success) {
	header("Location: $url");
	exit;
}

header("Location: $url");
exit;

