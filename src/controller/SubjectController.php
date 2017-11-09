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
	{
		$result = parent::getEntities();

		$classes = [];
		foreach ($result as $values) {
			$classes[] = [
				'headline' => $values['bezeichnung'],
				'content' => $values['kuerzel']
			];
		}

		return $classes;
	}
}