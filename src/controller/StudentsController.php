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
			$values["foto"] = $photo;
		}


		return $this->dataBaseController->update($id, $values);
	}

	public function add($firstname, $lastname, $photo, $idKlasse)
	{
		$classController = new ClassController();
		$class = $classController->getEntity($idKlasse);

		if (is_null($class)) {
			return false;
		}

		$values = [
			"vorname" => $firstname,
			"nachname" => $lastname,
			"foto" => $photo,
			"id_klasse" => $idKlasse,
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
				"headline" => $values["nachname"] . ", " . $values["vorname"],
				"content" => $class["bezeichnung"],
				"id" => $class["id"],
			];
		}

		return $students;
	}
}