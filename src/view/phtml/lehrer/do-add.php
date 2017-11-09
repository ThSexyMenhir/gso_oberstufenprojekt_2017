<?php
if (!class_exists("TeacherController")) {
	include __DIR__ . "/../../../controller/TeacherController.php";
}

$firstname = isset($firstname) ? $firstname : filter_input(INPUT_POST, "firstName");
$lastname = isset($lastname) ? $lastname : filter_input(INPUT_POST, "lastName");
$memberCode = isset($memberCode) ? $memberCode : filter_input(INPUT_POST, "memberCode");
$userName = isset($userName) ? $userName : filter_input(INPUT_POST, "userName");
$password = isset($password) ? $password : filter_input(INPUT_POST, "password");
$isAdmin = isset($isAdmin) ? $isAdmin : filter_input(INPUT_POST, "isAdmin");

if (!isset($firstname) || !isset($lastname) || !isset($memberCode) || !isset($userName) || !isset($password) || !isset($isAdmin)) {
	header("Location: index.php");
}

$teacherController = new TeacherController();
$success = $teacherController->add($firstname, $lastname, $memberCode, $userName, $password, $isAdmin);

if (!$success) {
	header("Location: index.php");
}

header("Location: index.php");
