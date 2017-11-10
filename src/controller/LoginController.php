<?php

if (!class_exists("AbstractController")) {
	include __DIR__ . "/AbstractController.php";
}

class LoginController extends AbstractController
{
	protected $tableName = "Lehrer";

	public function login($username, $password)
	{
		$users = $this->dataBaseController->getEntities(["benutzername" => ["=", $username]]);
		$user = $users[0];
		if (is_null($user)) {
			$this->logout();
			return false;
		}

		if (password_verify($password, $user["passwort"])) {
			session_start();
			$_SESSION['gso-kalender'] = ['id_lehrer' => $user["id"]];
			return true;
		}

		$this->logout();
		return false;
	}

	public function checkLogin()
	{
		session_start();
		$id = $_SESSION['gso-kalender']['id_lehrer'];

		if (is_null($id)) {
			$this->logout();
			return false;
		}

		$user = $this->dataBaseController->getEntityById($id);

		if (is_null($user)) {
			$this->logout();
			return false;
		}

		return true;
	}

	public function logout()
	{
		session_start();
		session_destroy();
	}
}