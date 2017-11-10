<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("EvaluationsController")) {
	include __DIR__ . "/../../../controller/EvaluationsController.php";
}

$success = false;

$idEvaluationSheet = isset($idEvaluationSheet) ? $idEvaluationSheet : filter_input(INPUT_POST, "idEvaluationSheet");
$idStudent = isset($idStudent) ? $idStudent : filter_input(INPUT_POST, "idStudent");
$idSubjectContent = isset($idSubjectContent) ? $idSubjectContent : filter_input(INPUT_POST, "idSubjectContent");
$note = isset($note) ? $note : filter_input(INPUT_POST, "note");

if (!isset($idStudent) || !isset($idSubjectContent)) {
	header("Location: index.php");
	exit;
}

$evaluationsController = new EvaluationsController();
$success = $evaluationsController->upsert($idStudent, $idSubjectContent, $note);

if (!$success) {
	header("Location: detail.php?id=$idEvaluationSheet");
	exit;
}

header("Location: detail.php?id=$idEvaluationSheet");
exit;
