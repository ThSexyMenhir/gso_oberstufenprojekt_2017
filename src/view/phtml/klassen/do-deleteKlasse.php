<?php
if(!class_exists("TeacherController")){
    include __DIR__ . "/../../../controller/ClassController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");

$oClassController = new ClassController();
$oClassController->delete($id);