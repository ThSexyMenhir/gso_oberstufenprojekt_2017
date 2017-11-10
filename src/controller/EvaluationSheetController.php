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
if (!class_exists("SubjectContentController")) {
	include __DIR__ . "/SubjectContentController.php";
}
if (!class_exists("TeacherController")) {
	include __DIR__ . "/TeacherController.php";
}
if (!class_exists("StudentsController")) {
	include __DIR__ . "/StudentsController.php";
}
if (!class_exists("EvaluationsController")) {
	include __DIR__ . "/EvaluationsController.php";
}

//TODO implement validation
class EvaluationSheetController extends AbstractController
{
	/** @var string */
	protected $tableName = "Bewertungsbogen";

	/**
	 * @param int $id
	 * @param int $idClass
	 * @param int $idSubject
	 * @return bool
	 */
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

	/**
	 * @param int $idClass
	 * @param int $idSubject
	 * @return bool
	 */
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

	/**
	 * @param array $where
	 * @param array $orderBy
	 * @return array
	 */
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
				"id" => $values["id"],
			];
		}

		return $evaluationSheets;
	}

	/**
	 * @param int $id
	 * @return array|bool
	 */
	public function getEntityForDetail($id)
	{
		$result = $this->getEntity($id);

		if (is_null($result)) {
			return false;
		}

		$classController = new ClassController();
		$class = $classController->getEntity($result["id_klasse"]);

		if (is_null($class)) {
			return false;
		}

		$subjectController = new SubjectController();
		$subject = $subjectController->getEntity($result["id_stunde"]);

		if (is_null($subject)) {
			return false;
		}

		$students = [];

		$studentsController = new StudentsController();
		$studentsResult = $studentsController->getEntities(
			[
				"id_klasse" => ["=", $class["id"]]
			],
			["nachname", "vorname"]
		);

		$evaluations = [];
		foreach ($studentsResult as $student) {
			$students[$student["id"]] = $student["vorname"] . " " . $student["nachname"];
			$evaluations[$student["id"]] = [];
		}

		$subjectDates = [];

		$subjectContentController = new SubjectContentController();
		$subjectContents = $subjectContentController->getEntities(
			[
				"id_bewertungsbogen" => ["=", $id]
			],
			["datum"]
		);

		$evaluationsController = new EvaluationsController();

		foreach ($subjectContents as $subjectContent) {
			$subjectDates[] = date("d.m.Y", strtotime($subjectContent["datum"]));
			foreach ($students as $key => $student) {
				$evaluation = $evaluationsController->getEntities([
					"id_stundeninhalte" => ["=", $subjectContent["id"]],
					"id_schueler" => ["=", $key],
				]);

				$value = "";
				if (!is_null($evaluation[0])) {
					$value = $evaluation[0]["notiz"];
				}

				$evaluations[$key][] = [
					"note" => $value,
					"idSubjectContent" => $subjectContent["id"],
				];
			}
		}

		$evaluationSheet = [
			"class" => $class["bezeichnung"],
			"subject" => $subject["bezeichnung"],
			"subjectDates" => $subjectDates,
			"students" => $students,
			"evaluations" => $evaluations,
		];

		return $evaluationSheet;
	}
}