<?php

if (!class_exists("StudentsController")) {
    include __DIR__ . "/../../../controller/StudentsController.php";
}

$success = false;

$firstname = isset($firstname) ? $firstname : filter_input(INPUT_GET, "firstName");
$lastname = isset($lastname) ? $lastname : filter_input(INPUT_GET, "lastName");
$idKlasse = isset($idKlasse) ? $idKlasse : filter_input(INPUT_GET, "idClass");

if (isset($_FILES['photo']) && !is_null($_FILES['photo'])) {
    $uploadfile = __DIR__ . '/../../../data/media/img/students/' . $firstname . $lastname . $idKlasse . ".png";

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
        $success = true;
    } else {
        $success = false;
    }
} else {
    $success = true;
}

if (isset($firstname) && isset($lastname) && isset($photo) && isset($idKlasse) && $success) {
    $StudentsController = new StudentsController();
    $success = $StudentsController->add($firstname, $lastname, $uploadfile, $idKlasse);
} else {
    $success = false;
}

if (!$success) {
    //TODO Fehlermeldung anzeigen
}

//TOOD Weiterleitung
