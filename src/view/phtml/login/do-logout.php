<?php
if (!class_exists("LoginController")) {
	include __DIR__ . "/../../../controller/LoginController.php";
}

$loginController = new LoginController();
$loginController->logout();

header("Location: ../../../../index.php");
exit;


