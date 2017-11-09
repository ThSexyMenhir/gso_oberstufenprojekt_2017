<?php
if(!class_exists("TeacherController")){
    include __DIR__ . "/../../../controller/TeacherController.php";
}

$id = isset($id) ? $id : filter_input(INPUT_POST, "id");
$firstname = isset($firstname) ? $firstname : filter_input(INPUT_POST, "firstName");
$lastname = isset($lastname) ? $lastname : filter_input(INPUT_POST, "lastName");
$memberCode = isset($memberCode) ? $memberCode : filter_input(INPUT_POST, "memberCode");
$userName = isset($userName) ? $userName : filter_input(INPUT_POST, "userName");
$password = isset($password) ? $password : filter_input(INPUT_POST, "password");
$isAdmin = isset($isAdmin) ? $isAdmin : filter_input(INPUT_POST, "isAdmin");

$oTeacherController = new TeacherController();
$oTeacherController->edit($id, $firstname, $lastname, $memberCode, $userName, $password, $isAdmin);