<?php
if(!class_exists("TeacherController")){
    include __DIR__ . "/../../../controller/ClassController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");
$idMainTeacher = isset($idMainTeacher) ? $idMainTeacher : filter_input(INPUT_POST, "idMainTeacher");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

$oClassController = new ClassController();
$oClassController->edit($id, $idMainTeacher, $description);