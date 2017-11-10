<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}

//TODO implement validation
class SubjectController extends AbstractController
{
	/** @var string */
	protected $tableName = "Stunden";

	/**
	 * @param int $id
	 * @param string $shortTag
	 * @param string $description
	 * @return bool
	 */
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

	/**
	 * @param string $shortTag
	 * @param string $description
	 * @return bool
	 */
	public function add($shortTag, $description)
	{
		$values = [
			"kuerzel" => $shortTag,
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