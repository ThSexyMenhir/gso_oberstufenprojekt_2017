<?php
if (!class_exists("StudentsController")) {
	include __DIR__ . "/../../../controller/StudentsController.php";
}

$firstname = isset($firstname) ? $firstname : filter_input(INPUT_POST, "firstName");
$lastname = isset($lastname) ? $lastname : filter_input(INPUT_POST, "lastName");
$idKlasse = isset($idKlasse) ? $idKlasse : filter_input(INPUT_POST, "idClass");
$uploadfile = null;

if (!isset($firstname) || !isset($lastname) || !isset($idKlasse)) {
	header("Location: index.php");
	exit;
}
if (isset($_FILES['photo']) && !is_null($_FILES['photo'])) {
	$uploadfile = __DIR__ . '/../../../data/media/img/students/' . $firstname . $lastname . $idKlasse . ".png";

	$success = move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
} else {
	$success = true;
}

if ($success) {
	try {
		$studentsController = new StudentsController();
		$success = $studentsController->add($firstname, $lastname, $uploadfile, $idKlasse);
	} catch (Exception $e) {
		$success = false;
	}
}

if (!is_null($uploadfile) && !$success) {
	unlink($uploadfile);
	header("Location: index.php");
	exit;
}