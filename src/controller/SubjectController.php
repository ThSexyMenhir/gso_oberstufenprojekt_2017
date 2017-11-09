<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}

class SubjectController extends AbstractController
{
	protected $tableName = "Stunden";

	public function edit($id, $shortTag, $description)
	{
		$values = [];

		if ($shortTag !== "") {
			$values["kuerzel"] = $shortTag;
		}
		if ($description !== "") {
			$values["bezeichnung"] = $description;
		}

		return $this->dataBaseController->update($id, $values);
	}

	public function add($shortTag, $description)
	{
		$values = [
			"kuerzel" => $shortTag,
			"bezeichnung" => $description,
		];

		return $this->dataBaseController->insert($values);
	}

	public function getEntitiesForOverview(array $where = [], array $orderBy = [])
	{
		$result = parent::getEntities($where, $orderBy);

		$subjects = [];
		foreach ($result as $values) {
			$subjects[] = [
				"headline" => $values["bezeichnung"],
				"content" => $values["kuerzel"],
				"id" => $values["id"],
			];
		}

		return $subjects;
	}
}