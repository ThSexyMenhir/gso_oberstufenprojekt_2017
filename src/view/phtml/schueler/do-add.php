<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("StudentsController")) {
	include __DIR__ . "/../../../controller/StudentsController.php";
}

$from = isset($from) ? $from : filter_input(INPUT_POST, "from");
$firstname = isset($firstname) ? $firstname : filter_input(INPUT_POST, "firstName");
$lastname = isset($lastname) ? $lastname : filter_input(INPUT_POST, "lastName");
$idKlasse = isset($idKlasse) ? $idKlasse : filter_input(INPUT_POST, "idClass");
$uploadfile = null;

$url = "index.php";
if (!is_null($from) && $from !== "") {
	$url = "../" . $from;
}

if (!isset($firstname) || !isset($lastname) || !isset($idKlasse)) {
	header("Location: $url");
	exit;
}

$success = true;
if (!is_null($_FILES["photo"]) && $_FILES["photo"]["tmp_name"] !== "") {
	$uploadfile = "/src/data/media/img/students/" . $firstname . $lastname . $idKlasse . ".png";
	$moveUrl = __DIR__ . "/../../../.." . $uploadfile;
	$success = move_uploaded_file($_FILES["photo"]["tmp_name"], $moveUrl);
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
	header("Location: $url");
	exit;
}
header("Location: $url");
exit;