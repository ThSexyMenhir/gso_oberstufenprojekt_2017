<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}

class TeacherController extends AbstractController
{
	protected $tableName = "Lehrer";

	public function getEntity($id)
	{
		$result = parent::getEntity($id);

		if ($result !== null) {
			unset($result["passwort"]);
			unset($result["benutzername"]);
		}
		return $result;
	}

	public function edit($id, $firstname, $lastname, $memberCode, $userName, $password, $isAdmin)
	{
		$values = [];

		if ($firstname !== "") {
			$values["vorname"] = $firstname;
		}
		if ($lastname !== "") {
			$values["nachname"] = $lastname;
		}
		if ($memberCode !== "") {
			$values["kuerzel"] = $memberCode;
		}
		if ($userName !== "") {
			$values["benutzername"] = $userName;
		}
		if ($password !== "") {
			$values["passwort"] = $password;
		}
		$values["ist_admin"] = 0;
		if ($isAdmin) {
			$values["ist_admin"] = $isAdmin;
		}

		return $this->dataBaseController->update($id, $values);
	}

	public function add($firstname, $lastname, $memberCode, $userName, $password, $isAdmin)
	{
		if (strlen($memberCode) !== 2) {
			return false;
		}

		$values = [
			"vorname" => $firstname,
			"nachname" => $lastname,
			"kuerzel" => $memberCode,
			"benutzername" => $userName,
			"passwort" => $password,
			"ist_admin" => $isAdmin,
		];

		return $this->dataBaseController->insert($values);
	}

	public function getEntities(array $where = [], array $orderBy = [])
	{
		$result = parent::getEntities($where, $orderBy);

		$teachers = [];
		foreach ($result as $values) {
			$teachers[] = [
				"headline" => $values["nachname"] . ", " . $values["vorname"],
				"content" => $values["kuerzel"],
				"id" => $values["id"],
			];
		}

		return $teachers;
	}
}
