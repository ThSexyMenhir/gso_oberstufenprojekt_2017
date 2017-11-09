<?php
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$idMainTeacher = isset($idMainTeacher) ? $idMainTeacher : filter_input(INPUT_POST, "idMainTeacher");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

if (!isset($idMainTeacher) || !isset($description)) {
	header("Location: index.php");
}

$classController = new ClassController();
$success = $classController->add($idMainTeacher, $description);

if (!$success) {
	header("Location: index.php");
}

header("Location: index.php");


