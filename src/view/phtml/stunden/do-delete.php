<?php
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
}

$subjectController = new SubjectController();
$success = $subjectController->delete($id);

if (!$success) {
	header("Location: index.php");
}

header("Location: index.php");