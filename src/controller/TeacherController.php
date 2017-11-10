<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}

//TODO implement validation
class TeacherController extends AbstractController
{
	/** @var string  */
	protected $tableName = "Lehrer";

	/**
	 * @param int $id
	 * @return array|null
	 */
	public function getEntity($id)
	{
		$result = parent::getEntity($id);

		if ($result !== null) {
			unset($result["passwort"]);
		}
		return $result;
	}

	/**
	 * @param int $id
	 * @param string $firstname
	 * @param string $lastname
	 * @param string $memberCode
	 * @param string $userName
	 * @param string $password
	 * @param bool $isAdmin
	 * @return bool
	 */
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
			$values["passwort"] = password_hash($password, PASSWORD_BCRYPT);
		}
		$values["ist_admin"] = 0;
		if ($isAdmin) {
			$values["ist_admin"] = $isAdmin;
		}

		return $this->dataBaseController->update($id, $values);
	}

	/**
	 * @param string $firstname
	 * @param string $lastname
	 * @param string $memberCode
	 * @param string $userName
	 * @param string $password
	 * @param bool $isAdmin
	 * @return bool
	 */
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
			"passwort" => password_hash($password, PASSWORD_BCRYPT),
			"ist_admin" => $isAdmin,
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
