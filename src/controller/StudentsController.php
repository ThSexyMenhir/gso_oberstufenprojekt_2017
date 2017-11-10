<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}
if (!class_exists("ClassController")) {
	include __DIR__ . "/ClassController.php";
}

class StudentsController extends AbstractController
{
	protected $tableName = "Schueler";

	public function edit($id, $firstname, $lastname, $photo, $idKlasse)
	{
		$values = [];

		if ($firstname !== "") {
			$values["vorname"] = $firstname;
		}
		if ($lastname !== "") {
			$values["nachname"] = $lastname;
		}
		if ($idKlasse !== "") {
			$classController = new ClassController();
			$class = $classController->getEntity($idKlasse);

			if (is_null($class)) {
				return false;
			}
			$values["id_klasse"] = $idKlasse;
		}
		if ($photo !== "") {
			$student = $this->getEntity($id);
			if ($photo !== $student["foto_pfad"] && !empty($student["foto_pfad"])) {
				unlink($student["foto_pfad"]);
			}
			$values["foto_pfad"] = $photo;
		}


		return $this->dataBaseController->update($id, $values);
	}

	public function add($firstname, $lastname, $photo, $idClass)
	{
		$classController = new ClassController();
		$class = $classController->getEntity($idClass);

		if (is_null($class)) {
			return false;
		}

		$values = [
			"vorname" => $firstname,
			"nachname" => $lastname,
			"foto_pfad" => $photo,
			"id_klasse" => $idClass,
		];

		return $this->dataBaseController->insert($values);
	}

	public function getEntitiesForOverview(array $where = [], array $orderBy = [])
	{
		$result = parent::getEntities($where, $orderBy);

		$classController = new ClassController();

		$students = [];
		foreach ($result as $values) {
			$class = $classController->getEntity($values["id_klasse"]);
			$students[] = [
				"headline" => $values["nachname"] . ", " . $values["vorname"] . ": " . $class["bezeichnung"],
				"content" => $values["foto_pfad"],
				"id" => $values["id"],
			];
		}

		return $students;
	}

	public function delete($id)
	{
		$student = $this->getEntity($id);
		unlink($student["foto_pfad"]);
		parent::delete($id);
	}
}