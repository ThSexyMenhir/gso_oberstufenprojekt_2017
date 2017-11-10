<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$classController = new ClassController();
$success = $classController->delete($id);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;

