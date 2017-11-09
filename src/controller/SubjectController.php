<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}

class SubjectController extends AbstractController
{
	protected $tableName = 'Stunden';

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

	public function getEntities()
	public function getEntities(array $where = [], array $orderBy = [])
	{
		$result = parent::getEntities();
		$result = parent::getEntities($where, $orderBy);

		$classes = [];
		$subjects = [];
		foreach ($result as $values) {
			$classes[] = [
			$subjects[] = [
				'headline' => $values['bezeichnung'],
				'content' => $values['kuerzel']
			];
		}

		return $classes;
		return $subjects;
	}
}