<?php

if (!class_exists("AbstractController")) {
    include __DIR__ . "/AbstractController.php";
}

class ClassController extends  AbstractController
{
    protected $tableName = 'Klassen';

    public function add()
    {

    }

    public function edit($id, $idMainTeacher, $description)
    {

    }

    public function getEntities()
    {
        $result = parent::getEntities();

        $teacherController = new TeacherController();

        $classes = [];
        foreach($result as $values) {
            $teacher = $teacherController->getEntity($values['id_klassenlehrer']);
            $classes[] = [
                'headline' => $values['bezeichnung'],
                'content' => $teacher['kuerzel']
            ];
        }

        return $classes;
    }
}