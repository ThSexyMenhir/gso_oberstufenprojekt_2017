<?php
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

//TODO check ob Werte gesetzt

$classController = new ClassController();
$success = $classController->delete($id);

if (!$success) {
	//TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung