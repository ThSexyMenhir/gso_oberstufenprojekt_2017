<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("SubjectContentController")) {
	include __DIR__ . "/../../../controller/SubjectContentController.php";
}

$success = false;

$startdate= isset($startdate) ? $startdate : filter_input(INPUT_POST, "startdate");
$enddate = isset($enddate) ? $enddate : filter_input(INPUT_POST, "enddate");
$block = isset($block) ? $block : filter_input(INPUT_POST, "idStudent");
$date = isset($date) ? $date : filter_input(INPUT_POST, "idSubjectContent");
$idEvaluationSheet = isset($idEvaluationSheet) ? $idEvaluationSheet : filter_input(INPUT_POST, "idEvaluationSheet");
$note = isset($note) ? $note : filter_input(INPUT_POST, "note");

if (!isset($block) || !isset($date) || !isset($idEvaluationSheet)) {
	header("Location: index.php");
	exit;
}

$evaluationsController = new SubjectContentController();
$success = $evaluationsController->upsert($block, $date, $idEvaluationSheet, $note);

if (!$success) {
	header("Location: index.php?startdate=");
	exit;
}

header("Location: index.php");
exit;
