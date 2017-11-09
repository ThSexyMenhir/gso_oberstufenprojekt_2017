<?php
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$shortTag = isset($shortTag) ? $shortTag : filter_input(INPUT_POST, "shortTag");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

if (!isset($shortTag) || !isset($description)) {
	header("Location: index.php");
}

$subjectController = new SubjectController();
$success = $subjectController->add($shortTag, $description);

if (!$success) {
	header("Location: index.php");
}

header("Location: index.php");