<?php

if (!class_exists("StudentsController")) {
    include __DIR__ . "/../../../controller/StudentsController.php";
}

$success = false;

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");
$firstname = isset($firstname) ? $firstname : filter_input(INPUT_GET, "firstname");
$lastname = isset($lastname) ? $lastname : filter_input(INPUT_GET, "lastname");
$photo = isset($photo) ? $photo : filter_input(INPUT_GET, "photo");
$idKlasse = isset($idKlasse) ? $idKlasse : filter_input(INPUT_GET, "idKlasse");


if (isset($id) && isset($firstname) && isset($lastname) && isset($photo) && isset($idKlasse)) {
    $StudentsController = new StudentsController();
    $success = $StudentsController->edit($id, $firstname, $lastname, $photo, $idKlasse);
}

if (!$success) {
    //TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
