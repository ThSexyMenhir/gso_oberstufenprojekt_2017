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

class EvaluationsController extends AbstractController
{
	protected $tableName = "Bewertungen";

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