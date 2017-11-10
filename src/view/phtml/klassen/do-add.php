<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$idMainTeacher = isset($idMainTeacher) ? $idMainTeacher : filter_input(INPUT_POST, "idMainTeacher");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

if (!isset($idMainTeacher) || !isset($description)) {
	header("Location: index.php");
	exit;
}

$classController = new ClassController();
$success = $classController->add($idMainTeacher, $description);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;


