<?php
if(!class_exists("SubjectContentController")){
    include __DIR__ . "/../../../../src/controller/SubjectContentController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");

$subjectContentController = new SubjectContentController();
$success = $subjectContentController->delete($id);