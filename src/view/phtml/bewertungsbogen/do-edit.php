<?php

if (!class_exists("EvaluationSheetController")) {
    include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$success = false;

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");
$idClass = isset($idClass) ? $idClass : filter_input(INPUT_GET, "idClass");
$idSubject = isset($idSubject) ? $idSubject : filter_input(INPUT_GET, "idSubject");

if (isset($id) && isset($idClass) && isset($idSubject)) {
    $evaluationSheetController = new EvaluationSheetController();
    $success = $evaluationSheetController->edit($id, $idClass, $idSubject);
}

if (!$success) {
    //TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
