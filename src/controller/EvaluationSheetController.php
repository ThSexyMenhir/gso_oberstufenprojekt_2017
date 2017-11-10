<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}
if (!class_exists("ClassController")) {
	include __DIR__ . "/ClassController.php";
}
if (!class_exists("SubjectController")) {
	include __DIR__ . "/SubjectController.php";
}
if (!class_exists("TeacherController")) {
	include __DIR__ . "/TeacherController.php";
}

class EvaluationSheetController extends AbstractController
{
	protected $tableName = "Bewertungsbogen";

	public function edit($id, $idClass, $idSubject)
	{
		$values = [];

		if ($idClass !== "") {
			$classController = new ClassController();
			$class = $classController->getEntity($idClass);

			if (is_null($class)) {
				return false;
			}
			$values["id_klasse"] = $idClass;
		}
		if ($idSubject !== "") {
			$subjectController = new SubjectController();
			$subject = $subjectController->getEntity($idSubject);

			if (is_null($subject)) {
				return false;
			}
			$values["id_stunde"] = $idSubject;
		}

		return $this->dataBaseController->update($id, $values);
	}

	public function add($idClass, $idSubject)
	{
		$classController = new ClassController();
		$class = $classController->getEntity($idClass);

		if (is_null($class)) {
			return false;
		}

		$subjectController = new SubjectController();
		$subject = $subjectController->getEntity($idSubject);

		if (is_null($subject)) {
			return false;
		}

		session_start();
		$idTeacher = $_SESSION['gos-kalender']['id_lehrer'];
		$teacherController = new TeacherController();
		$teacher = $teacherController->getEntity($idTeacher);

		if (is_null($teacher)) {
			return false;
		}

		$values = [
			"id_klasse" => $idClass,
			"id_stunde" => $idSubject,
			"id_lehrer" => $idTeacher,
		];

		return $this->dataBaseController->insert($values);
	}

	public function getEntitiesForOverview(array $where = [], array $orderBy = [])
	{
		$result = parent::getEntities($where, $orderBy);

		$classController = new ClassController();
		$subjectController = new SubjectController();

		$evaluationSheets = [];
		foreach ($result as $values) {
			$class = $classController->getEntity($values["id_klasse"]);
			$subject = $subjectController->getEntity($values["id_stunde"]);
			$evaluationSheets[] = [
				"headline" => $class["bezeichnung"],
				"content" => $subject["kuerzel"],
				"id" => $subject["id"],
			];
		}

		return $evaluationSheets;
	}

	public function getEntityForDetail($id)
	{
		$result = $this->getEntity($id);


	}
}