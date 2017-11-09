<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}
if (!class_exists("TeacherController")) {
	include __DIR__ . "/TeacherController.php";
}

class ClassController extends AbstractController
{
	protected $tableName = 'Klassen';

	public function edit($id, $idMainTeacher, $description)
	{
		$values = [];

		if ($idMainTeacher !== "") {
			$values["id_klassenlehrer"] = $idMainTeacher;
		}
		if ($description !== "") {
			$values["bezeichnung"] = $description;
		}

		return $this->dataBaseController->update($id, $values);
	}

	public function add($idMainTeacher, $description)
	{
		$teacherController = new TeacherController();
		$teacher = $teacherController->getEntity($idMainTeacher);

		if (is_null($teacher)) {
			return false;
		}

		$values = [
			"id_klassenlehrer" => $idMainTeacher,
			"bezeichnung" => $description,
		];

		return $this->dataBaseController->insert($values);
	}

	public function getEntities()
	{
		$result = parent::getEntities();

		$teacherController = new TeacherController();

		$classes = [];
		foreach ($result as $values) {
			$teacher = $teacherController->getEntity($values['id_klassenlehrer']);
			$classes[] = [
				'headline' => $values['bezeichnung'],
				'content' => $teacher['kuerzel']
			];
		}

		return $classes;
	}
}