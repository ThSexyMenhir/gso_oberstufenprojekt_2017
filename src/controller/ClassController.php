<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}
if (!class_exists("TeacherController")) {
	include __DIR__ . "/TeacherController.php";
}

//TODO implement validation
class ClassController extends AbstractController
{
	/**
	 * @var string
	 */
	protected $tableName = "Klassen";

	/**
	 * @param int $id
	 * @param int $idMainTeacher
	 * @param string $description
	 * @return bool
	 */
	public function edit($id, $idMainTeacher, $description)
	{
		$values = [];

		if ($idMainTeacher !== "") {
			$teacherController = new TeacherController();
			$teacher = $teacherController->getEntity($idMainTeacher);

			if (is_null($teacher)) {
				return false;
			}
			$values["id_klassenlehrer"] = $idMainTeacher;
		}
		if ($description !== "") {
			$values["bezeichnung"] = $description;
		}

		return $this->dataBaseController->update($id, $values);
	}

	/**
	 * @param int $idMainTeacher
	 * @param string $description
	 * @return bool
	 */
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

	/**
	 * @param array $where
	 * @param array $orderBy
	 * @return array
	 */
	public function getEntitiesForOverview(array $where = [], array $orderBy = [])
	{
		$result = parent::getEntities($where, $orderBy);

		$teacherController = new TeacherController();

		$classes = [];
		foreach ($result as $values) {
			$teacher = $teacherController->getEntity($values["id_klassenlehrer"]);
			$classes[] = [
				"headline" => $values["bezeichnung"],
				"content" => $teacher["kuerzel"],
				"id" => $values["id"],
			];
		}

		return $classes;
	}
}