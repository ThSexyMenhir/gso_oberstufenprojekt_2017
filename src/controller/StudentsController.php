<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}
if (!class_exists("ClassController")) {
	include __DIR__ . "/ClassController.php";
}

//TODO implement validation
class StudentsController extends AbstractController
{
	const PLACEHOLDER = "/src/data/media/img/placeholder.png";

	/** @var string */
	protected $tableName = "Schueler";

	/**
	 * @param int $id
	 * @param string $firstname
	 * @param string $lastname
	 * @param string $photo
	 * @param int $idKlasse
	 * @return bool
	 */
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

	/**
	 * @param string $firstname
	 * @param string $lastname
	 * @param string $photo
	 * @param int $idClass
	 * @return bool
	 */
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

	/**
	 * @param array $where
	 * @param array $orderBy
	 * @return array
	 */
	public function getEntitiesForOverview(array $where = [], array $orderBy = [])
	{
		$result = parent::getEntities($where, $orderBy);

		$classController = new ClassController();

		$students = [];
		foreach ($result as $values) {
			$class = $classController->getEntity($values["id_klasse"]);
			$students[] = [
				"headline" => $values["nachname"] . ", " . $values["vorname"] . ": " . $class["bezeichnung"],
				"content" => $values["foto_pfad"] ? $values["foto_pfad"] : self::PLACEHOLDER,
				"id" => $values["id"],
			];
		}

		return $students;
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function delete($id)
	{
		$student = $this->getEntity($id);
		unlink($student["foto_pfad"]);
		parent::delete($id);
	}
}