<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$subjectController = new SubjectController();
$success = $subjectController->delete($id);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;