<?php
include __DIR__ . "/../../../../check-login.php";
include __DIR__ . "/../../../../src/controller/SubjectContentController.php";


$curDate = isset($curDate) ? $curDate : filter_input(INPUT_POST, "curDate");

$subjectContentController = new SubjectContentController();
$success = $subjectContentController->getEntitiesForDay($curDate);

echo $success;