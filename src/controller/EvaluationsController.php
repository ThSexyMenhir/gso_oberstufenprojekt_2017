<?php
if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}
if (!class_exists("StudentsController")) {
	include __DIR__ . "/StudentsController.php";
}
if (!class_exists("SubjectContentController")) {
	include __DIR__ . "/SubjectContentController.php";
}

//TODO implement validation
class EvaluationsController extends AbstractController
{
	/** @var string */
	protected $tableName = "Bewertungen";

	/**
	 * @param int $idStudent
	 * @param int $idSubjectContent
	 * @param string $note
	 * @return bool
	 */
	public function upsert($idStudent, $idSubjectContent, $note)
	{
		$evaluation = $this->getEntities([
			"id_schueler" => ["=", $idStudent],
			"id_stundeninhalte" => ["=", $idSubjectContent]
		]);

		if (isset($evaluation[0]) && !is_null($evaluation[0])) {
			return $this->dataBaseController->update(
				$evaluation[0]["id"],
				[
					"notiz" => $note,
				]
			);
		}

		$subjectContentController = new SubjectContentController();
		$subjectContent = $subjectContentController->getEntity($idSubjectContent);

		if (is_null($subjectContent)) {
			return false;
		}

		$studentController = new StudentsController();
		$student = $studentController->getEntity($idStudent);

		if (is_null($student)) {
			return false;
		}

		return $this->dataBaseController->insert(
			[
				"id_schueler" => $idStudent,
				"id_stundeninhalte" => $idSubjectContent,
				"notiz" => $note,
			]
		);
	}
}