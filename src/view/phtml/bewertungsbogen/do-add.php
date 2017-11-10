<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("EvaluationSheetController")) {
	include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$success = false;

$idClass = isset($idClass) ? $idClass : filter_input(INPUT_GET, "idClass");
$idSubject = isset($idSubject) ? $idSubject : filter_input(INPUT_GET, "idSubject");

if (isset($idClass) && isset($idSubject)) {
	$evaluationSheetController = new EvaluationSheetController();
	$success = $evaluationSheetController->add($idClass, $idSubject);
}

if (!$success) {
	//TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
