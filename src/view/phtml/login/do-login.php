<?php
if (!class_exists("LoginController")) {
	include __DIR__ . "/../../../controller/LoginController.php";
}

$username = isset($username) ? $username : filter_input(INPUT_POST, "username");
$password = isset($password) ? $password : filter_input(INPUT_POST, "password");

if (!isset($username) || !isset($password)) {
	header("Location: index.php");
	exit;
}

$loginController = new LoginController();
$success = $loginController->login($username, $password);

if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: ../../../../index.php");
exit;


