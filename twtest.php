<?php
include("src/controller/DatabaseController.php");
include("src/controller/AbstractController.php");
include("src/controller/TeacherController.php");

$a = new TeacherController();

//var_dump($a->add("Max", "Mustermann", "MM", "Max", "1234567", false));
//var_dump($a->get(1));
//var_dump($a->edit(2, "Marter", "", "", "", "", false));
//var_dump($a->search("Max", "", ""));
//var_dump($a->delete(2));


//$a = new DatabaseController("lehrer");
//var_dump($a->getEntityById(1));
//var_dump($a->getEntities(["vorname" => ["=", "Max"]]));
//var_dump($a->update(["vorname" => "Jan"], 1))
//var_dump($a->insert(["vorname" => "Jan"]))
//var_dump($a->delete(12))