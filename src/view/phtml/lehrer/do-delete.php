<?php
if(!class_exists("TeacherController")){
    include __DIR__ . "/../../../controller/TeacherController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");

$oTeacherController = new TeacherController();
$oTeacherController->delete($id);