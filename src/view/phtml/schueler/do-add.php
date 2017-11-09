<?php

if (!class_exists("StudentsController")) {
    include __DIR__ . "/../../../controller/StudentsController.php";
}

$success = false;

$firstname = isset($firstname) ? $firstname : filter_input(INPUT_GET, "id");
$lastname = isset($lastname) ? $lastname : filter_input(INPUT_GET, "id");
$photo = isset($photo) ? $photo : filter_input(INPUT_GET, "id");
$idKlasse = isset($idKlasse) ? $idKlasse : filter_input(INPUT_GET, "id");


if (isset($firstname) && isset($lastname) && isset($photo) && isset($idKlasse)) {
    $StudentsController = new StudentsController();
    $success = $StudentsController->add($firstname, $lastname, $photo, $idKlasse);
}

if (!$success) {
    //TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
