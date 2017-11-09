<?php
if (!class_exists("TeacherController")) {
	include __DIR__ . "/../../../controller/TeacherController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

//TODO check ob Werte gesetzt

$teacherController = new TeacherController();
$success = $teacherController->delete($id);

if (!$success) {
	//TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
