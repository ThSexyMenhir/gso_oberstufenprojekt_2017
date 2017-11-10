<?php
if (!class_exists("LoginController")) {
	include __DIR__ . "/src/controller/LoginController.php";
}

$loginController = new LoginController();
$success = $loginController->checkLogin();

if (!$success) {
	header("Location: src/view/phtml/login/index.php");
	exit;
}

header("location: src/view/phtml/stundeninhalt/index.php");
die();