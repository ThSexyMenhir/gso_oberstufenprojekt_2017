<?php
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$shortTag = isset($shortTag) ? $shortTag : filter_input(INPUT_POST, "shortTag");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

//TODO check ob Werte gesetzt

$subjectController = new SubjectController();
$success = $subjectController->add($shortTag, $description);

if (!$success) {
	//TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
