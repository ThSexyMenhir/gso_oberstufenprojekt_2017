<?php
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (isset($id)){
    $subjectController = new SubjectController();
    $success = $subjectController->delete($id);
}

if (!$success) {
	//TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
