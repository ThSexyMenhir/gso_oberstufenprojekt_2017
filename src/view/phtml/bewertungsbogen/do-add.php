<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("EvaluationSheetController")) {
	include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$success = false;

$idClass = isset($idClass) ? $idClass : filter_input(INPUT_POST, "idClass");
$idSubject = isset($idSubject) ? $idSubject : filter_input(INPUT_POST, "idSubject");

if (!isset($idClass) || !isset($idSubject)) {
	header("Location: index.php");
	exit;
}

$evaluationsSheetController = new EvaluationSheetController();
$success = $evaluationsSheetController->add($idClass, $idSubject);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;
