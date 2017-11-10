<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");
$idMainTeacher = isset($idMainTeacher) ? $idMainTeacher : filter_input(INPUT_POST, "idMainTeacher");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

if (!isset($id) || !isset($idMainTeacher) || isset($description)) {
	header("Location: index.php");
	exit;
}

$classController = new ClassController();
$success = $classController->edit($id, $idMainTeacher, $description);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;
