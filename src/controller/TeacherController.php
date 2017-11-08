<?php

class TeacherController extends AbstractController
{
    protected $tableName = "Lehrer";

    public function get($id)
    {
        $result = parent::get($id);

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

    public function search($firstname, $lastname, $memberCode)
    {
        $values = [];

        if ($firstname !== "") {
            $values["vorname"] = [
                "LIKE",
                "%" . $firstname . "%"
            ];
        }
        if ($lastname !== "") {
            $values["nachname"] = [
                "LIKE",
                "%" . $lastname . "%"
            ];
        }
        if ($memberCode !== "") {
            $values["kuerzel"] = [
                "LIKE",
                "%" . $memberCode . "%"
            ];
        }

        return $this->dataBaseController->getEntities($values);


    }
}