<?php

if (!class_exists("StudentsController")) {
    include __DIR__ . "/../../../controller/StudentsController.php";
}

$success = false;

$StudentsController = new StudentsController();
$success = $StudentsController->getEntities();

if (!$success) {
    //TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
