<?php
if(!class_exists("TeacherController")){
    include __DIR__ . "/../../../controller/TeacherController.php";
}

$oTeacherController = new TeacherController();
$entities = $oTeacherController->getEntities();

if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
    echo json_encode($entities);
}