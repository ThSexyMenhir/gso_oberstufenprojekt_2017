<?php
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");
$idMainTeacher = isset($idMainTeacher) ? $idMainTeacher : filter_input(INPUT_POST, "idMainTeacher");
$description = isset($description) ? $description : filter_input(INPUT_POST, "description");

//TODO check ob Werte gesetzt

$classController = new ClassController();
$success = $classController->edit($id, $idMainTeacher, $description);

if (!$success) {
	//TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung