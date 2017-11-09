<?php
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");
$shortTag = isset($shortTag) ? $shortTag : filter_input(INPUT_POST, "shortTag");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

if (!isset($id) || !isset($shorttag) || !isset($description)) {
	header("Location: index.php");
}

$subjectController = new SubjectController();
$success = $subjectController->edit($id, $shortTag, $description);

if (!$success) {
	header("Location: index.php");
}

header("Location: index.php");
