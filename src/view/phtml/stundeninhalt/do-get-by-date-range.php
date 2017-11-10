<?php
include __DIR__ . "/../../../../check-login.php";
include __DIR__ . "/../../../../src/controller/SubjectContentController.php";


$startDate = isset($startDate) ? $startDate : filter_input(INPUT_POST, "startDate");
$endDate = isset($endDate) ? $endDate : filter_input(INPUT_POST, "endDate");

$subjectContentController = new SubjectContentController();
$success = $subjectContentController->getEntitiesForOverview($startDate, $endDate);

echo $success;